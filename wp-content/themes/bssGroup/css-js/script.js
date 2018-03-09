$(document).ready(function () {
    "use strict";
    
    $(".companys-slider").slick({
        autoplay:true, // Enables Autoplay
        arrows:true,
        autoplaySpeed:8000, // Autoplay Speed in milliseconds
        speed:500, // Transition Speed In Milliseconds
        slidesToShow:3, // Number of the visible slides in desktops
        slidesToScroll:1, // Slide's Number To Scroll
        responsive:[
            {breakpoint:981,settings:{
                slidesToShow:2, // Number of the visible slides in Tablets
            }},
            
            {breakpoint:641,settings:{
                slidesToShow:1, // Number of the visible slides in Mobile
            }},
        ],
    });
    
    $(".events-slider").slick({
        autoplay:false, // Enables Autoplay
        arrows:true,
        appendArrows:'.events-slider + .section-controll',
        speed:500, // Transition Speed In Milliseconds
        rows:2, // Number of the visible slides in desktops
        slidesPerRow:3, // Number of the visible slides in desktops
        slidesToScroll:1, // Slide's Number To Scroll
        adaptiveHeight:true,
        responsive:[
            {breakpoint:768,settings:{
                slidesPerRow:2,
            }},
            
            {breakpoint:641,settings:{
                slidesPerRow:1,
            }},
        ],
    });
    
    $(".media-slider").slick({
        autoplay:false, // Enables Autoplay
        arrows:true,
        appendArrows:'.media-slider + .section-controll',
        speed:500, // Transition Speed In Milliseconds
        rows:2, // Number of the visible slides in desktops
        slidesPerRow:3, // Number of the visible slides in desktops
        slidesToScroll:1, // Slide's Number To Scroll
        adaptiveHeight:true,
        responsive:[
            {breakpoint:768,settings:{
                slidesPerRow:2,
            }},
            
            {breakpoint:641,settings:{
                slidesPerRow:1,
            }},
        ],
    });
    
    $(".news-slider").slick({
        autoplay:false, // Enables Autoplay
        arrows:true,
        appendArrows:'.news-slider + .section-controll',
        speed:500, // Transition Speed In Milliseconds
        slidesToShow:2, // Number of the visible slides in desktops
        slidesToScroll:1, // Slide's Number To Scroll
        adaptiveHeight:true,
        responsive:[
            {breakpoint:768,settings:{
                slidesToShow:2,
            }},
            
            {breakpoint:641,settings:{
                slidesToShow:1,
            }},
        ],
    });
    
    $(".team-slider").slick({
        autoplay:false, // Enables Autoplay
        rtl:true,
        speed:500, // Transition Speed In Milliseconds
        slidesToShow:3, // Number of the visible slides in desktops
        slidesToScroll:1, // Slide's Number To Scroll
        adaptiveHeight:true,
        responsive:[
            {breakpoint:768,settings:{
                slidesToShow:2,
            }},
            
            {breakpoint:641,settings:{
                slidesToShow:1,
            }},
        ],
    });
    
    $('.scroll-down').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });
    $('.ContactUsSubmit').on('click',function(){

        var name = $('.ContactUs #name').val();
        var email = $('.ContactUs #email').val();
        var message = $('.ContactUs #message').val();

        // call ajax
        $.ajax({
            url:ajax_url,
            type:'POST',
            data:
            {
                action:'my_special_ajax_call',
                name:name,
                email:email,
                message:message,
            },

            success:function(results)
            {
                console.log(results);
                $('#styled-modal .modal-body').html('<p>' + results['success'] +'</p>');
                $('#styled-modal').toggleClass("active")
            }
        });
    }); 
   $('.image-link').magnificPopup({type:'image',gallery: {
      enabled: true
    },});
});