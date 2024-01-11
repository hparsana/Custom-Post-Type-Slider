<?php

/**
 * Plugin Name: Custom Post Type Slider
 * Description:This is a custom plugin for Slider based on PostType. Use the shortcode <strong>[project_slider]</strong> to display projects and the shortcode <strong>[testimonial_slider]</strong> to display testimonials.
 * Author: Himat Parsana
 * Author URI: https://himatparsana.com
 * Version: 1.0.0
 */

defined('ABSPATH') || die("Invalid Request");

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.1');
}

//define plugin path/url/file
define('SLIDER_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('SLIDER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SLIDER_PLUGIN_FILE', __FILE__);

//include files
include SLIDER_PLUGIN_PATH . "/inc/slider-shortcode.php";
include SLIDER_PLUGIN_PATH . "/inc/testimonial-shortcode.php";


if (!class_exists('CustomPosttypeSlider')) :

    class CustomPosttypeSlider
    {

        /**
         * Constructor for the class.
         * 
         */
        public function __construct()
        {
            add_action('wp_enqueue_scripts', array(__CLASS__, 'slider_add_enqueue_scripts'));
        }


        /**
         * Enqueues the necessary styles and scripts for the slider.
         * @return void
         */
        public static function slider_add_enqueue_scripts(): void
        {
            if (is_page(930)) :
                wp_enqueue_style('slick-cdn', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css");
                wp_enqueue_style('slick-theme-cdn', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css");
                wp_enqueue_style('custom-style', SLIDER_PLUGIN_URL . "assets/css/style.css", [], _S_VERSION);

                wp_enqueue_script('jquery-min', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
                wp_enqueue_script('slider-cdn', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js");
                wp_enqueue_script('display-slider-js', SLIDER_PLUGIN_URL . "assets/js/custom.js", array(), _S_VERSION, false);
            endif;
        }
    }
endif;

new CustomPosttypeSlider;
