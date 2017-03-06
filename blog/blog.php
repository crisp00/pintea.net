<?php

$parsedown_dir = "utils/parsedown.php";
$spyc_dir = "utils/spyc.php";

require_once($parsedown_dir);
require_once($spyc_dir);


class Blog{
  var $posts_dir = "blog/articles/";

  public function getPostByID($id){
    $post_filename = $this->posts_dir . $id . ".post";
    if(file_exists($post_filename)){
      $post_file = fopen($post_filename, "r");
      $post = fread($post_file, filesize($post_filename));
      $post_split = explode("+++", $post);
      $post_header = spyc_load($post_split[0]);
      $pd = new Parsedown();
      $post_body = $pd->text($post_split[1]);
      return new Post($post_header["title"], $post_header["date"], $post_header["author"], $post_body);
    }else{
      return null;
    }
  }

  public function getPosts($posts_per_page, $page){
    $files = scandir($this->posts_dir);
    rsort($files);
    $last = str_replace(".post", "", $files[0]);
    $first = intval($last) - ($page - 1) * $posts_per_page;
    $posts = array();
    for($i = 0; $i < $posts_per_page; $i++){
      $post = $this->getPostByID($first - $i);
      if($post != null)
        array_push($posts, $post);
    }
    return $posts;
  }

}

class Post{
  var $title;
  var $date;
  var $author;
  var $body;

  function __construct($title, $date, $author, $body){
    $this->title = $title;
    $this->date = $date;
    $this->author = $author;
    $this->body = $body;
  }

  function getHTML(){
    return "<a href='' class='post-title'>$this->title</a><span class='post-date'>On $this->date by $this->author</span><br />$this->body";
  }

}

?>
