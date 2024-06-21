<?php
function hobi_custom_post(){
	register_post_type('slider', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Slider',
			'singular_name' 			=> __( 'Slider' ),
			'add_new' 					=> 'Add Slider',
			'add_new_item'				=> __( 'Add New Slider' ),
			'edit_item' 				=> __( 'Edit Slider' ),
			'all_items' 				=> 'All  Slider',
			'add_new_item' 				=> 'Add New Slider',
			'new_item' 					=> __( 'New Slider' ),
			'view_item' 				=> __( 'View Slider' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the Slider you are looking for.' ),
			'set_featured_image'		=> 'Set Slider Image',
			'featured_image'			=> 'Slider Image',
			'remove_featured_image'		=> 'Remove Slider Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title','editor', 'thumbnail', 'custom-fields'),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'Slider' ),

	]);
	
	register_post_type('about', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi About',
			'singular_name' 			=> __( 'About' ),
			'add_new' 					=> 'Add About',
			'add_new_item'				=> __( 'Add New About' ),
			'edit_item' 				=> __( 'Edit About' ),
			'all_items' 				=> 'All  About',
			'add_new_item' 				=> 'Add New About',
			'new_item' 					=> __( 'New About' ),
			'view_item' 				=> __( 'View About' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set About Image',
			'featured_image'			=> 'About Image',
			'remove_featured_image'		=> 'Remove About Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title','editor', 'custom-fields'),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'About' ),

	]);
	
	register_post_type('service', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Searvice',
			'singular_name' 			=> __( 'Searvice' ),
			'add_new' 					=> 'Add Searvice',
			'add_new_item'				=> __( 'Add New Searvice' ),
			'edit_item' 				=> __( 'Edit Searvice' ),
			'all_items' 				=> 'All  Searvice',
			'add_new_item' 				=> 'Add New Searvice',
			'new_item' 					=> __( 'New Searvice' ),
			'view_item' 				=> __( 'View Searvice' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set Searvice Image',
			'featured_image'			=> 'Searvice Image',
			'remove_featured_image'		=> 'Remove Searvice Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title','editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'Searvice' ),

	]);
	
	register_post_type('skills', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Skills',
			'singular_name' 			=> __( 'Skills' ),
			'add_new' 					=> 'Add Skills',
			'add_new_item'				=> __( 'Add New Skills' ),
			'edit_item' 				=> __( 'Edit Skills' ),
			'all_items' 				=> 'All  Skills',
			'add_new_item' 				=> 'Add New Skills',
			'new_item' 					=> __( 'New Skills' ),
			'view_item' 				=> __( 'View Skills' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set Skills Image',
			'featured_image'			=> 'Skills Image',
			'remove_featured_image'		=> 'Remove Skills Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title','editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'Skills' ),

	]);	

	register_post_type('experience', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Experience',
			'singular_name' 			=> __( 'Experience' ),
			'add_new' 					=> 'Add Experience',
			'add_new_item'				=> __( 'Add New Experience' ),
			'edit_item' 				=> __( 'Edit Experience' ),
			'all_items' 				=> 'All  Experience',
			'add_new_item' 				=> 'Add New Experience',
			'new_item' 					=> __( 'New Experience' ),
			'view_item' 				=> __( 'View Experience' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set Experience Image',
			'featured_image'			=> 'Experience Image',
			'remove_featured_image'		=> 'Remove Experience Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title', 'editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'Skills' ),

	]);	
	
	
	register_post_type('qualification', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Qualification',
			'singular_name' 			=> __( 'Qualification' ),
			'add_new' 					=> 'Add Qualification',
			'add_new_item'				=> __( 'Add New Qualification' ),
			'edit_item' 				=> __( 'Edit Qualification' ),
			'all_items' 				=> 'All  Qualification',
			'add_new_item' 				=> 'Add New Qualification',
			'new_item' 					=> __( 'New Qualification' ),
			'view_item' 				=> __( 'View Qualification' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set Qualification Image',
			'featured_image'			=> 'Qualification Image',
			'remove_featured_image'		=> 'Remove Qualification Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title', 'editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'qualification' ),

	]);		
	
	register_post_type('team', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Team',
			'singular_name' 			=> __( 'Team' ),
			'add_new' 					=> 'Add Team',
			'add_new_item'				=> __( 'Add New Team' ),
			'edit_item' 				=> __( 'Edit Team' ),
			'all_items' 				=> 'All Team',
			'add_new_item' 				=> 'Add New Team',
			'new_item' 					=> __( 'New Team' ),
			'view_item' 				=> __( 'View Team' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set Team Image 263 X 249 px',
			'featured_image'			=> 'Team Image',
			'remove_featured_image'		=> 'Remove Team Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title', 'editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'team' ),

	]);		
	
	register_post_type('counterup', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi CounterUp',
			'singular_name' 			=> __( 'CounterUp' ),
			'add_new' 					=> 'Add CounterUp',
			'add_new_item'				=> __( 'Add New CounterUp' ),
			'edit_item' 				=> __( 'Edit CounterUp' ),
			'all_items' 				=> 'All CounterUp',
			'add_new_item' 				=> 'Add New CounterUp',
			'new_item' 					=> __( 'New CounterUp' ),
			'view_item' 				=> __( 'View CounterUp' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set CounterUp Image',
			'featured_image'			=> 'CounterUp Image',
			'remove_featured_image'		=> 'Remove CounterUp Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title', 'editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'counterup' ),

	]);		
	
	register_post_type('sweetclients', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Sweet Clients',
			'singular_name' 			=> __( 'Sweet Clients' ),
			'add_new' 					=> 'Add Sweet Clients',
			'add_new_item'				=> __( 'Add New Clients' ),
			'edit_item' 				=> __( 'Edit Clients' ),
			'all_items' 				=> 'All Clients',
			'add_new_item' 				=> 'Add New Clients',
			'new_item' 					=> __( 'New Clients' ),
			'view_item' 				=> __( 'View Clients' ),
			'not_found' 				=> __( 'Sorry, we couldn\'t find the About you are looking for.' ),
			'set_featured_image'		=> 'Set Clients Image',
			'featured_image'			=> 'Clients Image',
			'remove_featured_image'		=> 'Remove Clients Image Easy',
		],
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		'supports'=>array('title', 'editor', 'custom-fields', 'thumbnail' ),
		'menu_icon' => 'dashicons-smiley',
		'has_archive' => true,
		'hierarchical' => false, 
		'capability_type' => 'page',
		'rewrite' => array( 'slug' => 'clients' ),

	]);	
};



/* ----------------------------------------------------- */
/* Register Filter Post */
/* ----------------------------------------------------- */
	register_post_type('portfolio', [
		'public'     					=> true,
		'labels' 						=> [
			'name' 						=> 'Hobi Portfolio',
			'add_new' 					=> 'Add Portfolio',
			'all_items' 				=> 'All Portfolio',
			'add_new_item' 				=> 'Add New Portfolio',
			'set_featured_image'		=> 'Set Portfolio Image',
			'featured_image'			=> 'Portfolio Image',
			'remove_featured_image'		=> 'Remove Portfolio Image Easy',
		],
		'supports' 						=> ['title', 'editor', 'thumbnail','custom-fields'],
		'menu_icon'						=> 'dashicons-smiley',
		'menu_position'					=> 5,

	]);	
	// Register Taxonomy Category.
	register_taxonomy('filter', 'portfolio', array(
		'public'					=>true,
		'hierarchal'				=>true,
		'labels'					=> array(
			'name'					=> 'Portfolio Category',
			'hierarchical'			=> false,
			'description' 			=> 'Display your works by filters',
			'supports' 				=> array( 'title', 'custom-fields', 'thumbnail' ),
			'public' 				=> true,
			'show_ui' 				=> true,
			'show_in_menu' 			=> true,
			'show_in_nav_menus' 	=> false,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'has_archive' 			=> true,
			'query_var' 			=> true,
			'can_export' 			=> true,
			'rewrite' 				=> true,
			'capability_type' => 'portfolio'
			))
	);		
/* ----------------------------------------------------- */
/* Filter Taxonomy */
/* ----------------------------------------------------- */

/*
* Adds terms from a custom taxonomy to post_class
*/
add_filter( 'post_class', 'theme_t_wp_taxonomy_post_class', 10, 3 );
	function theme_t_wp_taxonomy_post_class( $classes, $class, $ID ) {
	$taxonomy = 'filter';
	$terms = get_the_terms( (int) $ID, $taxonomy );
	if( !empty( $terms ) ) {
		foreach( (array) $terms as $order => $term ) {
			if( !in_array( $term->slug, $classes ) ) {
			$classes[] = $term->slug;
			}
		}
	}
	return $classes;
	}
add_action('after_setup_theme', 'hobi_custom_post');

?>