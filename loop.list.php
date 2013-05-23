<?php
$tit = get_the_title();
$excerpt = get_the_excerpt();
?>
	<article>
		<div class="list-item">
			<h3 class="boxitem-space list-item-tit"><?php echo $tit; ?></h3>
			<div class="boxitem-space list-item-text"><?php echo $excerpt; ?></div>
		</div>
	</article>
