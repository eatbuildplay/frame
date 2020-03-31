<?php

namespace Frame\Lesson;

class LessonListShortcode {

  public $tag = 'lesson-list';

  public function __construct() {
    add_action('init', array( $this, 'init'));
  }

  public function init() {
    add_shortcode($this->tag, array($this, 'doShortcode'));
  }

  public function doShortcode( $atts ) {

    $atts = shortcode_atts( array(), $atts, $this->tag );

    $lessons = get_posts(
      [
        'numberposts'	=> -1,
        'post_type' => 'lesson'/*,
        'meta_query'	=> array(
      		'relation'		=> 'AND',
      		array(
      			'key'	 	    => 'course',
      			'value'	  	=> array(3),
      			'compare' 	=> 'IN',
      		)
      	),*/
      ]
    );

    $template = new \Frame\Template();
    $template->path = 'components/lesson/src/templates/';
    $template->name = 'listing-table-widget';
    $template->data = array(
      'lessons' => $lessons
    );
    return $template->get();

  }

}
