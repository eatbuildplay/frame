<?php

/**
 *
 * Plugin Name: Frame
 * Plugin URI: https://eatbuildplay.com/plugins/frame
 * Description: Frame is a WordPress plugin that provides a framework for building apps. It requires ACF Pro, and integrates with Elementor.
 * Version: 1.0.0
 * Author: Casey Milne, Eat/Build/Play
 * Author URI: https://eatbuildplay.com/
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 */

namespace Frame;

define( 'FRAME_PATH', plugin_dir_path( __FILE__ ) );
define( 'FRAME_URL', plugin_dir_url( __FILE__ ) );
define( 'FRAME_VERSION', '1.0.0' );

class FR_Plugin {

  public function __construct() {

    require_once( FRAME_PATH . 'src/Template.php' );
    require_once( FRAME_PATH . 'src/post_lists/PostList.php' );
    
    require_once( FRAME_PATH . 'components/course/src/Course.php' );
    new \Frame\Course\Course();

    require_once( FRAME_PATH . 'components/lesson/src/Lesson.php' );
    new \Frame\Lesson\Lesson();

    require_once( FRAME_PATH . 'components/student/src/Student.php' );
    new \Frame\Student\Student();

  }

}

new FR_Plugin();
