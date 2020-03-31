<?php

/**
 *
 * Plugin Name: Frame
 * Plugin URI: https://wp-developer-site.com/plugins/frame
 * Description: Frame is a WordPress plugin that provides a framework for building apps. It requires ACF Pro, and it conflicts with every other plugin. You shalt not use any other plugins with Frame, lest ye be cast out of the Frame community.
 * Version: 1.0.0
 * Author: Casey Milne, Eat/Build/Play
 * Author URI: https://eatbuildplay.com/
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 */

 define( 'FRAME_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
 define( 'FRAME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
 define( 'FRAME_VERSION', '1.0.0' );

class FR_Plugin {

  public function __construct() {

    require_once( FRAME_PLUGIN_PATH . 'src/post_types/post_type.php' );

  }

}

new FR_Plugin();
