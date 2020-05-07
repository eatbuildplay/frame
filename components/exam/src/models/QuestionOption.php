<?php

namespace Frame\Exam\Model;

class QuestionOption {

  public $title;
  public $label;
  public $isCorrect;

  public static function load( $post ) {

    $obj = new QuestionOption;
    $obj->title = $post->post_title;

    $fields = get_fields($post);
    $obj->label = $fields['label'];
    $obj->isCorrect = $fields['is_correct'];

    return $obj;

  }

}
