<?php
/*
* Plugin Name: Subscribe-YouTube-Button
* Plugin URI: https://hashmiweb.com/
* Description: This plugin is for add the youtube subscribe button in the widgets of the site. So the User can subscribe the youtube channel just by one click.
* Version: 1.0
* Author: Abdul Raouf
* Author URI: https://hashmiweb.com/abdulraouf
* License: GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain: ytsbtn
* Domain Path: /languages
*
*/
if (!defined('ABSPATH')){
    exit;
}
if (!class_exists('Ytsbtnproject')) {

    class Ytsbtnproject
    {
        public function __construct(){
        //  initilize
        add_action( 'widgets_init', array($this, 'register_ytsbtn'));
        
        // Load Scripts
        require_once(plugin_dir_path(__FILE__).'/include/ytsbtn-scripts.php');

        // Load Class
        require_once(plugin_dir_path(__FILE__).'/include/ytsbtn-class.php');
        }
        // Register widget
        function register_ytsbtn(){
        register_widget( 'Ytsbtn_Widget' );
        }
    }
    New Ytsbtnproject();
}