<?php
$tit = get_the_title();
$excerpt = get_the_excerpt();
?>
	<article>
		<div class="span1 mosacimg-item">
			<h3 class="boxitem-space mosacimg-item-tit"><?php echo $tit; ?></h3>
			<div class="boxitem-space mosacimg-item-text"><?php echo $excerpt; ?></div>
			<div class="boxitem-space mosacimg-item-img"><img src="wp-content/uploads/2013/01/brasilia-300x183.jpg" alt="" /></div>
		</div>
	</article>
