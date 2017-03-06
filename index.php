<?php require_once("./blog/blog.php");
define("path", "http://localhost/pintea/pintea.net");

function path(){
  echo path;
}

$blog = new Blog;
?>

<html>
  <head>
    <link rel="stylesheet" href="<?php path();?>/utils/style.css" />
    <script>
    <?php
      echo "var path = '". path ."';";
      if(isset($_GET["start"]))
        echo "var start = '". $_GET['start'] ."';";
      if(isset($_GET["view"]))
        echo "var view = '". $_GET['view'] ."';";
    ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="<?php path();?>/utils/main.js"></script>
  </head>
  <body>
    <div class="sidebar" id="sidebar">
      <h1>Cristian Pintea</h1>
      <p>
        My name is Cristian Pintea. I am a software engineer.
      </p>
      <a href="javascript:home();" id="homeLink">Home</a><br />
      <a href="javascript:about();" id="aboutLink">About Me</a><br />
      <a href="javascript:blog();" id="blogLink">Blog</a>
    </div>
    <div class="blog" id="blog">
      <?php
      if(isset($_GET["view"])){
        echo $blog->getPostByID($_GET["view"])->getHTML();
      }else{
        $posts = $blog->getPosts(5, 1);
        foreach($posts as $post){
          echo $post->getHTML();
          echo "<hr />";
        }
      }
      ?>
    </div>
    <div class="about" id="about">
      <img src="<?php path();?>/img/cris.png" class="imgcircle"/>
      <h1>Cristian Pintea</h1>
      <p>
        My name is Cristian Pintea. I am a software engineer.
      </p>
    </div>
  </body>
</html>
