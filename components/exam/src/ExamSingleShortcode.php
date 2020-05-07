<?php

namespace Frame\Exam;

class ExamSingleShortcode {

  public $tag = 'exam-single';

  public function __construct() {
    add_action('init', array( $this, 'init'));
  }

  public function init() {
    add_shortcode($this->tag, array($this, 'doShortcode'));
  }

  public function doShortcode( $atts ) {

    global $post;
    $examFields = get_fields( $post->ID );

    $exam = Model\Exam::load( $post );

    $template = new \Frame\Template();
    $template->path = 'components/exam/templates/';

    $content = '';

    $template->name = 'exam-single';
    $template->data = array(
      'exam' => $exam,
      'examFields' => $examFields
    );
    $content .= $template->get();

    return $content;

  }

}
