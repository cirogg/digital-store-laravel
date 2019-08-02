$(document).ready(function(){
    $('.test-car').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000
    });

    $('#nav-categories').slick({
        slidesToShow: 7,
        autoplay: true,
        autoplaySpeed: 500,
        infinite: true,
        arrows: false

    });
  });
