<?php

namespace Frame\Lesson;

class Lesson {

  public function __construct() {

    add_action('wp_ajax_frame_lesson_list_load', [$this, 'jxListLoad']);
    add_action('wp_ajax_nopriv_frame_lesson_list_load', [$this, 'jxListLoad']);

    // lesson list shortcode
    require_once( FRAME_PATH . 'components/lesson/src/LessonListShortcode.php' );
    new LessonListShortcode();

    require_once( FRAME_PATH . 'components/lesson/src/LessonSingleShortcode.php' );
    new LessonSingleShortcode();

    add_action('wp_enqueue_scripts', [$this, 'addScripts']);

  }

  public function jxListLoad() {

    $response = array();

    $lessons = get_posts(
      [
        'numberposts'	=> -1,
        'post_type' => 'lesson',
        'meta_query'	=> array(
      		'relation'		=> 'AND',
      		array(
      			'key'	 	    => 'course',
      			'value'	  	=> array(3),
      			'compare' 	=> 'IN',
      		)
      	),
      ]
    );

    $response['lessons'] = $lessons;

    print json_encode( $response );

  }

  public function addScripts() {

    wp_enqueue_style(
      'frame-lesson-style',
      FRAME_URL . 'components/lesson/assets/lesson.css',
      array(),
      '1.0.0',
      'all'
    );

    wp_enqueue_script(
      'frame-lesson-js',
      FRAME_URL . 'components/lesson/assets/lesson.js',
      array( 'jquery' ),
      '1.0.0',
      true
    );

  }

}
