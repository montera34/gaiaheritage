<?php
get_header();
?>

<?php
// if project
if ( get_post_type( $post->ID ) == 'project' ) {
	$args = array(
		'post_type' => 'project',
		'posts_per_page' => '-1',
	);
	$page_tit = "Projects";
	$page_perma = get_permalink();
	$loop = "mosac.img";
	// filters
	$years = get_terms( "year", $args );
	$countries = get_terms( "country", $args );
	$filters_out = "
		<div class='span4'>
			<form class='filter-form form-inline row' name='selec-tax' action='" .$page_perma. "' method='get'>
			<fieldset class='span1'>
			<label class='label-first' for='year'>Year</label>
			<select name='year'>
				<option value='' selected>All</option>
	";
	foreach ( $years as $term ) {
		$filters_out .= "<option value='" .$term->slug. "'>" .$term->name. "</option>";
	}
	$filters_out .= "
			</select>
			</fieldset>
			<fieldset class='span1'>
			<label for='country'>Country</label>
			<select name='country'>
				<option value='' selected>All</option>
	";
	foreach ( $countries as $term ) {
		$filters_out .= "<option value='" .$term->slug. "'>" .$term->name. "</option>";
	}
	$filters_out .= "
			</select>
			</fieldset>
	";
	$filters_out .= "
			<fieldset class='span1'>
			<input class='form-button' type='submit' value='Filter' />
			</fieldset>
			</form>
		</div>
	";
}
// if project
elseif ( get_post_type( $post->ID ) == 'document' ) {
	$args = array(
		'post_type' => 'document',
		'posts_per_page' => '-1',
	);
	$page_tit = "Downloads";
	$page_perma = get_permalink();
	$loop = "table";
}

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) { ?>
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

				<div class="row mosac-row">
				<?php echo $filters_out ?>
				</div>
				<div class="row mosac-row">
					<table class="table table-hover span4">
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
						</tbody>
					</table>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
