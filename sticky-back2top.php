<?php
/**
 * Plugin Name: Sticky Back2Top Universal
 * Plugin URI: http://43folderstech.net/genesis-back2top
 * Description: Adds a sticky icon to gently return user to the top - all standard themes supported, and optimized for Genesis.
 * Version: 2.1.1
 * Author: Michael Kastler
 * Author URI: http://43folderstech.net
 * License: GPL2
 *
 * TODOS:
 * - allow user to select different icons instead of just an arrow
 * - confirm that genesis is installed before running, otherwise give error
 */
 /*  Copyright 2016	Michael Kastler and 43Folders Technology Solutions
    (email :  michael@43folderstech.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

However, if you do run into problems email me michael@43folderstech.net
Or if you like it enough and want me to keep working on it, paypal a few bucks to me at 
    http://paypal.me/43folders ... thanks!
*/
 
// if the file is called directly, abort it
if ( ! defined( 'WPINC' ) ) {
	die;
}


// ADD MENU OPTIONS
add_action( 'admin_enqueue_scripts', 'sb2t_script_load' );
add_action( 'admin_menu', 'sb2t_plugin_menu' );
add_action( 'admin_init', 'sb2t_plugin_settings' );

require_once ( plugin_dir_path( __FILE__ ) . 'sb2t-init.php' ); 

function sb2t_plugin_menu(){
    if ( basename( get_template_directory() ) == 'genesis' ) {
    	add_submenu_page( 'genesis', 'Sticky Back2Top', 'Sticky Back2Top','administrator','sb2t_plugin_settings', 'sb2t_plugin_settings_page');
    } else {
        add_menu_page( 'Sticky Back2Top', 'Sticky Back2Top','administrator','sb2t_plugin_settings', 'sb2t_plugin_settings_page', 'dashicons-upload' );
    }
}

function sb2t_script_load() {
    wp_register_script( 'sb2t-admin', plugins_url( '/js/sb2t-admin.js', __FILE__ ), array( 'jquery' ) ); 
    wp_localize_script('sb2t-admin', 'sb2tVARS', array( 
		'imagepath' => __(plugins_url ( 'images/', __FILE__ ))
		)); 
    wp_enqueue_script( 'sb2t-admin' ); 
}

function sb2t_plugin_settings_page(){ 
	include 'views/admin.php'; 
}

function sb2t_plugin_settings() {
    register_setting( 'sb2t-plugin-settings-group', 'sb2t_color' );
    register_setting( 'sb2t-plugin-settings-group', 'sb2t_location' );
    register_setting( 'sb2t-plugin-settings-group', 'sb2t_pointer' );
    register_setting( 'sb2t-plugin-settings-group', 'sb2t_size' );
    register_setting( 'sb2t-plugin-settings-group', 'sb2t_shape' );
    register_setting( 'sb2t-plugin-settings-group', 'sb2t_arrowcolor' );
}
