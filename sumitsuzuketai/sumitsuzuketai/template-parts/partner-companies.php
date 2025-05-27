<section id="partner-companies" class="partner-companies">
    <div class="container">
        <h2 class="section-title">提携リースバック会社一覧</h2>
        <p class="section-subtitle">全国200社以上の厳選パートナーから、あなたに最適な会社をご紹介します</p>
        
        <div class="partners-grid">
            <?php for($i = 1; $i <= 10; $i++): ?>
                <div class="partner-logo-container">
                    <div class="partner-logo blurred">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/company-logo-<?php echo $i; ?>.png" alt="提携会社">
                        <div class="privacy-notice">プライバシーポリシーにより社名非公開</div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        
        <div class="partners-feature">
            <div class="partners-feature-item">
                <i class="fas fa-check-circle"></i>
                <p>各社の審査基準を熟知した専門コンシェルジュが最適なマッチングをご提案</p>
            </div>
            <div class="partners-feature-item">
                <i class="fas fa-check-circle"></i>
                <p>利用者の93%が希望条件を満たす提案を受けられています</p>
            </div>
            <div class="partners-feature-item">
                <i class="fas fa-check-circle"></i>
                <p>厳格な審査基準をクリアした優良企業のみを厳選</p>
            </div>
        </div>
    </div>
</section>