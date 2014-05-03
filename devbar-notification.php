<?php
/*
Plugin Name: Development Environment Notification
Plugin URI: http://www.alexphelps.me
Description: A simple plugin to help signify a wordpress environement is development and not production for developers so we don't get confused.
Version: 0.1
Author: Alex Phelps
Author Email: alex@alexphelps.me
  
*/

// add css style for the button

function dev_admin_bar_overrides() {
  if ( is_admin_bar_showing() ) {
    // I actually used wp_register_script() elsewhere and just ran `wp_enqueue_script( 'admin-bar-overrides' )`
    // here, but this will also do the trick
    wp_enqueue_style( 'admin-bar-overrides', plugins_url('styles/dev-admin-bar.css', __FILE__), array( 'admin-bar' ), null, 'all' );
  }
}

//create our button

function add_items($admin_bar) {

    $admin_bar->add_menu( array(
        'id'    => 'dev-mode',
                'parent' => 'top-secondary',
        'title' => 'Development',
        'href'  => '#',
        'meta'  => array(
            'title' => __('Development'),
        'class' => 'dev-mode-notification'    
        ),
    ) );
}

//add our style and add our button with wp hooks

add_action( 'init', 'dev_admin_bar_overrides' );
add_action('admin_bar_menu', 'add_items');