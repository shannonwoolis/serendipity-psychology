<?php

$context = Timber::context();
if(is_post_type_archive('care-pathways')) {

    $timber_post = new Timber\Post(11);
    $context['post'] = $timber_post;

    Timber::render( [ 'page.twig' ], $context );

    ?>
    <script type="text/javascript">
        var menuItems = document.querySelectorAll('.menu-item-61');
        menuItems.forEach(function(menuItem) {
            menuItem.classList.add('current-menu-item');
        });
    </script>
    <?php 

} else if(is_post_type_archive('specialist-therapies')) {

    $timber_post = new Timber\Post(9);
    $context['post'] = $timber_post;

    Timber::render( [ 'page.twig' ], $context );

    ?>
    <script type="text/javascript">
        var menuItems = document.querySelectorAll('.menu-item-60');
        menuItems.forEach(function(menuItem) {
            menuItem.classList.add('current-menu-item');
        });
    </script>
    <?php 

} else if(is_post_type_archive('conditions')) {

    $timber_post = new Timber\Post(13);
    $context['post'] = $timber_post;

    Timber::render( [ 'page.twig' ], $context );

    ?>
    <script type="text/javascript">
        var menuItems = document.querySelectorAll('.menu-item-62');
        menuItems.forEach(function(menuItem) {
            menuItem.classList.add('current-menu-item');
        });
    </script>
    <?php 

} else {

    $timber_post = new Timber\Post();
    $context['post'] = $timber_post;

    $context['posts'] = new Timber\PostQuery();

    $context['categories'] = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC'
    ) );

    Timber::render( [ 'index.twig' ], $context );

}

