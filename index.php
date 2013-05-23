<?php
get_header();
?>

<?php
// featured projects
$args = array(
	'post_type' => 'project',
	'posts_per_page' => '4',
	'meta_query' => array(
		array(
			'key' => '_gaia_home_sticky',
			'compare' => '=',
			'value' => 'on'
		),
	),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) { ?>
	<section>
		<header>
			<div class="row">
				<div class="span4">
					<h2 class="sec-tit">Featured Projects</h2>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4 box">
				<div class="row">
	<?php // The Loop
	while ( $the_query->have_posts() ) : $the_query->the_post();
		include "loop.mosac.img.php";
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata();

} else {
// if no posts in this loop ?>
				</div>
			</div><!-- .box -->
		</div>

<?php } // end if have post ?>

	</div>
</section>
<!-- end featured projects -->

<?php get_footer(); ?>
