<?php

function logos() {
  $context = Timber::get_context();
  $timber_post = new Timber\Post();
  $context['post'] = $timber_post;
  ob_start();
  $a = Timber::compile('_atoms/logos.twig', $context);
  ob_get_clean();
  return $a;
}

add_shortcode('logos', 'logos');

function member_name() {
  $context = Timber::get_context();
  $timber_post = new Timber\Post();
  $context['post'] = $timber_post;
  ob_start();
  $a = $timber_post->title;
  ob_get_clean();
  return $a;
}

add_shortcode('member_name', 'member_name');