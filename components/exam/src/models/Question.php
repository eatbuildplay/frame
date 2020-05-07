<?php

namespace Frame\Exam\Model;

class Question {

  public $title;
  public $text;
  public $type;
  public $options;

  public static function load( $post ) {

    $obj = new Question;
    $obj->title = $post->post_title;

    $fields = get_fields($post);
    $obj->type = $fields['type'];

    $obj->options = QuestionOptionList::load( $fields['options'] );

    return $obj;

  }

}
