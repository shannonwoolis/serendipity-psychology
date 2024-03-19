<?php
function teamQuery($cats) {
    if($cats != '') {
        $tax_query = array(
            array(
                'taxonomy' => 'team-category',
                'terms' => $cats,
                'field' => 'id',
                'operator' => 'IN'
            )
        );
    } else {
        $tax_query = false;
    }

    $postArgs = [
        'post_type' => 'our-team',
        'posts_per_page' => -1,
        'tax_query' => $tax_query
    ]; 
    $posts = new Timber\PostQuery($postArgs);

    return $posts;
}