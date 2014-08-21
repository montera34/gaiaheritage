<?php
/*
Template Name: About
*/
get_header();
?>


<?php
$page_tit = "Gaia Heritage";
$loop = "mosac.text";

$args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'menu_order',
	'child_of' => $post->ID,
);
$about_pages = get_pages($args);
$about_ids = array($post->ID);
foreach ( $about_pages as $pag ) {
	array_push($about_ids,$pag->ID);
}
$args = array(
	'post_type' => 'page',
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'post__in' => $about_ids,
);
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
				<div class="row mosac-row">
					<div id="mosactext">
	<?php // The Loop
	$count = 0;
	while ( $the_query->have_posts() ) : $the_query->the_post();
	//while ( have_posts() ) : the_post();
		$count++;
		include "loop.".$loop.".php";
		if ( $count == 4 ) { $count = 0; }
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata(); ?>
					</div><!-- #mosactext -->
				</div><!-- .row -->
			</div><!-- .span3 -->

		<?php // links query
		$links = get_bookmarks();
		if ( $links[0] != '' ) {
			echo "
			<div class='span1'>
				<div class='row'>
					<div class='span1'>
						<header><h2 class='sec-tit'>Links</h2></header>
						<div class='box'>
			";
			$which_loop = "links";
			$list_count = 0;
			foreach ( $links as $link ) {
				$list_count++;
				include "loop.list.php";
			}
			echo "
						</div><!-- .box -->
					</div><!-- .span1 -->
				</div><!-- .row -->
			</div><!-- .span1 -->
			";
		}
		?>
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
