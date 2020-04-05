<?php

namespace Frame;

class PostList {

  public function __construct() {

    $this->initShortcode();
    $this->initAjaxHooks();

    add_action('wp_enqueue_scripts', [$this, 'addScripts']);

  }

  public function getPostType() {
    return 'phrase';
  }

  public function initShortcode() {
    require_once( FRAME_PATH . 'src/post_lists/PostListShortcode.php' );
    new PostListShortcode();
  }

  public function initAjaxHooks() {
    add_action('wp_ajax_frame_post_list_load', [$this, 'ajaxListLoad']);
    add_action('wp_ajax_nopriv_frame_post_list_load', [$this, 'ajaxListLoad']);
  }

  public function fetchPosts( $metaquery, $taxquery ) {

    $postType = $this->getPostType();
    $posts = get_posts( array(
        'numberposts' => -1,
        'post_type'   => $postType,
        'meta_query'  => $metaquery,
        'tax_query'   => $taxquery
      )
    );

    return $posts;

  }

  public function addScripts() {

    wp_enqueue_style(
      'frame-post-list-css',
      FRAME_URL . 'src/post_lists/assets/post_list.css',
      array(),
      '1.0.0',
      'all'
    );

    wp_enqueue_script(
      'frame-post-list-js',
      FRAME_URL . 'src/post_lists/assets/post_list.js',
      array( 'jquery' ),
      '1.0.0',
      true
    );

    wp_localize_script(
      'frame-post-list-js',
      'frame',
      [
        'ajaxurl' => admin_url( 'admin-ajax.php' )
      ]
    );

  }

  public function ajaxListLoad() {

    // get filter values
    $filters = $_POST['filters'];

    // setup metaquery
    $metaquery = [];
    $metaquery['relation'] = 'AND';

    /*
    if( $filters['propertyType'] ) {

      $metaquery[] = array(
        'key'	  	=> 'property_type',
        'value'	  => $filters['propertyType'],
        'compare' => '=',
      );

    }
    */
    $taxquery = [];
    if( $filters['topic'] ) {
      $taxquery = array(
        array(
          'taxonomy' => 'topic',
          'field'    => 'term_id',
          'terms'    => $filters['topic'],
          'include_children' => false
        )
      );
    }

    $posts = $this->fetchPosts( $metaquery, $taxquery );

    // setup template
    $template = new Template();
    $template->path = 'src/post_lists/templates/';
    $template->name = 'post-list-item';

    // load list template
    if( !empty( $posts )) :
      foreach( $posts as $post ) :
        $template->data = array(
          'post' => $post,
        );
        $content .= $template->get();
      endforeach;
    endif;

    // send response and exit
    $response = [
      'posts'       => $posts,
      'content'     => $content,
      'status'      => 'success'
    ];
    print json_encode( $response );
    wp_die();

  }

}
