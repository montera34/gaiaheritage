<?php
get_header();

$page_tit = get_the_title();

// related docs loop
$args = array(
	'post_type' => 'document',
	'posts_per_page' => '-1',
	'meta_query' => array(
		array(
			'key' => "_gaia_rel-project-tit",
			'compare' => '=',
			'value' => $page_tit
		),
	),
);
$reldocs = get_posts($args);
//$the_query = new WP_Query( $args );

//if ( $the_query->have_posts() ) {
if ( count($reldocs) >= 1 ) {
	$reldocs_out = "<section><div id='reldocs' class='span1'><h3 class='reldocs-tit'>Documents</h3>";
	// The Loop
	foreach ( $reldocs as $reldoc ) {
		setup_postdata($reldoc);
	//while ( $the_query->have_posts() ) : $the_query->the_post();
		$reldoc_tit = get_the_title();
		$reldoc_perma = get_post_meta( $reldoc->ID, '_gaia_doc', true );
		$reldocs_out .= "<div class='list-item'><strong><a href='" .$reldoc_perma. "' title='" .$reldoc_tit. "'>" .$reldoc_tit. "</strong></div>";
	}
	//endwhile;
	$reldocs_out .= "</div></section>";
	//wp_reset_postdata();

} else { $reldocs_out = ""; } // end if have post 
// end related docs loop


$loop = "single";
$taxs = array(
	array(
		'slug' => 'country',
		'name' => 'Country',
		'term_class' => 'single-term',
		'label_class' => 'label-first',
		'link' => 'yes'
	),
	array(
		'slug' => 'yearr',
		'name' => 'Year',
		'term_class' => 'single-term',
		'label_class' => 'label-middle',
		'link' => 'yes'
	),
	array(
		'slug' => 'city',
		'name' => 'City',
		'term_class' => 'single-term',
		'label_class' => 'label-middle',
		'link' => 'no'
	),
	array(
		'slug' => 'client',
		'name' => 'Client',
		'term_class' => 'single-term',
		'label_class' => 'label-last',
		'link' => 'no'
	),
);
$filters_out = "<div class='row mosac-row'>";
foreach ( $taxs as $tax ) {
	$terms = get_the_terms($post->ID,$tax['slug']);
	if ( $terms != '' ) {
	$terms_out = "";
	foreach ( $terms as $term ) {
		$term_perma = get_term_link($term);
		//$term_perma = ;
		if ( $tax['link'] == 'yes' ) {
			$terms_out .= "<a class='" .$tax['term_class']. "' href='" .$term_perma. "'>" .$term->name. "</a>, ";
		} else {
			$terms_out .= $term->name. ", ";
		}
	}
	$terms_out = substr($terms_out, 0, -2);
	
	$filters_out .= "
		<dl class='span1 filter-single " .$tax['label_class']. "'>
			<dt>" .$tax['name']. "</dt>
			<dd>" .$terms_out. "</dd>
		</dl>
	";
	}
}
$filters_out .= "</div><!-- .mosac-row -->";
if ( have_posts() ) { ?>
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
	<?php // The Loop
	$count = 0;
	//while ( $the_query->have_posts() ) : $the_query->the_post();
	while ( have_posts() ) : the_post();
		$count++;
		include "loop.".$loop.".php";
		if ( $count == 4 ) { $count = 0; }
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata();

				echo $reldocs_out ?>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop
	echo "No projects!";
} // end if have post ?>

<?php get_footer(); ?>
