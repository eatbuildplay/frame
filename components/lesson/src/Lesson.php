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

}
