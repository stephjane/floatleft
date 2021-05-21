jQuery(function($){
  $(document).on("scroll", function() {
    $("body").addClass("scrolled");
  });
  
  const navMenu = $("nav ul");
  $(".mobile-nav").on("click", function() {
    $(this).toggleClass("open");
    if($(this).hasClass("open") == true) {
      navMenu.addClass("open");
    } else {
      navMenu.removeClass("open");
    }
  });
  
  //projects carousel
  $('.logos').slick({
    infinite: false,
    slidesToShow: 3,
    centerMode: true,
    slidesToScroll: 1,
    focusOnSelect: true,
    arrows: false,
    swipe: true,
    initialSlide: 2,
    asNavFor: '.projects-row'
  });
  $('.projects-row').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    infinite: false,
    swipe: true,
    initialSlide: 2,
    centerMode: true,
    asNavFor: '.logos'
  });
  $(".slider-container button").text("");
  
  $("button.slick-next").html("<i class='fa fa-arrow-right'></i>");
  $("button.slick-prev").html("<i class='fa fa-arrow-left'></i>");
  
  //load more posts
  const button =  $('#load-more');
  const ppp = $("#post-container").data("number");
  const cat = $("#post-container").data("cat");
  const exclude = $("#post-container").data("exclude");
  let offset = 0;
  
  function loadMorePosts() {
    $.ajax({
      url: "../wp-admin/admin-ajax.php",
      type: 'POST',
      data : {
        action : 'load',
        offset : offset,
        cat : cat,
        exclude : exclude,
        ppp : ppp,
      },
    })
    .done(function(response) {
        if(response != '') {
          $("#post-container").append(response);
        } else {
          button.addClass('disable').text('no more posts');
        }
    });
  }
  
  loadMorePosts();
  button.on("click", function() {
    offset++;
    offset = offset * ppp;
    loadMorePosts();
  });
  
  // //smooth state js
  // AOS.init({
  //   disable: 'mobile'
  // });
  
  // var content  = $('#smoothcontainer').smoothState({
  //   onStart : {
  //     // Set the duration of our animation
  //     duration: 250,
  //     // Alterations to the page
  //     render: function () {
  //       // Quickly toggles a class and restarts css animations
  //       content.toggleAnimationClass('is-exiting');
  //       $body.animate({ 'scrollTop': 0 });
  //     }
  //   }
  // }).data('smoothState'); // makes public methods available
});
