<?php

$context = Timber::context();
$timber_post = new Timber\Term();
$context['post'] = $timber_post;

Timber::render( [ 'page-'.$timber_post->slug.'.twig', 'page.twig' ], $context );
