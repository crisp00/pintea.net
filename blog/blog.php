<?php

$parsedown_dir = "utils/parsedown.php";
$spyc_dir = "utils/spyc.php";

require_once($parsedown_dir);
require_once($spyc_dir);


class Blog{
  var $posts_dir = "blog/articles/";

  public function getPostByID($id){
    $post_filename = $this->posts_dir . $id . ".post";
    $post_file = fopen($post_filename, "r");
    $post = fread($post_file, filesize($post_filename));
    $post_split = explode("+++", $post);
    $post_header = spyc_load($post_split[0]);
    $pd = new Parsedown();
    $post_body = $pd->text($post_split[1]);
    return new Post($post_header["title"], $post_header["date"], $post_body);
  }

}

class Post{
  var $title;
  var $date;
  var $body;

  function __construct($title, $date, $body){
    $this->title = $title;
    $this->date = $date;
    $this->body = $body;
  }

}

?>
