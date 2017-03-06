

window.onload = function(){
  if(typeof start !== "undefined"){
    if(start == "blog"){
      blog();
    }else if(start == "about"){
      about();
    }
  }else{
    home();
  }
};

window.onpopstate = function(event){
  if(event.state.pageName == "home"){
    home();
  }else if(event.state.pageName == "about"){
    about();
  }else if(event.state.pageName == "blog"){
    blog();
  }
};

function home(){
  window.history.pushState({"pageName":"home"},"Cristian Pintea - About Me", path);
  $("#sidebar").animate({"width": "100%"}, function(){
    $("#blog").css("display", "none");
    $("#about").css("display", "none");
    $("#sidebar").css("right", "0");
    $("#sidebar").css("left", "0");
  });

}

function about(){
  window.history.pushState({"pageName":"about"},"Cristian Pintea - About Me", path + "/about/");
  $("#sidebar").animate({"width": "100%"}, 200, function(){
    $("#sidebar").css("right", "0");
    $("#sidebar").css("left", "auto");
    $("#blog").css("display", "none");
    $("#about").css("display", "block");
    $("#sidebar").animate({"width": "20rem"});
  });

}

function blog(){
  if(typeof view === "undefined"){
    window.history.pushState({"pageName":"blog"}, "Cristian Pintea - About Me", path + "/blog/");
  }
  $("#sidebar").animate({"width": "100%"}, 200, function(){
    $("#sidebar").css("left", "0");
    $("#sidebar").css("right", "auto");
    $("#about").css("display", "none");
    $("#blog").css("display", "block");
    $("#sidebar").animate({"width": "20rem"});
  });
}
