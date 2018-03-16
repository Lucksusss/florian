(function( $ ) {
  
  jQuery(function() {
    initauto();
    //inithover();
  });

  function initauto() {

    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      fade: true,
      asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 2000,
      centerMode: true,
      centerPadding: '0',
      adaptiveHeight: true,
      cssEase: 'ease',
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        },
      ]
    });
  }
}) ( jQuery );