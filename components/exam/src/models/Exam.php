<?php

namespace Frame\Exam\Model;

class Exam {

  public $title;
  public $questions;

  public static function load( $post ) {

    $obj = new Exam;
    $obj->title = $post->post_title;

    $fields = get_fields($post);

    $obj->questions = QuestionList::load( $fields['questions'] );

    return $obj;

  }

}