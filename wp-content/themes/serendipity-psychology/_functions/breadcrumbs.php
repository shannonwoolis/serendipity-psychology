<?php 
/**
 * Override Yoast SEO Breadcrumb Trail
 * -----------------------------------------------------------------------------------
 */

add_filter( 'wpseo_breadcrumb_links', 'override_yoast_breadcrumb_trail' );

function override_yoast_breadcrumb_trail( $links ) {
    global $post;

    if ( is_singular( 'conditions' ) ) {
        $breadcrumb[] = array(
            'url' => get_permalink( 13 ),
            'text' => 'Conditions',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    // if ( is_singular( 'assessments' ) ) {
    //     $breadcrumb[] = array(
    //         'url' => get_permalink( 3453 ),
    //         'text' => 'Assessments',
    //     );

    //     array_splice( $links, 1, -2, $breadcrumb );
    // }

    if ( is_singular( 'care-pathways' ) ) {
        $breadcrumb[] = array(
            'url' => get_permalink( 11 ),
            'text' => 'Care Pathways',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    if ( is_singular( 'specialist-therapies' ) ) {
        $breadcrumb[] = array(
            'url' => get_permalink( 9 ),
            'text' => 'Specialist Therapies',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}