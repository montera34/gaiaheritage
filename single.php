<?php
get_header();

$page_tit = get_the_title();

// latest news loop
$args = array(
	'post_type' => 'new',
	'posts_per_page' => 5,
	
);
$relnews = get_posts($args);
$relnews_out = "<div class='box'>";
$rel_count = 0;
foreach ( $relnews as $relnew ) {
	$rel_count++;
	if ( $rel_count == 1 ) { $relnew_class = "list-item-first"; }
	else { $relnew_class = "list-item"; }
	setup_postdata($relnew);
	$relnew_tit = get_the_title( $relnew->ID );
	$relnew_perma = get_permalink( $relnew->ID );
	$relnews_out .= "<div class='" .$relnew_class. "'><h3 class='boxitem-space list-item-tit'><a href='" .$relnew_perma. "' title='" .$relnew_tit. "'>" .$relnew_tit. "</a></h3></div>";

}
$relnews_out .= "</div>";

if ( have_posts() ) { ?>
	<article <?php post_class(); ?>>
		<header>
			<div class="row sec-space">
				<div class="span4">
					<h1 class="sec-tit catcheye"><?php echo $page_tit ?></h1>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span3 box">

				<div class="boxitem-bigspace">
	<?php // The Loop
	$count = 0;
	while ( have_posts() ) : the_post();
		the_content();
	endwhile; ?>
				</div><!-- .boxitem-bigspace -->
			</div><!-- .box -->
			<section id="relnews" class="span1">
				<header><h2 class='sec-tit'>Latest news</h2></header>
				<?php echo $relnews_out ?>
			</section><!-- #relnews -->
		</div><!-- row-->
	</article>

<?php } else {
// if no posts in this loop
	echo "No news!";
} // end if have post ?>

<?php get_footer(); ?>
