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
  Timber::render( [ 'single.twig' ], $context );
}

if (is_single()) { ?>
<script type="text/javascript">
  document.querySelector('.current_page_parent').classList.add('current-menu-item');
</script>
<?php }
