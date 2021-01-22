$(document).ready(function () {
  //loop through every li of categor-list class
  $(".category-list>li").each(function () {
    //if the li element has class has-sub
    if ($(this).hasClass("has-sub")) {
      //on hover add class
      $(this).hover(function () {
        $(this).addClass("category-list-width");
      });
    } else {
      //on leave remove class
      $(".not-has-sub").mouseenter(function () {
        $(".has-sub").removeClass("category-list-width");
      });
    }
  });

  $(".category-level-2").children("ul").addClass("video-sub-category");
});
