<?php require_once("./blog/blog.php");
$blog = new Blog;
?>

<html>
  <head>
    <link rel="stylesheet" href="./utils/style.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    <script src="./utils/main.js"></script>
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
        $test = $blog->getPostByID(1);
        echo '<h1>'. $test->title .'</h1><br />' . $test->body;
      ?>
    </div>
    <div class="about" id="about">
      <img src="./img/cris3.png" class="imgcircle"/>
      <h1>Cristian Pintea</h1>
      <p>
        My name is Cristian Pintea. I am a software engineer.
      </p>
    </div>
  </body>
</html>
