
$(document).ready(function(){
    var w = 0;
    var itemsQ = 7;

    w = window.innerWidth;

    if(w<780){
        itemsQ = 4;
    }

    if(w<360){
        itemsQ = 2;
    }

    // window.addEventListener('resize', function(){

    //     w = window.innerWidth;

    //     if(w<780){
    //         itemsQ = 3;
    //     }else{
    //         itemsQ = 7;
    //     }

    //     $('#nav-categories').slick({
    //         slidesToShow: itemsQ,
    //         autoplay: true,
    //         autoplaySpeed: 2000,
    //         infinite: true,
    //         arrows: false

    //     });


    //     console.log(itemsQ);

    // });



    $('#nav-categories').slick({
        slidesToShow: itemsQ,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        arrows: false

    });
});









