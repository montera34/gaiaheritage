<?php
// custom menus
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
        if ( function_exists( 'register_nav_menus' ) ) {
                register_nav_menus(
                array(
                        'header-menu' => 'Header menu',
                )
                );
        }
}

// Custom post types
add_action( 'init', 'create_post_type', 0 );

function create_post_type() {
	// Projects custom post type
	register_post_type( 'project', array(
		'labels' => array(
			'name' => __( 'Projects' ),
			'singular_name' => __( 'Project' ),
			'add_new_item' => __( 'Add a project' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit this project' ),
			'new_item' => __( 'New project' ),
			'view' => __( 'View project' ),
			'view_item' => __( 'View this project' ),
			'search_items' => __( 'Search projects' ),
			'not_found' => __( 'No project found' ),
			'not_found_in_trash' => __( 'No projects in the trashcan' ),
			'parent' => __( 'Parent' )
		),
		'has_archive' => true,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'menu_position' => 5,
		//'menu_icon' => get_template_directory_uri() . '/images/icon-post.type-integrantes.png',
		'hierarchical' => false, // if true this post type will be as pages
		'query_var' => true,
		'supports' => array('title', 'editor','excerpt','author','trackbacks','thumbnail' ),
		'rewrite' => array('slug'=>'project','with_front'=>false),
		'can_export' => true,
		'_builtin' => false,
		'_edit_link' => 'post.php?post=%d',
	));
	// Features images in home page
	register_post_type( 'document', array(
		'labels' => array(
			'name' => __( 'Downloads' ),
			'singular_name' => __( 'Download' ),
			'add_new_item' => __( 'Add a download' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit this download' ),
			'new_item' => __( 'New download' ),
			'view' => __( 'View download' ),
			'view_item' => __( 'View this download' ),
			'search_items' => __( 'Search downloads' ),
			'not_found' => __( 'No download found' ),
			'not_found_in_trash' => __( 'No downloads in the trashcan' ),
			'parent' => __( 'Parent' )
		),
		'has_archive' => true,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		//'menu_icon' => get_template_directory_uri() . '/images/icon-post.type-integrantes.png',
		'hierarchical' => false, // if true this post type will be as pages
		'query_var' => true,
		'supports' => array('title','author','trackbacks'),
		'rewrite' => array('slug'=>'document','with_front'=>false),
		'can_export' => true,
		'_builtin' => false,
		'_edit_link' => 'post.php?post=%d',
	));
	// Features images in home page
	register_post_type( 'new', array(
		'labels' => array(
			'name' => __( 'News' ),
			'singular_name' => __( 'New' ),
			'add_new_item' => __( 'Add a new' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit this new' ),
			'new_item' => __( 'New new' ),
			'view' => __( 'View new' ),
			'view_item' => __( 'View this new' ),
			'search_items' => __( 'Search news' ),
			'not_found' => __( 'No new found' ),
			'not_found_in_trash' => __( 'No news in the trashcan' ),
			'parent' => __( 'Parent' )
		),
		'has_archive' => true,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'menu_position' => 5,
		//'menu_icon' => get_template_directory_uri() . '/images/icon-post.type-integrantes.png',
		'hierarchical' => false, // if true this post type will be as pages
		'query_var' => true,
		'supports' => array('title', 'editor','excerpt','author','trackbacks' ),
		'rewrite' => array('slug'=>'news','with_front'=>false),
		'can_export' => true,
		'_builtin' => false,
		'_edit_link' => 'post.php?post=%d',
	));
}

// Custom Taxonomies
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
register_taxonomy( 'year', 'project', array( // year taxonomy
	'hierarchical' => true,
	'label' => 'Year',
	'name' => 'Years',
	'query_var' => true,
	'rewrite' => array( 'slug' => 'year', 'with_front' => false ),) );
register_taxonomy( 'country', 'project', array( // Country taxonomy
	'hierarchical' => true,
	'label' => 'Countries',
	'name' => 'Country',
	'query_var' => true,
	'rewrite' => array( 'slug' => 'country', 'with_front' => false ),) );
register_taxonomy( 'city', 'project', array( // City taxonomy
	'hierarchical' => false,
	'label' => 'Cities',
	'name' => 'City',
	'query_var' => true,
	'rewrite' => array( 'slug' => 'city', 'with_front' => false ),) );
register_taxonomy( 'client', 'project', array( // Client taxonomy
	'hierarchical' => false,
	'label' => 'Clients',
	'name' => 'Client',
	'query_var' => true,
	'rewrite' => array( 'slug' => 'client', 'with_front' => false ),) );
}

//Add metaboxes to Case Study Custom post type
function be_sample_metaboxes( $meta_boxes ) {//metaboxes common variables to all scales
	$prefix = '_gaia_'; // Prefix for all fields
	// number of cols
	$meta_boxes[] = array(
		'id' => 'page-cols',
		'title' => 'Number of columns',
		'pages' => array('page'), // post type
		'context' => 'side',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => '',
				'desc' => 'Choose number of cols, between 1 and 3. Default value is 1.',
				'id' => $prefix . 'box_cols',
				'type' => 'text'
			),
		),
	);
	// imgs mosac in single project
	$rows = 5; // maximun number of rows
	$count_rows = 0;
	while ( $rows > $count_rows ) {
		$count_rows++;
		$meta_boxes[] = array(
			'id' => 'row_'.$count_rows,
			'title' => 'Images mosaic: row '.$count_rows,
			'pages' => array('project'), // post type
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Number of images in this row.',
					'desc' => '',
					'id' => $prefix . 'pr_row'.$count_rows.'_cols',
					'type' => 'radio_inline',
					'options' => array(
						array('name' => '1', 'value' => '1'),
						array('name' => '2', 'value' => '2'),
					)
				),
				array(
					'name' => 'Image 1',
					'desc' => '',
					'id' => $prefix . 'pr_row'.$count_rows.'_img1',
					'type' => 'file',
					'save_id' => true, // save ID using true
					'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
				array(
					'name' => 'Image 2',
					'desc' => '',
					'id' => $prefix . 'pr_row'.$count_rows.'_img2',
					'type' => 'file',
					'save_id' => true, // save ID using true
					'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
				),
			),
		);	
	} // end while rows
	$meta_boxes[] = array(
		'id' => 'doc',
		'title' => 'Document',
		'pages' => array('document'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Document',
				'desc' => 'Upload a document',
				'id' => $prefix . 'doc',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
		),
	);
	// sticky content in home page
	$meta_boxes[] = array(
		'id' => 'home-sticky',
		'title' => 'Featured content in home page',
		'pages' => array('project','page'), // post type
		'context' => 'side',
		'priority' => 'high',
		'show_names' => false, // Show field names on the left
		'fields' => array(
			array(
				'name' => '',
				'desc' => 'If you check the box, this content will appear as a featured content in the home page.',
				'id' => $prefix . 'home_sticky',
				'type' => 'checkbox',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'be_sample_metaboxes' );
// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'lib/metabox/init.php' );
	}
}

// Adding featured image to the custom post types
add_theme_support( 'post-thumbnails', array( 'project') );

// excerpt support in pages
add_post_type_support( 'page', 'excerpt' );

// removing menu items from the admin panel
function remove_menus () {
	global $menu;
	$restricted = array( __('Posts'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_menus');
?>
