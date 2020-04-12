<?php

namespace Frame\Course;

class CoursePostList extends \Frame\PostList {

  public $frameLoaderKey = 'coursePostList';
  public $loadHook = 'frame_post_list_load';

  public function __construct() {
    parent::__construct();
  }

}
