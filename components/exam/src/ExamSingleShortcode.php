<?php

namespace Frame\Exam;

class ExamSingleShortcode {

  public $tag = 'exam-single';

  public function __construct() {

    add_action('init', array( $this, 'init'));

    add_action( 'wp_ajax_frame_exam_question_load', array( $this, 'jxQuestionLoad'));
    add_action( 'wp_ajax_frame_exam_exam_load', array( $this, 'jxExamLoad'));

  }

  public function jxExamLoad() {

    $examId = $_POST['examId'];
    $exam = Model\Exam::load( $examId );

    $response = array(
      'exam' => $exam
    );
    print json_encode( $response );

    wp_die();

  }

  public function jxQuestionLoad() {

    $questionId = $_POST['questionId'];
    $question = Model\Question::load( $questionId );

    $response = array(
      'question' => $question
    );
    print json_encode( $response );

    wp_die();

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

    // main template
    $template->name = 'exam-single';
    $template->data = array(
      'exam' => $exam,
      'examFields' => $examFields
    );
    $content .= $template->get();

    // exam controls template
    $template->name = 'exam-single-controls';
    $template->data = array();
    $content .= $template->get();

    // question template
    $template->name = 'question-single';
    $content .= $template->get();

    // question options template
    $template->name = 'question-option-single';
    $content .= $template->get();

    // end screen template
    $template->name = 'exam-single-end';
    $template->data = array();
    $content .= $template->get();

    return $content;

  }

}
