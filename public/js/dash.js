$(document).ready(function () {
  $(".open").click(function() {
    $(".sidemenu").css("width","300px");
    $("#main").css("margin-left","300px");
  });

  $(".closebtn").click(function () {
    $(".sidemenu").css("width","0px");
    $("#main").css("margin-left","0px");
  });
});
