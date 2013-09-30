<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html class="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) | !(IE 9) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<?php
// main page vars
global $genvars;
$genvars = array(
	'blogname' => get_bloginfo('name'), // title
	'blogdesc' => get_bloginfo( 'description', 'display' ), // description
	'blogurl' => get_bloginfo('url'), // home url
	'blogtheme' => get_bloginfo('template_directory'), // theme url
);
?>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>
<?php
	/* From twentyeleven theme
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	//bloginfo( 'name' );
		echo $genvars['blogname'];

		// Add the blog description for the home/front page.
		$site_description = $genvars['blogdesc'];
		if ( $site_description != '' && ( is_home() || is_front_page() ) )
			echo " | $site_description";

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'gaiaheritage' ), max( $paged, $page ) );
		?>
</title>

<meta content="Gaia Heritage" name="author" />
<meta content="<?php echo $genvars['blogdesc']; ?>" name="description" />
<meta content="heritage" name="keywords" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<!-- Bootstrap -->
<link href="<?php echo $genvars['blogtheme']; ?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />

<link rel="alternate" type="application/rss+xml" title="<?php echo $genvars['blogname']; ?> RSS Feed suscription" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php echo $genvars['blogname']; ?> Atom Feed suscription" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
// extra styles for menu items
$archive_pt = wp_strip_all_tags($_GET['post_type']);
$single_pt = get_post_type();
if ( $archive_pt != '' || $single_pt != '' ) { ?>
	<style>
	<?php if ( $archive_pt != '' ) { // when project archive ?>
		.post-type-<?php echo $archive_pt ?> a { border-bottom: 3px solid; }
	<?php }
	if ( $single_pt != '' ) { // when project archive ?>
		.post-type-<?php echo $single_pt ?> a { border-bottom: 3px solid; }
	<?php } ?>
	</style>
<?php }

// if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<div id="pre" class="box-space container">
		<div class="row">
			<div id="gaia" class="span4">
				<div class="row">
					<h1 class="span1"><?php echo "<a href='" .$genvars['blogurl']. "' title='Ir al inicio'>" .$genvars['blogname']. "</a>"; ?></h1>
					<div class="span1 offset2"><h2><?php echo $genvars['blogdesc']; ?></h2></div>
				</div>
			</div><!-- #gaia -->
		</div>
	</div><!-- #pre -->

	<nav>
	<div id="premenu" class="container">
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse">
				<div class="row">
					<div class="span4">
					<?php // main navigation menu for home page
		                        $menu_slug = "header-menu";
		                        $args = array(
						'theme_location' => $menu_slug,
						'container' => 'false',
					//	'menu_id' => 'pre-menu',
						'menu_class' => 'nav',
					//	'fallback_cb' => 'wp_page_menu',
					//	'walker' => new twitter_bootstrap_nav_walker()
		                        );
		                        wp_nav_menu( $args );
		                        ?>
					</div>
				</div>
				</div>
			</div><!-- .container-->
		</div><!-- .navbar-inner -->
	</div><!-- .navbar -->
	</div><!-- #premenu -->
	</nav>
</header>

<section>
	<div class="container">
