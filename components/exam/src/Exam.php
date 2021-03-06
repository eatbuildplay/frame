<?php

namespace Frame\Exam;

class Exam {

  public function __construct() {

    add_action('init', [$this, 'registerPostTypes']);

    require_once( FRAME_PATH . 'components/exam/src/shortcodes/ExamSingleShortcode.php' );
    new ExamSingleShortcode();

    // load models
    require_once( FRAME_PATH . 'components/exam/src/models/Exam.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/ExamList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/ExamScore.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/ExamScoreList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/ExamScoreQuestion.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/ExamScoreQuestionList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/Question.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionOption.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionOptionList.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionAnswer.php' );
    require_once( FRAME_PATH . 'components/exam/src/models/QuestionAnswerList.php' );


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

    require_once( FRAME_PATH . 'components/exam/src/cpt/ExamPostType.php' );
    $pt = new ExamPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/ExamScorePostType.php' );
    $pt = new ExamScorePostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/ExamScoreQuestionPostType.php' );
    $pt = new ExamScoreQuestionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/ExamSectionPostType.php' );
    $pt = new ExamSectionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/QuestionPostType.php' );
    $pt = new QuestionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/QuestionTypePostType.php' );
    $pt = new QuestionTypePostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/QuestionAnswerPostType.php' );
    $pt = new QuestionAnswerPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/QuestionOptionPostType.php' );
    $pt = new QuestionOptionPostType();
    $pt->register();

    require_once( FRAME_PATH . 'components/exam/src/cpt/QuestionBankPostType.php' );
    $pt = new QuestionBankPostType();
    $pt->register();

  }

}
