<?php
$tit = get_the_title();
$perma = get_permalink();
$excerpt = get_the_excerpt();
if ( $count == 1 ) { $item_class = " mosacimg-item-first"; }
elseif ( $count == 4 ) { $item_class = " mosacimg-item-last"; }
else { $item_class = ""; }

if ( has_post_thumbnail() ) {
	$img = get_the_post_thumbnail($post->ID,'thumbnail');
	$img_out = "
		<div class='mosacimg-item-img'>
			".$img."
		</div>
		";
} else {
	$img_out = "";
	$item_class .= " noimg";
}
?>
	<article>
		<div class="span1">
			<div class="mosacimg-item<?php echo $item_class; ?>">
			<a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>">
				<h3 class="boxitem-space mosacimg-item-tit"><?php echo $tit; ?></h3>
				<div class="boxitem-space mosacimg-item-text"><?php echo $excerpt; ?></div>
			</a>
			<?php echo $img_out; ?>
			</div>
		</div>
	</article>
