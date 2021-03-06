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

    // get next lesson
    // $lessonFields['display_order']
    $nextLesson = false; // default false
    $lessons = get_posts([
      'post_type'   => 'lesson',
      'orderby'     => 'meta_value_num',
      'order'       => 'ASC',
      'meta_key'    => 'display_order',
      'meta_query'  => [
        [
          'key'     => 'display_order',
          'value'   => $lessonFields['display_order'],
          'compare' => '>'
        ],
        [
          'key'     => 'course',
          'value'   => $lessonFields['course'],
          'compare' => '='
        ]
      ]
    ]);
    if( !empty( $lessons )) {
      $nextLesson = $lessons[0];
      $nextLesson->url = get_permalink( $nextLesson );
    }

    // localize lesson data
    wp_localize_script(
      'frame-lesson-js',
      'frameLesson',
      [
        'fields'      => $lessonFields,
        'post'        => $lesson,
        'nextLesson'  => $nextLesson
      ]
    );

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
