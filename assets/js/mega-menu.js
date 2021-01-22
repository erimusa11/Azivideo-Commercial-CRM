$(document).ready(function () {
  $(".navbar-light .dmenu").hover(
    function () {
      $(this).find(".sm-menu").first().stop(true, true).slideDown(150);
    },
    function () {
      $(this).find(".sm-menu").slideUp(200);
    }
  );
});

$(document).ready(function () {
  $(".megamenu").on("click", function (e) {
    e.stopPropagation();
  });
});
