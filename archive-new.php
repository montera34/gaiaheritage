<?php
get_header();
?>

<?php
// news post type archive
	$args = array(
		'post_type' => 'new',
		'posts_per_page' => '-1',
	);
	$page_tit = "News";
	$page_perma = get_permalink();
	$loop = "mosac.text";

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>
	<section>
		<header>
			<div class="row sec-space-separated">
				<div class="span4">
					<h2 class="sec-tit catcheye"><?php echo $page_tit ?></h2>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span3">
				<div class="row">

	<?php // The Loop
	$count = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$count++;
		include "loop.".$loop.".php";
		if ( $count == 4 ) { $count = 0; }
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata(); ?>
				</div><!-- .box -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
