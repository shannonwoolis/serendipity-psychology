<?php 


/* ========================================================================================================================

Register Our Team CPT

======================================================================================================================== */
function register_our_team() {

	$labels = array(
		'name'                  => _x( 'Our Team', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Our Team', 'text_domain' ),
		'name_admin_bar'        => __( 'Our Team', 'text_domain' ),
		'archives'              => __( 'Team Member Archives', 'text_domain' ),
		'attributes'            => __( 'Team Member Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'text_domain' ),
		'all_items'             => __( 'All Our Team', 'text_domain' ),
		'add_new_item'          => __( 'Add New Team Member', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Team Member', 'text_domain' ),
		'edit_item'             => __( 'Edit Team Member', 'text_domain' ),
		'update_item'           => __( 'Update Team Member', 'text_domain' ),
		'view_item'             => __( 'View Team Member', 'text_domain' ),
		'view_items'            => __( 'View Our Team', 'text_domain' ),
		'search_items'          => __( 'Search Team Member', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Team Member Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set Team Member image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Team Member image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Team Member image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Team Member', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'text_domain' ),
		'items_list'            => __( 'Our Team list', 'text_domain' ),
		'items_list_navigation' => __( 'Our Team list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Our Team list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'our-team',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Team Member', 'text_domain' ),
		'description'           => __( 'Our Team CPT', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'our-team', $args );

}
add_action( 'init', 'register_our_team', 0 );


// Register Custom Taxonomy
function team_categories() {

	$labels = array(
		'name'                       => _x( 'Team Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Team Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Category', 'text_domain' ),
		'all_items'                  => __( 'All Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Category', 'text_domain' ),
		'update_item'                => __( 'Update Category', 'text_domain' ),
		'view_item'                  => __( 'View Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Categories', 'text_domain' ),
		'search_items'               => __( 'Search Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Categories', 'text_domain' ),
		'items_list'                 => __( 'Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array(
			'slug' => 'team-category',
			'with_front' => false
		),
	);
	register_taxonomy( 'team-category', array( 'our-team' ), $args );

}
add_action( 'init', 'team_categories', 0 );




/* ========================================================================================================================

Register Specialist Therapies CPT

======================================================================================================================== */
function register_specialist_therapies() {

	$labels = array(
		'name'                  => _x( 'Specialist Therapies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Specialist Therapy', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Specialist Therapies', 'text_domain' ),
		'name_admin_bar'        => __( 'Specialist Therapies', 'text_domain' ),
		'archives'              => __( 'Specialist Therapy Archives', 'text_domain' ),
		'attributes'            => __( 'Specialist Therapy Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Specialist Therapy:', 'text_domain' ),
		'all_items'             => __( 'All Specialist Therapies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Specialist Therapy', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Specialist Therapy', 'text_domain' ),
		'edit_item'             => __( 'Edit Specialist Therapy', 'text_domain' ),
		'update_item'           => __( 'Update Specialist Therapy', 'text_domain' ),
		'view_item'             => __( 'View Specialist Therapy', 'text_domain' ),
		'view_items'            => __( 'View Specialist Therapies', 'text_domain' ),
		'search_items'          => __( 'Search Specialist Therapy', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Specialist Therapy Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set Specialist Therapy image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Specialist Therapy image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Specialist Therapy image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Specialist Therapy', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Specialist Therapy', 'text_domain' ),
		'items_list'            => __( 'Specialist Therapies list', 'text_domain' ),
		'items_list_navigation' => __( 'Specialist Therapies list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Specialist Therapies list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'specialist-therapies',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Specialist Therapy', 'text_domain' ),
		'description'           => __( 'Specialist Therapies CPT', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-rest-api',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'specialist-therapies', $args );

}
add_action( 'init', 'register_specialist_therapies', 0 );




/* ========================================================================================================================

Register Care Pathways CPT

======================================================================================================================== */
function register_care_pathways() {

	$labels = array(
		'name'                  => _x( 'Care Pathways', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Care Pathway', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Care Pathways', 'text_domain' ),
		'name_admin_bar'        => __( 'Care Pathways', 'text_domain' ),
		'archives'              => __( 'Care Pathway Archives', 'text_domain' ),
		'attributes'            => __( 'Care Pathway Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Care Pathway:', 'text_domain' ),
		'all_items'             => __( 'All Care Pathways', 'text_domain' ),
		'add_new_item'          => __( 'Add New Care Pathway', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Care Pathway', 'text_domain' ),
		'edit_item'             => __( 'Edit Care Pathway', 'text_domain' ),
		'update_item'           => __( 'Update Care Pathway', 'text_domain' ),
		'view_item'             => __( 'View Care Pathway', 'text_domain' ),
		'view_items'            => __( 'View Care Pathways', 'text_domain' ),
		'search_items'          => __( 'Search Care Pathway', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Care Pathway Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set Care Pathway image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Care Pathway image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Care Pathway image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Care Pathway', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Care Pathway', 'text_domain' ),
		'items_list'            => __( 'Care Pathways list', 'text_domain' ),
		'items_list_navigation' => __( 'Care Pathways list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Care Pathways list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'care-pathways',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Care Pathway', 'text_domain' ),
		'description'           => __( 'Care Pathways CPT', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-heart',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'care-pathways', $args );

}
add_action( 'init', 'register_care_pathways', 0 );




/* ========================================================================================================================

Register Conditions CPT

======================================================================================================================== */
function register_conditions() {

	$labels = array(
		'name'                  => _x( 'Conditions', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Condition', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Conditions', 'text_domain' ),
		'name_admin_bar'        => __( 'Conditions', 'text_domain' ),
		'archives'              => __( 'Condition Archives', 'text_domain' ),
		'attributes'            => __( 'Condition Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Condition:', 'text_domain' ),
		'all_items'             => __( 'All Conditions', 'text_domain' ),
		'add_new_item'          => __( 'Add New Condition', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Condition', 'text_domain' ),
		'edit_item'             => __( 'Edit Condition', 'text_domain' ),
		'update_item'           => __( 'Update Condition', 'text_domain' ),
		'view_item'             => __( 'View Condition', 'text_domain' ),
		'view_items'            => __( 'View Conditions', 'text_domain' ),
		'search_items'          => __( 'Search Condition', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Condition Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set Condition image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Condition image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Condition image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Condition', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Condition', 'text_domain' ),
		'items_list'            => __( 'Conditions list', 'text_domain' ),
		'items_list_navigation' => __( 'Conditions list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Conditions list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'conditions',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Condition', 'text_domain' ),
		'description'           => __( 'Conditions CPT', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-visibility',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'conditions', $args );

}
add_action( 'init', 'register_conditions', 0 );



/* ========================================================================================================================

Register Resources CPT

======================================================================================================================== */
function register_resources() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Resources', 'text_domain' ),
		'name_admin_bar'        => __( 'Resources', 'text_domain' ),
		'archives'              => __( 'Resource Archives', 'text_domain' ),
		'attributes'            => __( 'Resource Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'text_domain' ),
		'all_items'             => __( 'All Resources', 'text_domain' ),
		'add_new_item'          => __( 'Add New Resource', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Resource', 'text_domain' ),
		'edit_item'             => __( 'Edit Resource', 'text_domain' ),
		'update_item'           => __( 'Update Resource', 'text_domain' ),
		'view_item'             => __( 'View Resource', 'text_domain' ),
		'view_items'            => __( 'View Resources', 'text_domain' ),
		'search_items'          => __( 'Search Resource', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Resource Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set Resource image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Resource image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Resource image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Resource', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'text_domain' ),
		'items_list'            => __( 'Resources list', 'text_domain' ),
		'items_list_navigation' => __( 'Resources list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Resources list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'resources',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Resource', 'text_domain' ),
		'description'           => __( 'Resources CPT', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-text',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'resources', $args );

}
add_action( 'init', 'register_resources', 0 );



/* ========================================================================================================================

Register Testimonials CPT

======================================================================================================================== */
function register_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonials', 'text_domain' ),
		'archives'              => __( 'Testimonial Archives', 'text_domain' ),
		'attributes'            => __( 'Testimonial Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'view_items'            => __( 'View Testimonials', 'text_domain' ),
		'search_items'          => __( 'Search Testimonial', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Testimonial Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set Testimonial image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove Testimonial image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as Testimonial image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Testimonial', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Testimonials list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'testimonials',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'text_domain' ),
		'description'           => __( 'Testimonials CPT', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'register_testimonials', 0 );