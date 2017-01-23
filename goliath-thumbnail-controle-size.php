<?php
/*
Plugin Name: Goliath thumbnail control size
Description: Control minimum size, for post thumbnail
Version: 1.0
Author: Studio Goliath
Author URI: http://www.studio-goliath.com
*/

/**
 * Display thumbnail size in the admin meta box
 */
add_filter( 'admin_post_thumbnail_html', function( $content )  {

    global $current_screen;

    // Check if a thumbnail size is register
    $current_post_type = get_post_type_object( $current_screen->post_type );

    if( property_exists( $current_post_type, 'thumbnail_size' ) ) {

        $thumbnail_size = $current_post_type->thumbnail_size;

        if( isset( $thumbnail_size['min']) ){

            $min_size =  $thumbnail_size['min'][0] . 'px';
            $max_size =  $thumbnail_size['min'][1] . 'px';

            $content = '<p class="howto">' . sprintf(  __('Minimun size : %s by %s', 'goliath-thumbnail-control-size'), $min_size, $max_size ) . '</p>' . $content;
        }
    }

    return $content;
});