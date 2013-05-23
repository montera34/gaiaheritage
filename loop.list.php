<?php
$tit = get_the_title();
$perma = get_permalink();
$excerpt = get_the_excerpt();
?>
	<article>
		<div class="list-item">
			<h3 class="boxitem-space list-item-tit"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></h3>
			<div class="boxitem-space list-item-text"><?php echo $excerpt; ?></div>
		</div>
	</article>
