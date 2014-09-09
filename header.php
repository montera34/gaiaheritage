<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
	echo GAIA_BLOGNAME;

	// Add the blog description for the home/front page.
	$site_description = GAIA_BLOGDESC;
	if ( $site_description != '' && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'gaiaheritage' ), max( $paged, $page ) );
?>
</title>

<meta content="Gaia Heritage" name="author" />
<meta content="<?php echo GAIA_BLOGDESC; ?>" name="description" />
<meta content="heritage" name="keywords" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<!-- Bootstrap -->
<link href="<?php echo GAIA_BLOGTHEME; ?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />

<link rel="alternate" type="application/rss+xml" title="<?php echo GAIA_BLOGNAME; ?> RSS Feed suscription" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php echo GAIA_BLOGNAME; ?> Atom Feed suscription" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<div id="pre" class="box-space container">
		<div class="row">
			<div id="gaia" class="span4">
				<div class="row">
					<h1 class="span1"><?php echo "<a href='" .GAIA_BLOGURL. "' title='Ir al inicio'>" .GAIA_BLOGNAME. "</a>"; ?></h1>
					<div class="span1 offset2"><h2><?php echo GAIA_BLOGDESC; ?></h2></div>
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

<div class="container">
