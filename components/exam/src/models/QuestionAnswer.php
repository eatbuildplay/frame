<?php

namespace Frame\Exam\Model;

class QuestionAnswer {

  public $title;

  public static function load( $post ) {

    $obj = new QuestionAnswer;
    $obj->title = $post->post_title;

    $fields = get_fields($post);

    return $obj;

  }

}
