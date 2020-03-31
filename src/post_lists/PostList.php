<?php

namespace Frame;

class PostList {

  public function getPostType() {
    return 'lesson';
  }

  public function initShortcode() {
    require_once( FRAME_PATH . 'src/post_lists/PostListShortcode.php' );
    new PostListShortcode();  
  }

  public function fetchPosts() {

    $posts = get_posts(
      'numberposts' => -1,
      'post_type'   => $this->getPostType()
    );

    return $posts;

  }


}
