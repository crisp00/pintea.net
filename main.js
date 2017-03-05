window.onload = function(){
  var sidebar = document.getElementById("sidebar");
  var blogLink = document.getElementById("blogLink");
};

function home(){
  $("#blog").css("display", "none");
  $("#about").css("display", "none");
  $("#sidebar").animate({"width": "100%"}, function(){
    $("#sidebar").css("right", "0");
    $("#sidebar").css("left", "0");
  });

}

function about(){
  $("#sidebar").animate({"width": "100%"}, 200, function(){
    $("#sidebar").css("right", "0");
    $("#sidebar").css("left", "auto");
    $("#blog").css("display", "none");
    $("#about").css("display", "block");
    $("#sidebar").animate({"width": "20rem"});
  });

}

function blog(){
  $("#sidebar").animate({"width": "100%"}, 200, function(){
    $("#sidebar").css("left", "0");
    $("#sidebar").css("right", "auto");
    $("#about").css("display", "none");
    $("#blog").css("display", "block");
    $("#sidebar").animate({"width": "20rem"});
  });
}
