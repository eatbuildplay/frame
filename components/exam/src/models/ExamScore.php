<?php

namespace Frame\Exam\Model;

class ExamScore {

  public $id;
  public $title;
  public $exam;
  public $user;
  public $start;

  public static function load( $post ) {

    // enable passing id and loading post from id
    if( is_numeric( $post )) {
      $post = get_post( $post );
    }

    $obj = new ExamScore;
    $obj->id = $post->ID;
    $obj->title = $post->post_title;

    $fields = get_fields($post);

    $obj->user = $fields['user'];
    $obj->exam = $fields['exam'];
    $obj->start = $fields['start'];

    return $obj;

  }

}
