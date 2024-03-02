<?php 
add_action( 'init', 'register_navigations' );
function register_navigations() {
     register_nav_menus([
        'primary' => __('Primary Menu', 'ss'),
        'secondary' => __('Secondary Menu', 'ss'),
        'footer' => __('Footer Menu', 'ss')
    ]);
}
?>
