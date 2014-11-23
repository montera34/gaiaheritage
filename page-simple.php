<?php
/*
Template Name: Simple page: just page title and content
*/
get_header();

if ( have_posts() ) {
	while ( have_posts() ) : the_post(); ?>
	<div class="row sec-space">
		<section class="span3">
			<div class="row">
				<div class="span4"><h1 class="sec-tit catcheye"><?php the_title(); ?></h1></div>
			</div>
			<article class="row">
				<div class="span3 box">
				<div class="boxitem-bigspace">
					<?php the_content(); ?>
				</div><!-- .boxitem-space -->
				</div><!-- .box -->
			</article><!-- row-->

		</section>
	</div>

	<?php 
	endwhile;
} else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
