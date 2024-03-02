<?php 

// Remove content editor from pages and posts as they use an ACF field
add_action('admin_init', 'remove_textarea');

function remove_textarea() {
    remove_post_type_support( 'page', 'editor' );
    // remove_post_type_support( 'post', 'editor' );
    // remove_post_type_support( 'vacancies', 'editor' );
    // remove_post_type_support( 'locations', 'editor' );
    // remove_post_type_support( 'branches', 'editor' );
}