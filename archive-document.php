<?php
get_header();
?>
<?php
// document post type archive
//	$args = array(
//		'post_type' => 'document',
//		'posts_per_page' => '-1',
//	);
	$page_tit = "Downloads";
	$page_perma = get_permalink();
	$loop = "table";
	$filters_out = "";

//$the_query = new WP_Query( $args );
//if ( $the_query->have_posts() ) {
if ( have_posts() ) {
?>
	<section>
		<header>
			<div class="row sec-space">
				<div class="span4">
					<h2 class="sec-tit catcheye"><?php echo $page_tit ?></h2>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4 box">

				<?php echo $filters_out ?>
				<div class="row mosac-row">
					<div class="span4">
					<table class="table table-hover">
						<thead class="table-head">
							<tr>
								<th>Document</th>
								<th>Project</th>
								<th>Date</th>
								<th>File Type</th>
								<th>File Size</th>
							</tr>
						<thead>
						<tbody>
	<?php // The Loop
	$count = 0;
	//while ( $the_query->have_posts() ) : $the_query->the_post();
	while ( have_posts() ) : the_post();
		$count++; //echo $count;
		include "loop.".$loop.".php";
		if ( $count == 4 ) { $count = 0; }
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata(); ?>
						</tbody>
					</table>
					</div><!-- .span4 -->
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
