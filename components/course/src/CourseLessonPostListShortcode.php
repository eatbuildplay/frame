<?php

namespace Frame\Course;

class CourseLessonPostListShortcode extends \Frame\PostListShortcode {

  public $tag = 'course-lesson-post-list';

  public function __construct( $frameLoaderKey ) {
    parent::__construct( $frameLoaderKey );
  }

}
