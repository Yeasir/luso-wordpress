(function ($, window, document,) {
    "use strict";
    var $win = $(window);
    var $doc = $(document);
    var $body = $('body');

    /*
    *
    * ==========================================
    *  Lazy Loader
    * ==========================================
    *
    */

    new LazyLoad();

    /*
*
* ==========================================
*  hero_slider-slider
* ==========================================
*
*/
    var hero_slider = $('.hero-slider');
    if (hero_slider.length > 0) {
        hero_slider.slick({
            autoplay:true,
            autoplaySpeed:2500,
            dots: true,
            infinite: true,
            speed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            lazyLoad: 'progressive',
            prevArrow: "<button type='buttons' class='slick-prev'><i class='fas fa-chevron-left'></i></button>",
            nextArrow: "<button type='buttons' class='slick-next '><i class='fas fa-chevron-right'></i></button>",
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        centerPadding: '0',
                    }
                }

            ]
        });
        hero_slider.on('swipe', function(event, slick, currentSlide, nextSlide){

            console.log(nextSlide);
            new LazyLoad();
        });

    }





    /*
    *
    * ==========================================
    *   sticky nava bar
    * ==========================================
    *
    */

    $win.scroll(function (e) {

        if($(e.target).closest('.navbar-toggler').length == 0) {
            var opened = $('.navbar-collapse').hasClass('collapse');
            if ( opened === true ) {
                $('.navbar-collapse').collapse('hide');
                $('.navbar-toggler').find('.fa').addClass('fa-bars');
                $('.navbar-toggler').find('.fa').removeClass('fas fa-times');
            }
        }

        if ($(window).scrollTop() >= 50) {
            $('#header').addClass('navbar-fixed');
        } else {
            $('#header').removeClass('navbar-fixed');
        }
    });


    /*
    *
    * ==========================================
    *   Menue Toogle
    * ==========================================
    *
    */

    $('body').bind('click', function(e) {
        if($(e.target).closest('.navbar-toggler').length == 0) {
            var opened = $('.navbar-collapse').hasClass('collapse');
            if ( opened === true ) {
                $('.navbar-collapse').collapse('hide');
                $('.navbar-toggler').find('.fa').addClass('fa-bars');
                $('.navbar-toggler').find('.fa').removeClass('fas fa-times');
            }
        }
    });

    $body.on('click', '.navbar-toggler', function (e) {
        e.preventDefault();
        var dd = $(this).attr('aria-expanded');
        if (dd != 'false') {
            $(this).find('.fa').addClass('fa-bars');
            $(this).find('.fa').removeClass('fas fa-times');
        } else {
            $(this).find('.fa').removeClass('fa-bars');
            $(this).find('.fa').addClass('fas fa-times');
        }

    });


    $(".event-modal-item").hide();
    $(".more-info-btn").click(function(){
         $(this).parents('li').find(".event-modal-item").show();
         $(this).hide();
    });

    $(".close-btn").click(function(){
        $(this).parents('li').find(".event-modal-item").hide();
        $(this).parents('li').find('.more-info-btn').show();
    });



    var gallery = ["gallery1", "gallery2", "gallery3", "gallery4", "gallery5", "gallery6", "gallery7", "gallery8", "gallery9", "gallery10"];

    for (var i = 0; i < gallery.length; i++) {
        $('[data-fancybox='+gallery[i]+']').fancybox({
            thumbs : {
                autoStart : true,
                showOnStart : true,
                axis      : 'x'
            },
            beforeShow : function(){
                this.title =  this.title + " - " + $(this.element).data("caption");
            }
        });
    }







    var video = ["video1", "video2", "video3", "video4", "video5", "video6", "video7", "video8", "video9", "video10","video11","video12","video13","video14","video14","video15"];

    for (var i = 0; i < video.length; i++) {
        $('[data-fancybox='+video[i]+']').fancybox({
            thumbs : {
                autoStart : true,
                showOnStart : true,
                axis      : 'x'
            },

            afterShow: function(fb, item, currentIndex){
                var title = $(item.opts.$orig).data("title");
                var url = $(item.opts.$orig).data('product_url');
                var content = $(item.opts.$orig).data('content');


                $(item.opts.$orig).siblings('.active').removeClass('active');
                $(item.opts.$orig).addClass('active');

                if ( $(item.opts.$orig).hasClass('active')){
                    $('.video-caption-content').remove();
                }

                if(title && url && content  ){
                    var customContent = "<div class=\"video-caption-content\">\n" +
                        "                                            <h4>"+title+"</h4>\n" +
                        "                                            <span class=\"mb-2 d-block\">"+content+"</span>\n" +
                        "\n" +
                        "                                            <a data-fancybox=\"gallery\" href="+url+"\n" +
                        "                                               class=\"video-link\">\n" +
                        "                                                    <span class=\"play-btn\">\n" +
                        "                                                         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"119.202\" height=\"99.499\"\n" +
                        "                                                              viewBox=\"0 0 119.202 99.499\">\n" +
                        "                                                          <path id=\"Path_107\" data-name=\"Path 107\" d=\"M1038.5,1305.25v-99.5l119.2,49.75Z\"\n" +
                        "                                                                transform=\"translate(-1038.5 -1205.75)\" fill=\"#fff\"/>\n" +
                        "                                                        </svg>\n" +
                        "                                                    </span>\n" +
                        "                                                Play video\n" +
                        "                                            </a>\n" +
                        "                                        </div>"
                    $('.fancybox-inner').append(customContent);

                }else{
                    $('.video-caption-content').remove();
                }


                // console.log( $(item.opts.$orig).attr('data-status', 'active'));



            }
        });

    }


    $('[data-fancybox="gallery"]').fancybox({
        afterLoad : function(instance, current) {
            instance.update();
        }
    });







    /*
    *
    * ==========================================
    *  back to top
    * ==========================================
    *
    */

    $win.scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });



})(jQuery, window, document);