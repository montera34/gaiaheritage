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

if ( count($reldocs) >= 1 ) {
	$reldocs_out = "<section id='reldocs'><header><h3 class='reldocs-tit'>Documents</h3></header>";
	foreach ( $reldocs as $reldoc ) {
		setup_postdata($reldoc);
		$reldoc_tit = get_the_title();
		$reldoc_perma = get_post_meta( $reldoc->ID, '_gaia_doc', true );
		$reldocs_out .= "<div class='list-item'><strong><a href='" .$reldoc_perma. "' title='" .$reldoc_tit. "'>" .$reldoc_tit. "</a></strong></div>";
	}
	$reldocs_out .= "</section>";

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
$filters_out = "<dl class='filter-single'>";
foreach ( $taxs as $tax ) {
	$terms = get_the_terms($post->ID,$tax['slug']);
	if ( $terms != '' ) {
	$terms_out = "";
	foreach ( $terms as $term ) {
		if ( $tax['link'] == 'yes' ) {
			$term_perma = trailingslashit(GAIA_BLOGURL). "project/?" .$tax['slug']. "=" .$term->slug;
			$terms_out .= "<a class='" .$tax['term_class']. "' href='" .$term_perma. "'>" .$term->name. "</a>, ";
		} else {
			$terms_out .= $term->name. ", ";
		}
	}
	$terms_out = substr($terms_out, 0, -2);
	
	$filters_out .= "
			<dt>" .$tax['name']. "</dt>
			<dd>" .$terms_out. "</dd>
	";
	}
}
$filters_out .= "</dl><!-- .filter-single -->";

if ( have_posts() ) { ?>
	<article>
		<header>
			<div class="row sec-space">
				<div class="span4">
					<h1 class="sec-tit catcheye"><?php echo $page_tit ?></h1>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4 box">

				<div class="row mosac-row">
				<?php // The Loop
				$count = 0;
				while ( have_posts() ) : the_post();
					$count++;
					include "loop.".$loop.".php";
					if ( $count == 4 ) { $count = 0; }
				endwhile;
				echo "<div class='span1'>" .$filters_out . $reldocs_out. "</div>"; ?>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</article>

<?php } else {
// if no posts in this loop
	echo "No projects!";
} // end if have post ?>

<?php get_footer(); ?>
