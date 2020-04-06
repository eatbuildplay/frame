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

    $content = '';

    // tabs
    $template->name = 'lesson-single-tabs';
    $template->data = array();
    $content .= $template->get();

    // wordscan
    $template->name = 'lesson-single-wordscan';
    $template->data = array(
      'lessonFields' => $lessonFields
    );
    $content .= $template->get();

    // flashcards
    $template->name = 'lesson-single-flashcards';
    $template->data = array(
      'lessonFields' => $lessonFields
    );
    $content .= $template->get();

    // word selection
    $template->name = 'lesson-single-word-selection';
    $template->data = array(
      'lessonFields' => $lessonFields
    );
    $content .= $template->get();

    // tabs
    $template->name = 'lesson-single-footer';
    $template->data = array();
    $content .= $template->get();

    return $content;

  }

}
