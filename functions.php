<?php
// theme setup main function
add_action( 'after_setup_theme', 'gaia_theme_setup' );
function gaia_theme_setup() {

	// theme global vars
	if (!defined('GAIA_BLOGNAME'))
	    define('GAIA_BLOGNAME', get_bloginfo('name'));

	if (!defined('GAIA_BLOGDESC'))
	    define('GAIA_BLOGDESC', get_bloginfo('description','display'));

	if (!defined('GAIA_BLOGURL'))
	    define('GAIA_BLOGURL', get_bloginfo('url'));

	if (!defined('GAIA_BLOGTHEME'))
	    define('GAIA_BLOGTHEME', get_bloginfo('template_directory'));

	// change default excerpt lengh and more label
	add_filter( 'excerpt_length', 'gaia_excerpt_length', 999 );
	add_filter('excerpt_more', 'gaia_excerpt_more');
	// excerpt support in pages
	add_post_type_support( 'page', 'excerpt' );

	// register js scripts to avoid conflicts
	add_action( 'wp_print_scripts', 'gaia_scripts_method' );

	// custom menus
	add_action( 'init', 'gaia_nav_menus' );

	// custom post types and taxonomies
	add_action( 'init', 'gaia_post_types', 0 );
	add_action( 'init', 'gaia_taxonomies', 0 );

	// custom field boxes
	add_filter( 'cmb_meta_boxes', 'gaia_metaboxes' );
	add_action( 'init', 'gaia_initialize_cmb_meta_boxes', 9999 );

	// Adding featured image to the custom post types
	add_theme_support( 'post-thumbnails', array( 'project') );

	// remove item from wordpress dashboard
	add_action('admin_menu', 'gaia_remove_dashboard_item');

} // END theme setup main function

// change default excerpt lengh and more label
function gaia_excerpt_length( $length ) {
	return 20;
}
function gaia_excerpt_more( $more ) {
	return '';
}

// register js scripts to avoid conflicts
function gaia_scripts_method() {
	if ( get_post_type() == 'new' && !is_single() || is_page_template('page-about.php') ) {
	// if is new post type or about page, load masonry
		wp_enqueue_script(
			'imagesloaded-js',
			get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js',
			array(),
			'3.1.8',
			TRUE
		);
		wp_enqueue_script( 'masonry' );
		if ( get_post_type() == 'new' && !is_single() ) { $sufix = "news"; }
		else { $sufix = "about"; }
		wp_enqueue_script(
			'masonry.options',
			get_template_directory_uri() . '/js/jquery.masonry.options-' .$sufix. '.js',
			array( 'masonry' ),
			'1.0',
			TRUE
		);
	} // end if new post type or about page
	wp_enqueue_script('jquery');
	wp_enqueue_script(
		'bootstrap.min',
		get_template_directory_uri() . '/js/bootstrap.min.js',
		array( 'jquery' ),
		'2.1.2',
		TRUE
	);
}

// custom menus
add_action( 'init', 'gaia_nav_menus' );
function gaia_nav_menus() {
        if ( function_exists( 'register_nav_menus' ) ) {
                register_nav_menus(
                array(
                        'header-menu' => 'Header menu',
                )
                );
        }
}

// Custom post types
function gaia_post_types() {
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
		'menu_icon' => get_template_directory_uri() . '/img/gaia-dashboard-pt-project.png',
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
		'menu_icon' => get_template_directory_uri() . '/img/gaia-dashboard-pt-document.png',
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
		'menu_icon' => get_template_directory_uri() . '/img/gaia-dashboard-pt-new.png',
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
function gaia_taxonomies() {
	register_taxonomy( 'yearr', 'project', array( // year taxonomy
		'hierarchical' => true,
		'label' => 'Year',
		'name' => 'Years',
		'query_var' => 'yearr',
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'yearr', 'with_front' => false ),) );
	register_taxonomy( 'country', 'project', array( // Country taxonomy
		'hierarchical' => true,
		'label' => 'Countries',
		'name' => 'Country',
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'country', 'with_front' => false ),) );
	register_taxonomy( 'city', 'project', array( // City taxonomy
		'hierarchical' => false,
		'label' => 'Cities',
		'name' => 'City',
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'city', 'with_front' => false ),) );
	register_taxonomy( 'client', 'project', array( // Client taxonomy
		'hierarchical' => false,
		'label' => 'Clients',
		'name' => 'Client',
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'client', 'with_front' => false ),) );
} // END taxonomies

// Custom field boxes
function gaia_metaboxes( $meta_boxes ) {
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
				'desc' => 'Upload a document or write a URL',
				'id' => $prefix . 'doc',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Project title',
				'desc' => 'title of a related project',
				'id' => $prefix . 'rel-project-tit',
				'type' => 'text_medium',
			),
			array(
				'name' => 'Project URL',
				'desc' => 'URL of a related project',
				'id' => $prefix . 'rel-project',
				'type' => 'text_medium',
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
	// extra fields in contact page
	$rows = 5; // maximun number of rows
	$count_rows = 0;
	while ( $rows > $count_rows ) {
		$count_rows++;
		$meta_boxes[] = array(
			'id' => 'contact_mail_'.$count_rows,
			'title' => 'Email '.$count_rows,
			'pages' => array('page'), // post type
			'show_on' => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
			'context' => 'side',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Email address name',
					'desc' => '',
					'id' => $prefix . 'email_name_'.$count_rows,
					'type' => 'text_medium',
				),
				array(
					'name' => 'Email address',
					'desc' => '',
					'id' => $prefix . 'email_address'.$count_rows,
					'type' => 'text_medium',
				),
			),
		);
		$meta_boxes[] = array(
			'id' => 'contact_address_'.$count_rows,
			'title' => 'Postal addresses '.$count_rows,
			'pages' => array('page'), // post type
			'show_on' => array( 'key' => 'page-template', 'value' => 'page-contact.php' ),
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true, // Show field names on the left
			'fields' => array(
				array(
					'name' => 'Postal address name',
					'desc' => '',
					'id' => $prefix . 'address_name_'.$count_rows,
					'type' => 'text_medium',
				),
				array(
					'name' => 'Complete address',
					'desc' => '',
					'id' => $prefix . 'address_complete_'.$count_rows,
					'type' => 'wysiwyg',
					'options' => array(
					    'wpautop' => true, // use wpautop?
					    'textarea_rows' => get_option('default_post_edit_rows', 2), // rows="..."
					    'teeny' => false, // output the minimal editor config used in Press This
					    'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
					),
				),
			),
		);

	}
	return $meta_boxes;
}
// Initialize the metabox class
function gaia_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'lib/metabox/init.php' );
	}
}

// removing menu items from the admin panel
function gaia_remove_dashboard_item() {
	remove_menu_page('edit.php');	
}
?>
