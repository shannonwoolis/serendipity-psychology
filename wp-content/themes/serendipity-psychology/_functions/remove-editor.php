<?php 

// Remove content editor from pages and posts as they use an ACF field
add_action('admin_init', 'remove_textarea');

function remove_textarea() {
    remove_post_type_support( 'page', 'editor' );
    // remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'specialist-therapies', 'editor' );
    remove_post_type_support( 'care-pathways', 'editor' );
    remove_post_type_support( 'conditions', 'editor' );
    remove_post_type_support( 'resources', 'editor' );
}