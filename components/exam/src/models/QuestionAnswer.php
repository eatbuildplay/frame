<?php

namespace Frame\Exam\Model;

class QuestionAnswer {

  public $id;
  public $title;
  public $examScore;
  public $user;
  public $question;
  public $questionOption;
  public $correct;
  public $points;

  public function save() {

    if( $this->id > 0 ) {
      $this->update();
    } else {
      $this->id = $this->create();
      if( !$this->id ) {
        return false;
      }
    }

    $uid = get_current_user_id();
    update_post_meta( $this->id, 'user', $uid );
    update_post_meta( $this->id, 'examScore', $examScore );

    if( is_object( $this->question )) {
      update_post_meta( $this->id, 'question', $this->question->id );
    } else {
      update_post_meta( $this->id, 'question', $this->question );
    }

    if( is_object( $this->question )) {
      update_post_meta( $this->id, 'question_option', $this->questionOption->id );
    } else {
      update_post_meta( $this->id, 'question_option', $this->questionOption );
    }

    update_post_meta( $this->id, 'correct', $this->correct );
    update_post_meta( $this->id, 'points', $this->points );

  }

  public function create() {

    $params = [
      'post_type'   => 'question_answer',
      'post_title'  => $this->title,
      'post_status' => 'publish'
    ];
    $postId = wp_insert_post( $params );
    $this->id = $postId;
    return $postId;

  }

  public function update() {



  }

  public static function load( $post ) {

    $obj = new QuestionAnswer;
    $obj->id = $post->ID;
    $obj->title = $post->post_title;

    $fields = get_fields($post);
    $obj->user = $fields['user'];
    $obj->question = $fields['question'];
    $obj->questionOption = $fields['question_option'];

    return $obj;

  }

}
