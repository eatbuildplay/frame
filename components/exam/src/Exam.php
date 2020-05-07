<?php

namespace Frame\Exam;

class Exam {

  public function __construct() {

    add_action('init', [$this, 'registerPostTypes']);

    require_once( FRAME_PATH . 'components/exam/src/ExamSingleShortcode.php' );
    new ExamSingleShortcode();

    // load models
    require_once( FRAME_PATH . 'components/exam/src/models/Exam.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/ExamList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/Question.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionOption.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionOptionList.php' );

    add_action('wp_enqueue_scripts', array( $this, 'scripts' ));

  }

  public function scripts() {

    wp_enqueue_script(
      'exam-js',
      FRAME_URL . 'components/exam/assets/exam.js',
      array( 'jquery' ),
      '1.0.0',
      true
    );

    wp_enqueue_style(
      'exam-css',
      FRAME_URL . 'components/exam/assets/exam.css',
      array(),
      true
    );

  }

  public function registerPostTypes() {

    require_once( FRAME_PATH . 'components/exam/src/ExamPostType.php' );
    $pt = new ExamPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/ExamScorePostType.php' );
    $pt = new ExamScorePostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/ExamSectionPostType.php' );
    $pt = new ExamSectionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/QuestionPostType.php' );
    $pt = new QuestionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/QuestionTypePostType.php' );
    $pt = new QuestionTypePostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/QuestionAnswerPostType.php' );
    $pt = new QuestionAnswerPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/QuestionOptionPostType.php' );
    $pt = new QuestionOptionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/QuestionBankPostType.php' );
    $pt = new QuestionBankPostType();
    $pt->register();

  }

}
