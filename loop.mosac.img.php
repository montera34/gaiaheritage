<?php
$tit = get_the_title();
$perma = get_permalink();
$excerpt = get_the_excerpt();
if ( $count == 1 ) { $item_class = " mosacimg-item-first"; }
elseif ( $count == 4 ) { $item_class = " mosacimg-item-last"; }
else { $item_class = ""; }
?>
	<article>
		<div class="span1 mosacimg-item<?php echo $item_class; ?>">
			<a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>">
				<h3 class="boxitem-space mosacimg-item-tit"><?php echo $tit; ?></h3>
				<div class="boxitem-space mosacimg-item-text"><?php echo $excerpt; ?></div>
			</a>
			<div class="mosacimg-item-img"><img src="wp-content/uploads/2013/01/brasilia-300x183.jpg" alt="" /></div>
		</div>
	</article>
