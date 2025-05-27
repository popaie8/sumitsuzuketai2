<footer class="site-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png" alt="すみつづけ隊">
                <p class="footer-tagline">リースバック一括査定サイト</p>
            </div>

            <div class="footer-contact">
                <div class="footer-tel">
                    <i class="fas fa-phone-alt"></i> 0120-XXX-XXX
                </div>
                <div class="footer-hours">
                    <span>受付時間：9:00〜19:00（年中無休）</span>
                </div>
            </div>
        </div>

        <!-- アコーディオン形式のフッターメニュー -->
        <div class="footer-accordion">
            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>サービス案内</h3>
                    <span class="accordion-icon"></span>
                </div>
                <div class="accordion-content">
                    <ul>
                        <li><a href="#about-leaseback" class="smooth-scroll">リースバック一括査定とは</a></li>
                        <li><a href="#assessment-flow" class="smooth-scroll">査定の流れ</a></li>
                        <li><a href="#partner-companies" class="smooth-scroll">提携会社一覧</a></li>
                        <li><a href="#faq-section" class="smooth-scroll">よくある質問</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>お役立ち情報</h3>
                    <span class="accordion-icon"></span>
                </div>
                <div class="accordion-content">
                    <ul>
                        <li><a href="#what-is-leaseback" class="smooth-scroll">リースバックとは</a></li>
                        <li><a href="#benefits-section" class="smooth-scroll">リースバックのメリット・デメリット</a></li>
                        <li><a href="#success-cases" class="smooth-scroll">リースバック成功事例</a></li>
                        <li><a href="#market-info" class="smooth-scroll">リースバック相場情報</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-item">
                <div class="accordion-header">
                    <h3>会社情報</h3>
                    <span class="accordion-icon"></span>
                </div>
                <div class="accordion-content">
                    <ul>
                        <li><a href="#company-info" class="smooth-scroll">会社概要</a></li>
                        <li><a href="#privacy-policy" class="smooth-scroll">プライバシーポリシー</a></li>
                        <li><a href="#terms-of-service" class="smooth-scroll">利用規約</a></li>
                        <li><a href="#contact-form" class="smooth-scroll">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="disclaimer-link">
                <a href="#" id="disclaimer-toggle">免責事項を表示</a>
            </div>
            
            <div class="disclaimer" id="disclaimer-content">
                <p>当サイトは最適なリースバック会社をご紹介するサービスです。査定結果や成約を保証するものではありません。表示されている事例や数値は過去の実績に基づくものであり、将来の成果を保証するものではありません。提携会社数や査定会社数は時期により変動する場合があります。</p>
            </div>

            <div class="copyright">
                <p>&copy; 2025 すみつづけ隊 All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<div class="floating-cta" id="floating-cta">
    <a href="#assessment-form" class="smooth-scroll floating-button">
        <i class="fas fa-calculator"></i> 無料査定をスタートする
    </a>
</div>

<div class="exit-intent-popup" id="exit-intent-popup">
    <div class="popup-content">
        <div class="popup-close" id="popup-close">
            <i class="fas fa-times"></i>
        </div>
        <h3 class="popup-title">このページを離れようとしています</h3>
        <p class="popup-subtitle">査定額を確認する最後のチャンスです！</p>
        <div class="popup-form">
            <input type="text" placeholder="郵便番号" class="popup-input">
            <button class="popup-button">査定をスタート</button>
        </div>
        <p class="popup-note">※入力は60秒で完了します。完全無料です。</p>
    </div>
</div>

<!-- アコーディオン機能のインラインスクリプト -->
<script>
// フッターアコーディオン機能
document.addEventListener('DOMContentLoaded', function() {
    // アコーディオンヘッダーのクリックイベント
    var accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(function(header) {
        header.addEventListener('click', function() {
            var item = this.parentElement;
            var isActive = item.classList.contains('active');
            var content = this.nextElementSibling;
            
            // 他のアクティブなアイテムを閉じる
            document.querySelectorAll('.accordion-item').forEach(function(otherItem) {
                if (otherItem !== item && otherItem.classList.contains('active')) {
                    otherItem.classList.remove('active');
                    var otherContent = otherItem.querySelector('.accordion-content');
                    otherContent.style.maxHeight = '0px';
                    otherContent.style.padding = '0 20px';
                }
            });
            
            // クリックしたアイテムの状態を切り替え
            if (isActive) {
                item.classList.remove('active');
                content.style.maxHeight = '0px';
                content.style.padding = '0 20px';
            } else {
                item.classList.add('active');
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.padding = '0 20px 15px';
            }
        });
    });
    
    // 免責事項トグルのクリックイベント
    var disclaimerToggle = document.getElementById('disclaimer-toggle');
    var disclaimerContent = document.getElementById('disclaimer-content');
    
    if (disclaimerToggle && disclaimerContent) {
        disclaimerToggle.addEventListener('click', function(e) {
            e.preventDefault();
            var isActive = disclaimerContent.classList.contains('active');
            
            if (isActive) {
                disclaimerContent.classList.remove('active');
                disclaimerContent.style.maxHeight = '0px';
                disclaimerContent.style.margin = '0';
                this.textContent = '免責事項を表示';
            } else {
                disclaimerContent.classList.add('active');
                disclaimerContent.style.maxHeight = disclaimerContent.scrollHeight + 'px';
                disclaimerContent.style.margin = '0 0 15px';
                this.textContent = '免責事項を隠す';
            }
        });
    }
    
    // ページ読み込み時にデスクトップとモバイル表示を調整
    function adjustAccordions() {
        if (window.innerWidth >= 769) {
            // デスクトップ表示：すべて開く
            document.querySelectorAll('.accordion-item').forEach(function(item) {
                item.classList.add('active');
                var content = item.querySelector('.accordion-content');
                content.style.maxHeight = 'none';
                content.style.padding = '0';
            });
            
            // 免責事項も表示
            if (disclaimerContent) {
                disclaimerContent.classList.add('active');
                disclaimerContent.style.maxHeight = 'none';
                disclaimerContent.style.margin = '0 0 15px';
            }
        } else {
            // モバイル表示：すべて閉じる
            document.querySelectorAll('.accordion-item').forEach(function(item) {
                item.classList.remove('active');
                var content = item.querySelector('.accordion-content');
                content.style.maxHeight = '0px';
                content.style.padding = '0 20px';
            });
            
            // 免責事項も閉じる
            if (disclaimerContent) {
                disclaimerContent.classList.remove('active');
                disclaimerContent.style.maxHeight = '0px';
                disclaimerContent.style.margin = '0';
                if (disclaimerToggle) {
                    disclaimerToggle.textContent = '免責事項を表示';
                }
            }
        }
    }
    
    // 初期化実行
    adjustAccordions();
    
    // リサイズ時の処理
    var resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(adjustAccordions, 200);
    });
});
</script>

<!-- メインJavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>