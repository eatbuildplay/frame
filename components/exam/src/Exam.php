<?php

namespace Frame\Exam;

class Exam {

  public function __construct() {

    add_action('init', [$this, 'registerPostTypes']);

    require_once( FRAME_PATH . 'components/exam/src/ExamSingleShortcode.php' );
    new ExamSingleShortcode();


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
