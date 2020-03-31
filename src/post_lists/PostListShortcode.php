<?php

namespace Frame;

class PostListShortcode {

  public $tag = 'frame-post-list';

  public function __construct() {
    add_action('init', array( $this, 'init'));
  }

  public function init() {
    add_shortcode($this->tag, array($this, 'doShortcode'));
  }

  public function doShortcode( $atts ) {

    $atts = shortcode_atts( array(), $atts, $this->tag );

    $template = new Template();
    $template->path = 'src/post_lists/templates/';
    $template->name = 'post-list-canvas';
    $template->data = array();
    return $template->get();

  }

}
