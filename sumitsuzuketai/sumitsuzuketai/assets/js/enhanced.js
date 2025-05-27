// 物件事例切り替え機能の強化版JavaScript
jQuery(document).ready(function($) {
  // 初期設定
  var currentIndex = 0;
  var exampleCount = $('.example-container').length;
  var autoRotate = true;
  var rotationInterval = 4000; // 4秒ごとに切り替え
  
  // 初期状態では最初の事例のみ表示
  $('.example-container').hide().eq(0).show().addClass('active');
  
  // ナビゲーションドットをクリック時の動作
  $('.example-nav-dot').click(function() {
    var index = $(this).index();
    showExample(index);
    
    // 自動切り替えを一時停止し、10秒後に再開
    pauseAutoRotation();
    setTimeout(resumeAutoRotation, 10000);
    
    return false;
  });
  
  // 指定したインデックスの事例を表示する関数
  function showExample(index) {
    // すべての事例を非表示
    $('.example-container').removeClass('active').fadeOut(200);
    // アクティブなドットのスタイルをリセット
    $('.example-nav-dot').removeClass('active');
    
    // 少し遅延させて新しい事例を表示（スムーズな遷移のため）
    setTimeout(function() {
      // 指定したインデックスの事例を表示
      $('.example-container').eq(index).addClass('active').fadeIn(300);
      // 対応するドットをアクティブにする
      $('.example-nav-dot').eq(index).addClass('active');
      // 現在のインデックスを更新
      currentIndex = index;
    }, 250);
  }
  
  // 次の事例を表示する関数
  function showNextExample() {
    var nextIndex = (currentIndex + 1) % exampleCount;
    showExample(nextIndex);
  }
  
  // 自動回転を開始
  var rotationTimer;
  
  function startAutoRotation() {
    if (autoRotate) {
      rotationTimer = setInterval(showNextExample, rotationInterval);
    }
  }
  
  // 自動回転を一時停止
  function pauseAutoRotation() {
    clearInterval(rotationTimer);
    autoRotate = false;
  }
  
  // 自動回転を再開
  function resumeAutoRotation() {
    autoRotate = true;
    startAutoRotation();
  }
  
  // スワイプ操作のサポート
  var touchStartX = 0;
  var touchEndX = 0;
  
  $('.examples-wrapper').on('touchstart', function(e) {
    touchStartX = e.originalEvent.touches[0].clientX;
  });
  
  $('.examples-wrapper').on('touchend', function(e) {
    touchEndX = e.originalEvent.changedTouches[0].clientX;
    handleSwipe();
  });
  
  function handleSwipe() {
    var swipeThreshold = 50; // スワイプと認識する最小距離
    
    if (touchEndX < touchStartX - swipeThreshold) {
      // 左スワイプ - 次の事例へ
      showNextExample();
      pauseAutoRotation();
      setTimeout(resumeAutoRotation, 8000);
    }
    
    if (touchEndX > touchStartX + swipeThreshold) {
      // 右スワイプ - 前の事例へ
      var prevIndex = (currentIndex - 1 + exampleCount) % exampleCount;
      showExample(prevIndex);
      pauseAutoRotation();
      setTimeout(resumeAutoRotation, 8000);
    }
  }
  
  // 入場時のアニメーション効果
  function animateExamplesEntry() {
    $('.examples-wrapper').css('opacity', '0');
    $('.example-header').css('opacity', '0');
    
    // ヘッダーをフェードイン
    setTimeout(function() {
      $('.example-header').animate({ opacity: 1 }, 500);
    }, 500);
    
    // 事例一覧をフェードイン
    setTimeout(function() {
      $('.examples-wrapper').animate({ opacity: 1 }, 800);
    }, 800);
  }
  
  // カウントアップアニメーション（リアルタイムカウンター用）
  function animateCounter() {
    var $counter = $('#request-counter');
    var finalValue = parseInt($counter.text().replace(/,/g, ''));
    
    $counter.text('0');
    $({ countValue: 0 }).animate({ countValue: finalValue }, {
      duration: 2000,
      easing: 'swing',
      step: function() {
        $counter.text(Math.floor(this.countValue).toLocaleString());
      },
      complete: function() {
        $counter.text(finalValue.toLocaleString());
      }
    });
  }
  
  // アニメーションの開始
  animateExamplesEntry();
  animateCounter();
  
  // 自動回転を開始
  startAutoRotation();
  
  // CTAボタンのホバーエフェクト強化
  $('.cta-button-main').hover(
    function() {
      $(this).find('span').css('transform', 'scale(1.05)');
    },
    function() {
      $(this).find('span').css('transform', 'scale(1)');
    }
  );
  
  // スムーズスクロール
  $('a[href^="#"]').click(function() {
    var target = $(this.hash);
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - 80 // ヘッダーの高さを考慮
      }, 800, 'swing');
      return false;
    }
  });
});