<?php

namespace Frame;

class PostList {

  public $frameLoaderKey = 'frame_post_list_load';
  public $loadHook = 'frame_post_list_load';

  public function __construct() {

    add_action( 'elementor/widgets/widgets_registered', [ $this, 'initWidgets' ] );

    $this->initShortcode();
    $this->initAjaxHooks();

    add_action('wp_enqueue_scripts', [$this, 'addScripts']);

  }

  public function initWidgets() {

    require_once( FRAME_PATH . 'src/post_lists/elementor/PostListWidget.php' );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PostListWidget() );


  }

  public function getPostType() {
    return 'course';
  }

  public function initShortcode() {
    require_once( FRAME_PATH . 'src/post_lists/PostListShortcode.php' );
    new PostListShortcode( $this->frameLoaderKey, $this->getShortcodeTag() );
  }

  // enable override shortcode tag
  public function getShortcodeTag() {
    return false;
  }

  public function initAjaxHooks() {

    // setup ajax hooks
    add_action('wp_ajax_' . $this->loadHook, [$this, 'ajaxListLoad']);
    add_action('wp_ajax_nopriv_' . $this->loadHook, [$this, 'ajaxListLoad']);

  }

  public function order() {
    return [
      'orderBy' => 'title',
      'order'   => 'ASC'
    ];
  }

  public function setMetakey() {
    return false;
  }

  public function fetchPosts( $metaquery, $taxquery ) {

    $order = $this->order();

    $postType = $this->getPostType();
    $queryArgs = array(
      'numberposts' => -1,
      'post_type'   => $postType,
      'meta_query'  => $metaquery,
      'tax_query'   => $taxquery,
      'orderby'     => $order['orderby'],
      'order'       => $order['order']
    );

    if( $this->setMetakey() ) {
      $queryArgs['meta_key'] = $this->setMetakey();
    }
    $posts = get_posts( $queryArgs );
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

    /*
     * Localize JS including post ID
     */
    global $post;
    wp_localize_script(
      'frame-post-list-js',
      $this->frameLoaderKey,
      [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'postListLoadHook' => $this->loadHook,
        'postId' => $post->ID
      ]
    );

  }

  public function metaQuery( $postId ) {
    return [];
  }

  public function ajaxListLoad() {

    // get filter values
    if( isset( $_POST['filters'] )) {
      $filters = $_POST['filters'];
    }

    // get post id
    if( isset( $_POST['postId'] )) {
      $postId = $_POST['postId'];
    }

    // setup metaquery
    $metaquery = $this->metaQuery( $postId );
    $taxquery = [];

    // fetch posts
    $posts = $this->fetchPosts( $metaquery, $taxquery );

    // setup template
    $template = new Template();
    $template->path = 'src/post_lists/templates/';
    $template->name = 'post-list-item';

    // load list template
    $content = '';
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
