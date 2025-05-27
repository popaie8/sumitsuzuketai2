<?php
// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'sumitsuzuketai_enqueue_assets');
function sumitsuzuketai_enqueue_assets() {
   // distディレクトリ内のCSSとJSファイルを動的に検索
   $dist_dir = get_template_directory() . '/dist/';
   
   // CSSファイルを検索（style.css、main.css、またはハッシュ付きファイル）
   $css_files = array_merge(
       glob($dist_dir . 'style*.css'),
       glob($dist_dir . 'main*.css'),
       glob($dist_dir . '*.css')
   );
   
   // JSファイルを検索（main.js、index.js、またはハッシュ付きファイル）
   $js_files = array_merge(
       glob($dist_dir . 'main*.js'),
       glob($dist_dir . 'index*.js'),
       glob($dist_dir . '*.js')
   );
   
   // CSSファイルの読み込み
   if (!empty($css_files)) {
       $css_file = $css_files[0]; // 最初に見つかったファイルを使用
       $css_filename = basename($css_file);
       $css_url = get_template_directory_uri() . '/dist/' . $css_filename;
       
       wp_enqueue_style(
           'theme-style', 
           $css_url, 
           [], 
           filemtime($css_file)
       );
   }
   
   // JSファイルの読み込み
   if (!empty($js_files)) {
       $js_file = $js_files[0]; // 最初に見つかったファイルを使用
       $js_filename = basename($js_file);
       $js_url = get_template_directory_uri() . '/dist/' . $js_filename;
       
       wp_enqueue_script(
           'theme-script', 
           $js_url, 
           [], 
           filemtime($js_file), 
           true
       );
       
       // AJAX設定のローカライズ
       wp_localize_script('theme-script', 'rbAjax', [
           'url' => rest_url('rb/v1/'),
           'nonce' => wp_create_nonce('wp_rest')
       ]);
   }
   
   // デバッグ情報（開発時のみ表示、本番では削除推奨）
   if (WP_DEBUG) {
       add_action('wp_head', function() use ($css_files, $js_files) {
           echo '<!-- Debug: CSS files found: ' . implode(', ', array_map('basename', $css_files)) . ' -->' . "\n";
           echo '<!-- Debug: JS files found: ' . implode(', ', array_map('basename', $js_files)) . ' -->' . "\n";
       });
   }
}

// Custom REST API endpoint
add_action('rest_api_init', 'rb_register_rest_route');
function rb_register_rest_route() {
   register_rest_route('rb/v1', '/lead', [
       'methods' => 'POST',
       'callback' => 'rb_save_lead',
       'permission_callback' => '__return_true'
   ]);
}

function rb_save_lead($request) {
   $params = $request->get_params();
   
   $post_id = wp_insert_post([
       'post_type' => 'rb_lead',
       'post_status' => 'publish',
       'post_title' => 'Lead ' . date('Y-m-d H:i:s'),
       'meta_input' => [
           'step1_postal' => sanitize_text_field($params['postal'] ?? ''),
           'step1_area' => sanitize_text_field($params['area'] ?? ''),
           'step1_age' => sanitize_text_field($params['age'] ?? ''),
           'step2_loan' => sanitize_text_field($params['loan'] ?? ''),
           'step2_purpose' => sanitize_text_field($params['purpose'] ?? ''),
           'step3_name' => sanitize_text_field($params['name'] ?? ''),
           'step3_email' => sanitize_email($params['email'] ?? ''),
           'step3_phone' => sanitize_text_field($params['phone'] ?? ''),
           'estimated_price' => sanitize_text_field($params['estimated_price'] ?? ''),
           'estimated_rent' => sanitize_text_field($params['estimated_rent'] ?? '')
       ]
   ]);
   
   if ($post_id) {
       return new WP_REST_Response(['success' => true, 'id' => $post_id], 200);
   }
   return new WP_REST_Response(['success' => false], 400);
}

// Custom Post Type
add_action('init', 'rb_register_cpt');
function rb_register_cpt() {
   register_post_type('rb_lead', [
       'public' => false,
       'show_ui' => true,
       'menu_icon' => 'dashicons-groups',
       'labels' => [
           'name' => 'リード管理',
           'singular_name' => 'リード'
       ],
       'supports' => ['title']
   ]);
}

// GA4 Code
add_action('wp_head', 'rb_ga4_code');
function rb_ga4_code() { ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXX"></script>
<script>
window.dataLayer=window.dataLayer||[];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config','G-XXXXXXX');
</script>
<?php }

// Load content files
$content_files = [
   'hero', 'pain_relief', 'reasons', 'flow', 'simulator', 'success', 'experts', 'cta', 'pdf-lead'
];
foreach ($content_files as $file) {
   if (file_exists(get_template_directory() . "/content/{$file}.php")) {
       require_once get_template_directory() . "/content/{$file}.php";
   }
}

// JSON content helper
function rb_get_json_content($filename) {
   $file = get_template_directory() . "/content/{$filename}.json";
   return file_exists($file) ? json_decode(file_get_contents($file), true) : [];
}

// Schema.org JSON-LD
add_action('wp_head', 'rb_schema_jsonld');
function rb_schema_jsonld() {
   $schema = [
       '@context' => 'https://schema.org',
       '@graph' => [
           [
               '@type' => 'WebSite',
               'name' => get_bloginfo('name'),
               'url' => home_url(),
               'potentialAction' => [
                   '@type' => 'SearchAction',
                   'target' => home_url('/?s={search_term_string}'),
                   'query-input' => 'required name=search_term_string'
               ]
           ],
           [
               '@type' => 'Organization',
               'name' => get_bloginfo('name'),
               'url' => home_url(),
               'telephone' => '0120-XXX-XXX',
               'address' => [
                   '@type' => 'PostalAddress',
                   'addressCountry' => 'JP'
               ]
           ],
           [
               '@type' => 'FAQPage',
               'mainEntity' => array_map(function($faq) {
                   return [
                       '@type' => 'Question',
                       'name' => $faq['q'],
                       'acceptedAnswer' => [
                           '@type' => 'Answer',
                           'text' => $faq['a']
                       ]
                   ];
               }, rb_get_json_content('faq'))
           ]
       ]
   ];
   echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}

// Theme setup
add_action('after_setup_theme', 'rb_theme_setup');
function rb_theme_setup() {
   add_theme_support('title-tag');
   add_theme_support('post-thumbnails');
   
   // WordPressのデフォルトCSSを無効化（Tailwindと競合する場合）
   add_theme_support('wp-block-styles', false);
   add_theme_support('editor-styles');
}

// WordPressデフォルトのCSSを削除（必要に応じて）
add_action('wp_enqueue_scripts', 'remove_wp_default_styles', 20);
function remove_wp_default_styles() {
   // wp_dequeue_style('wp-block-library'); // ブロックエディターのスタイル
   // wp_dequeue_style('wp-block-library-theme'); // テーマのブロックスタイル
   // wp_dequeue_style('classic-theme-styles'); // クラシックテーマスタイル
}
?>