<?php

namespace Frame;

class PostListWidget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'frame_post_list';
	}

	public function get_title() {
		return __( 'Post List', 'frame' );
	}

	public function get_icon() {
		return 'fa fa-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

  protected function _register_controls() {



		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'frame' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

    /*
     * List of Elementor Templates
     */
    $elTemplates = get_posts([
     'posts_per_page' => -1,
     'post_type' => 'elementor_library'
    ]);
    $options = [];
    foreach( $elTemplates as $templatePost ) {
      $options[$templatePost->ID] = $templatePost->post_title;
    }

    $this->add_control(
			'item_template',
			[
				'label' => __( 'Item Template', 'frame' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'input_type' => 'select',
        'options' => $options
			]
		);

    $this->add_control(
			'dynamic_option',
			[
				'label' => __( 'Dynamic Option', 'frame' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'input_type' => 'textarea'
			]
		);

		$this->end_controls_section();

	}

  protected function render() {

		$settings = $this->get_settings_for_display();
    $templatePost = get_post( $settings['item_template'] );
    $itemContent = $templatePost->post_content;
    print $itemContent;

    /*
    $template = new Template();
    $template->path = 'src/post_lists/templates/';
    $template->name = 'post-list-item';
    $template->data = [
      'post' => $post
    ];

    $template->render();
    */

	}

}
