<?php 

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$context['categories'] = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );

if(is_singular( array('care-pathways', 'specialist-therapies', 'conditions') )) {
  Timber::render( [ 'page.twig' ], $context );
} else {
  Timber::render( [ 'single-' . $timber_post->post_type . '.twig', 'single.twig' ], $context );
}

if (is_singular('post')) { ?>
  <script type="text/javascript">
    document.querySelectorAll('.current_page_parent').forEach(function(item){
      item.classList.add('current-menu-item');
    });
  </script>
<?php } elseif(is_singular('our-team')) { ?>
  <script type="text/javascript">
    document.querySelectorAll('.menu-item-59').forEach(function(item){
      item.classList.add('current-menu-item');
    });
  </script>
<?php }
