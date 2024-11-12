<?php

$context = Timber::context();
$timber_post = new Timber\Post(7);
$context['post'] = $timber_post;

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}

$teamArgs = [
    'post_type' => 'our-team',
    'posts_per_page' => 20,
    'paged' => $paged,
    'orderby' => 'menu_order',
    'order'   => 'ASC',
]; 
$team = new Timber\PostQuery($teamArgs);
$context['allTeam'] = $team;

$context['teamCategories'] = get_terms( array(
    'taxonomy'   => 'team-category',
    'hide_empty' => true,
    'orderby' => 'menu_order',
    'order'   => 'ASC'
) );

Timber::render( [ 'page-'.$timber_post->slug.'.twig', 'page.twig' ], $context );
