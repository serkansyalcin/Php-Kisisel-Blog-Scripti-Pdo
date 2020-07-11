$(window).on("load", function() {
    "use strict";



    /*==============================================
                      SIDE MENU
    ===============================================*/

    $(".menu-btn").on("click", function(){
      $(this).toggleClass("active");
      $("body").toggleClass("no-scroll");
      $(".side-menu").toggleClass("active");
    });

    $(".close-sidemenu").on("click", function(){
      $(".side-menu").removeClass("active");
      $(".menu-btn").removeClass("active");
    });
    $(".navigation ul, .side-menu .blog-items").parent().addClass("menu-item-has-children");
    $(".navigation li.menu-item-has-children > a").on("click", function() {
      $(this).parent().toggleClass("active").siblings().removeClass("active");
      $(this).next("ul, .blog-items").slideToggle();
      $(this).parent().siblings().find("ul, .blog-items").slideUp();
      return false;
    });


    /*==============================================
                  SETTING HEIGHT OF DIV
    ===============================================*/

    var cont_height = $(".cont-form-sec").innerHeight();
    $(".cont-img").css({
      "height": cont_height
    });


    /*==============================================
                      PAGE LOADER
    ===============================================*/

    $('.preloader').fadeOut();


    /*==============================================
                      SEARCH PAGE
    ===============================================*/

    $(".search-btn").on("click", function(){
      $(".search-page").addClass("active");
    });
    $(".close-search").on("click", function(){
      $(".search-page").removeClass("active");
    });
    


});


