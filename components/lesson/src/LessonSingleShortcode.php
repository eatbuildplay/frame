<?php

namespace Frame\Lesson;

class LessonSingleShortcode {

  public $tag = 'lesson-single';

  public function __construct() {
    add_action('init', array( $this, 'init'));
  }

  public function init() {
    add_shortcode($this->tag, array($this, 'doShortcode'));
  }

  public function doShortcode( $atts ) {

    global $post;
    $lesson = $post;
    $lessonFields = get_fields( $lesson->ID );

    $template = new \Frame\Template();
    $template->path = 'components/lesson/templates/';
    $template->name = 'lesson-single-wordscan';
    $template->data = array(
      'lessonFields' => $lessonFields
    );
    return $template->get();

  }

}
