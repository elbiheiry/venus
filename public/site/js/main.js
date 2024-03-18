/* Loading
===============================*/
paceOptions = {
  ajax: true,
  document: true,
  eventLag: false,
};
Pace.on("done", function () {
  $(".pace")
    .delay(200)
    .animate({ width: "100%" }, 200)
    .animate({ opacity: "0" }, 10);
  $(".preloader").delay(450).animate({ top: "-100%" }, 100);
  $("body").delay(550).css({ "overflow-y": "auto" }, 50);
  $("header").delay(600).animate({ top: "0", opacity: "1" }, 100);
  $(".main_section h1").delay(700).animate({ top: "0", opacity: "1" }, 100);
  $(".main_section h3").delay(800).animate({ top: "0", opacity: "1" }, 100);
  $(".main_section .link").delay(900).animate({ top: "0", opacity: "1" }, 100);
  $(".brands .brand1").delay(950).animate({ top: "0", opacity: "1" }, 50);  
  $(".brands .brand2").delay(1000).animate({ top: "0", opacity: "1" }, 50);  
  $(".brands .brand3").delay(1050).animate({ top: "0", opacity: "1" }, 50);  
  $(".brands .brand4").delay(1100).animate({ top: "0", opacity: "1" }, 50);
});

$(window).on("load", function () {
  "use strict";
  AOS.init({
    offset: 100,
    duration: 500,
    easing: "ease-in-out",
  });
});

/* Mouse Cursor
=================================*/
$(document).mousemove(function (e) {
  $(".cursor").eq(0).css({
    left: e.clientX,
    top: e.clientY,
  });
  $("a, button").mouseenter(function () {
    $(".cursor").css({
      "background-color": "rgba(254, 171, 24, 0.5)",
      width: "35px",
      height: "35px",
    });
  });
  $("a, button ").mouseleave(function () {
    $(".cursor").css({
      "background-color": "rgba(254, 171, 24, 1)",
      width: "15px",
      height: "15px",
    });
  });
});

$(document).ready(function () {
  "use strict";
  //Header
  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll >= 20) {
      $("header").addClass("move shadow");
    } else {
      $("header").removeClass("move shadow");
    }
  });
  // Search
  $(".search_btn").click(function () {
    $(".search").toggleClass("move");
  });
  
  // Media Slider
  $(".media_slider").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    smartSpeed: 3000,
    autoplayHoverPause: true,
    margin: 25,
    autoplay: true,
    rtl: true,
    responsive: {
      0: { items: 1, margin: 10 },
      576: { items: 2 },
      768: { items: 2 },
      992: { items: 3 },
      1200: { items: 4 },
    },
  });
  // Brands Slider
  $(".brands_slider").owlCarousel({
    loop: false,
    nav: false,
    dots: false,
    smartSpeed: 3000,
    autoplayHoverPause: true,
    margin: 35,
    autoplay: true,
    rtl: true,
    responsive: {
      0: { items: 2, margin: 10 },
      576: { items: 3 },
      768: { items: 4 },
      992: { items: 5 },
      1200: { items: 6 },
    },
  });
  //  fancybox
  $("[data-fancybox]").fancybox({
    buttons: ["zoom", "slideShow", "fullScreen", "download", "thumbs", "close"],
  });
});
