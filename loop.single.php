<?php
if ( has_post_thumbnail() ) { // if project has images
?>
	<div class="span1">
		<figure><?php echo get_the_post_thumbnail($post->ID,'medium'); ?></figure>
	</div>
	<div class="span2 single-text">
		<?php the_content(); ?>
	</div>

<?php } else { ?>
	<div class="span3">
	<div class="boxitem-bigspace">
		<?php the_content(); ?>
	</div>
	</div>

<?php } ?>
