<?php
get_header();

// news post type archive
	$page_tit = "News";
	$page_perma = get_permalink();
	$loop = "mosac.text";

if ( have_posts() ) { ?>
	<section>
		<header>
			<div class="row sec-space-separated">
				<div class="span4">
					<h1 class="sec-tit catcheye"><?php echo $page_tit ?></h1>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4">
				<div class="row">
					<div id="mosactext">
	<?php // The Loop
	$count = 0;
	while ( have_posts() ) : the_post();
		$count++;
		include "loop.".$loop.".php";
		if ( $count == 4 ) { $count = 0; }
	endwhile; ?>
				</div><!-- #mosactext -->
				</div><!-- row-->
			</div><!-- .span4 -->
			<?php include "pagination.php"; ?>
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
