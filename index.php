<?php
get_header();
?>
<?php
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
	<!-- featured projects -->
	<section>
		<header>
			<div class="row sec-space">
				<div class="span4">
					<h2 class="sec-tit">Featured Projects</h2>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4 box">
				<div class="row mosac-row">
	<?php // The Loop
	$count = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$count++;
		include "loop.mosac.img.php";
		if ( $count == 4 ) { $count = 0; }
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata(); ?>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>
	<!-- end featured projects -->

<?php } else {
// if no posts in this loop

} // end if have post ?>


<div class="row sec-space">
	<!-- about -->
	<section>
		<div class="span3">
			<div class="row">
<?php
// home pages loop
$args = array(
	'post_type' => 'page',
	'posts_per_page' => '3',
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'meta_query' => array(
		array(
			'key' => '_gaia_home_sticky',
			'compare' => '=',
			'value' => 'on'
		),
	),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
	// The Loop
	$home_sticky_pages = 1;
	$count = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$count++;
		include "loop.mosac.text.php";
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata();

} else {
// if no posts in this loop
} // end if have post ?>

			</div>
		</div>
	</section>
<!-- end about -->

<!-- news -->
	<section>
		<div class="span1">
			<div class="row">
				<div class="span1">
					<header>
						<h2 class="sec-tit">News</h2>
					</header>
					<div class="box">
<?php // news
$args = array(
	'post_type' => 'new',
	'posts_per_page' => '5',
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) { ?>
	<?php // The Loop
	while ( $the_query->have_posts() ) : $the_query->the_post();
		include "loop.list.php";
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata(); ?>

<?php } else {
// if no posts in this loop

} // end if have post ?>

					</div>
					<div class="mosactext-more"><a href="<?php echo $genvars['blogurl']; ?>/news" title="News archive">+</a></div>
				</div>
			</div>
		</div>
	</section>
	<!-- end news -->

</div>
<?php get_footer(); ?>
