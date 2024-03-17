<?php 
    add_action('wp_enqueue_scripts', function () {
        wp_enqueue_script('production', get_theme_file_uri() . '/dist/production-dist.js', ['jquery'], '', true);

        // Addon scripts that should only be loaded on certain pages...
        if(get_field('videos')){
          wp_enqueue_script('video-popup', get_theme_file_uri() . '/dist/production-video-popup.js','', '', true);
        }

        // Localize the themeURL to our production file so we can use it to complete file paths
        wp_localize_script('production', 'themeURL', array(
          'themeURL' => get_stylesheet_directory_uri()
          )
		);
    });
