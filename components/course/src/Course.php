<?php

namespace Frame\Course;

class Course {

  public function __construct() {

    require_once( FRAME_PATH . 'components/course/src/CoursePostList.php' );
    new CoursePostList();

  }

}
