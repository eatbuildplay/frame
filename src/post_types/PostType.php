<?php

namespace Frame;

class PostType {

  public $settings = [];

  public getKey() {
    return 'frame';
  }

  public getNameSingular() {
    return 'Frame';
  }

  public getNamePlural() {
    return $this->getNameSingular() . 's';
  }

  public getSettings() {
    $args = $this->getArguments();
    $args['labels'] => $this->getLabels();
    return $args;
  }

  public register() {

    $key = $this->getKey();
    $settings = $this->getSettings();
    register_post_type( $key, $settings );

  }

  public function getArguments() {

    $nameSingular = $this->getNameSingular();

    return [
  		'label'                 => __( $nameSingular, 'frame' ),
  		'description'           => __( 'Custom post type registered with Frame.', 'frame' ),
  		'supports'              => array( 'title' ),
  		'taxonomies'            => [],
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => false,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'capability_type'       => 'page',
  		'show_in_rest'       		=> true,
  	];

  }

  public function getLabels() {

    return [
  		'name'                  => _x( 'Plans', 'Post Type General Name', 'frame' ),
  		'singular_name'         => _x( 'Plan', 'Post Type Singular Name', 'frame' ),
  		'menu_name'             => __( 'Plans', 'frame' ),
  		'name_admin_bar'        => __( 'Plans', 'frame' ),
  		'archives'              => __( 'Item Archives', 'frame' ),
  		'attributes'            => __( 'Item Attributes', 'frame' ),
  		'parent_item_colon'     => __( 'Parent Item:', 'frame' ),
  		'all_items'             => __( 'All Items', 'frame' ),
  		'add_new_item'          => __( 'Add New Item', 'frame' ),
  		'add_new'               => __( 'Add New', 'frame' ),
  		'new_item'              => __( 'New Item', 'frame' ),
  		'edit_item'             => __( 'Edit Item', 'frame' ),
  		'update_item'           => __( 'Update Item', 'frame' ),
  		'view_item'             => __( 'View Item', 'frame' ),
  		'view_items'            => __( 'View Items', 'frame' ),
  		'search_items'          => __( 'Search Item', 'frame' ),
  		'not_found'             => __( 'Not found', 'frame' ),
  		'not_found_in_trash'    => __( 'Not found in Trash', 'frame' ),
  		'featured_image'        => __( 'Featured Image', 'frame' ),
  		'set_featured_image'    => __( 'Set featured image', 'frame' ),
  		'remove_featured_image' => __( 'Remove featured image', 'frame' ),
  		'use_featured_image'    => __( 'Use as featured image', 'frame' ),
  		'insert_into_item'      => __( 'Insert into item', 'frame' ),
  		'uploaded_to_this_item' => __( 'Uploaded to this item', 'frame' ),
  		'items_list'            => __( 'Items list', 'frame' ),
  		'items_list_navigation' => __( 'Items list navigation', 'frame' ),
  		'filter_items_list'     => __( 'Filter items list', 'frame' ),
  	];

  }

}
