<?php
/**
 * Success Cases / Testimonials Section (住み続け隊)
 *
 * - 4 static cases for MVP
 * - Modern carousel display with navigation
 * - Category icons and property images
 * - JSON-LD Review schema included for rich results
 */

// Define the case data array
$success_cases = [
  [
    'id' => 1,
    'category' => '住宅ローン滞納',
    'icon' => 'home',
    'color' => '#e74c3c',
    'profile' => 'H.T様 （65歳・自営業引退／夫婦2人）',
    'property' => 'マンション 68㎡　築12年（東京都板橋区）',
    'need' => '住宅ローンを3か月連続で滞納。金融機関から「競売手続き開始」の通知が届き、<strong>90日以内に約560万円</strong>を用意しなければ退去の危機。',
    'before' => [
      '住宅ローン残高' => '2,800 万円',
      '月々の返済' => '11.3 万円',
      '手元資金' => '50 万円'
    ],
    'after' => [
      '住宅ローン残高' => '0 円',
      '賃料' => '9.2 万円',
      '手元資金' => '610 万円'
    ],
    'story' => '「老後に家を失うのでは」と眠れない日々。<strong>住み続け隊が5社に一括交渉</strong>し、想定より15％高い売却額に。返済も完了し、退去せずに夫婦の暮らしを守れました。',
    'quote' => 'あと3か月で競売…という恐怖から解放されました',
    'rating' => 5,
    'image' => 'assets/img/case1-mansion.jpg',
    'cta' => '私も無料で査定してもらう'
  ],
  [
    'id' => 2,
    'category' => '事業資金',
    'icon' => 'briefcase',
    'color' => '#3498db',
    'profile' => 'S.K様 （42歳・飲食店オーナー／妻＋子2人）',
    'property' => '木造戸建て 96㎡　築22年（大阪府吹田市）',
    'need' => '2号店開業チャンスが到来。しかし金融機関の融資審査は最短でも1.5か月待ち。<strong>開業予定日まで4週間</strong>しかない──。',
    'before' => [
      '必要資金' => '1,000 万円',
      '借入金利' => '実質年 2.9 %',
      '毎月返済' => '15 万円 予定'
    ],
    'after' => [
      '資金状況' => 'クリア',
      '金利' => '―',
      '賃料' => '10.8 万円'
    ],
    'story' => '「チャンスを逃したくない」一心で相談。<strong>48時間で契約→着金</strong>でき、予定通りオープン。家族も店も守れました。',
    'quote' => '銀行よりスピードが桁違い！',
    'rating' => 5,
    'image' => 'assets/img/case2-house.jpg',
    'cta' => '48時間で資金調達する'
  ],
  [
    'id' => 3,
    'category' => '介護費用',
    'icon' => 'heart',
    'color' => '#9b59b6',
    'profile' => 'M.Y様 （53歳・会社員／母親と同居）',
    'property' => 'マンション 54㎡　築18年（神奈川県横浜市）',
    'need' => '認知症の母を24h 介護できず、<strong>入居一時金400万円</strong>が急ぎで必要。',
    'before' => [
      '一時金資金' => '120 万円 不足',
      '月々家計' => '賃貸移転なら +7 万円',
      '感情負担' => '同居の限界'
    ],
    'after' => [
      '資金状況' => '確保',
      '家賃' => '7.4 万円', 
      '生活環境' => '在宅＋施設の両立'
    ],
    'story' => '住み慣れた家を離れずに母の介護を両立できる道を提案してもらい、<strong>涙が出るほど安心</strong>しました。',
    'quote' => '"家も母も守れた" これ以上の選択肢はありません',
    'rating' => 5,
    'image' => 'assets/img/case3-condo.jpg',
    'cta' => '介護費用を準備する'
  ],
  [
    'id' => 4,
    'category' => '学費',
    'icon' => 'graduation-cap',
    'color' => '#2ecc71',
    'profile' => 'T.I様 （48歳・公務員／妻＋高校3年の長女）',
    'property' => '鉄骨戸建て 110㎡　築20年（愛知県名古屋市）',
    'need' => '国公立に合格した娘の<strong>4年間学費＋仕送り 約650万円</strong>を一括で用意したい。教育ローンは金利と手続きがネック。',
    'before' => [
      '必要総額' => '650 万円',
      '月々返済' => 'なし',
      '将来の買戻し' => '―'
    ],
    'after' => [
      '資金状況' => '全額確保',
      '賃料' => '8.6 万円',
      '買戻し' => '5年以内に優先権'
    ],
    'story' => '進学祝いと同時に資金不安が消え、<strong>「思いっきり学んで来い」と背中を押せました</strong>。買戻し優先権付きで家族の将来設計もキープ。',
    'quote' => '娘の夢を金銭面で諦めさせずに済んだ！',
    'rating' => 5,
    'image' => 'assets/img/case4-house.jpg',
    'cta' => '学費を一括準備する'
  ]
];
?>

<section id="success-cases" class="success-cases">
  <div class="container">
    <div class="sc-header">
      <h2 class="sc-title">利用者の声</h2>
      <p class="sc-summary">
        総合満足度 <span class="rate">4.8 / 5.0</span>
        （<span class="percentage">98%</span> が「また利用したい」と回答）
      </p>
    </div>

    <div class="sc-carousel">
      <!-- Navigation Arrows -->
      <button class="sc-nav sc-nav-prev" aria-label="前のケースを見る">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
      </button>
      
      <button class="sc-nav sc-nav-next" aria-label="次のケースを見る">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </button>

      <!-- Testimonial Cards -->
      <div class="sc-slides">
        <?php foreach ($success_cases as $index => $case): ?>
          <div class="sc-slide <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>">
            <div class="sc-card">
              <div class="sc-card-inner">
                <!-- Image Column -->
                <div class="sc-image-col">
                  <img src="<?php echo esc_url(get_theme_file_uri($case['image'])); ?>" alt="<?php echo esc_attr($case['category']); ?>の事例" class="sc-property-img">
                  <div class="sc-category" style="--category-color: <?php echo $case['color']; ?>">
                    <span class="sc-icon sc-icon-<?php echo $case['icon']; ?>"></span>
                    <span class="sc-category-text"><?php echo $case['category']; ?></span>
                  </div>
                </div>
                
                <!-- Content Column -->
                <div class="sc-content-col">
                  <!-- Header -->
                  <div class="sc-content-header">
                    <div class="sc-rating">
                      <?php for ($i = 0; $i < 5; $i++): ?>
                        <span class="sc-star <?php echo $i < $case['rating'] ? 'sc-star-filled' : ''; ?>"></span>
                      <?php endfor; ?>
                    </div>
                    <blockquote class="sc-quote">"<?php echo $case['quote']; ?>"</blockquote>
                    <div class="sc-profile"><?php echo $case['profile']; ?></div>
                    <div class="sc-property-detail"><?php echo $case['property']; ?></div>
                  </div>
                  
                  <!-- Burning Need -->
                  <div class="sc-need">
                    <?php echo $case['need']; ?>
                  </div>
                  
                  <!-- Before/After -->
                  <div class="sc-comparison">
                    <h4 class="sc-comparison-title">Before / After 比較</h4>
                    <div class="sc-comparison-table">
                      <div class="sc-comparison-row sc-comparison-header">
                        <div class="sc-comparison-cell"></div>
                        <div class="sc-comparison-cell">売却前</div>
                        <div class="sc-comparison-cell">リースバック後</div>
                      </div>
                      
                      <?php 
                      $before_keys = array_keys($case['before']);
                      foreach ($before_keys as $i => $key): 
                      ?>
                        <div class="sc-comparison-row">
                          <div class="sc-comparison-cell"><?php echo $key; ?></div>
                          <div class="sc-comparison-cell"><?php echo $case['before'][$key]; ?></div>
                          <div class="sc-comparison-cell sc-highlight"><?php echo array_values($case['after'])[$i]; ?></div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                  
                  <!-- Story -->
                  <div class="sc-story">
                    <?php echo $case['story']; ?>
                  </div>
                  
                  <!-- CTA -->
                  <div class="sc-cta-container">
                    <a href="#ctaForm" class="sc-cta-button">
                      <?php echo $case['cta']; ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      
      <!-- Dots -->
      <div class="sc-dots">
        <?php foreach ($success_cases as $index => $case): ?>
          <button 
            class="sc-dot <?php echo $index === 0 ? 'active' : ''; ?>" 
            data-slide="<?php echo $index; ?>"
            aria-label="事例 <?php echo $index + 1; ?> に移動">
          </button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- JSON-LD Review Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    <?php foreach ($success_cases as $index => $case): ?>
    {
      "@type": "Review",
      "author": {"@type":"Person","name":"<?php echo substr($case['profile'], 0, strpos($case['profile'], '様')); ?>"},
      "itemReviewed": {"@type":"Product","name":"住み続け隊 リースバック"},
      "reviewRating": {"@type":"Rating","ratingValue":"<?php echo $case['rating']; ?>","bestRating":"5"},
      "reviewBody": "<?php echo $case['quote']; ?>",
      "image": "<?php echo get_theme_file_uri($case['image']); ?>",
      "datePublished": "2025-05-13"
    }<?php echo ($index < count($success_cases) - 1) ? ',' : ''; ?>
    <?php endforeach; ?>
  ]
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Get all necessary elements
  const slides = document.querySelectorAll('.sc-slide');
  const dots = document.querySelectorAll('.sc-dot');
  const prevButton = document.querySelector('.sc-nav-prev');
  const nextButton = document.querySelector('.sc-nav-next');
  const totalSlides = slides.length;
  let currentSlide = 0;
  
  // Function to show a specific slide
  function showSlide(index) {
    // Hide all slides
    slides.forEach(slide => {
      slide.classList.remove('active');
    });
    
    // Deactivate all dots
    dots.forEach(dot => {
      dot.classList.remove('active');
    });
    
    // Show the selected slide
    slides[index].classList.add('active');
    
    // Activate the corresponding dot
    dots[index].classList.add('active');
    
    // Update current slide index
    currentSlide = index;
  }
  
  // Add click event to dots
  dots.forEach(dot => {
    dot.addEventListener('click', function() {
      const slideIndex = parseInt(this.getAttribute('data-slide'));
      showSlide(slideIndex);
    });
  });
  
  // Add click event to prev button
  prevButton.addEventListener('click', function() {
    let newIndex = currentSlide - 1;
    if (newIndex < 0) {
      newIndex = totalSlides - 1;
    }
    showSlide(newIndex);
  });
  
  // Add click event to next button
  nextButton.addEventListener('click', function() {
    let newIndex = currentSlide + 1;
    if (newIndex >= totalSlides) {
      newIndex = 0;
    }
    showSlide(newIndex);
  });
  
  // Show the first slide initially
  showSlide(0);
});
</script>