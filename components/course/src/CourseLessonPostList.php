<?php

namespace Frame\Course;

class CourseLessonPostList extends \Frame\PostList {

  public $loadHook = 'course_lesson_post_list_load';

  public function __construct() {
    parent::__construct();
  }

  public function initShortcode() {
    require_once( FRAME_PATH . 'components/course/src/CourseLessonPostListShortcode.php' );
    new CourseLessonPostListShortcode( $this->frameLoaderKey );
  }

  public function getPostType() {
    return 'lesson';
  }

}
