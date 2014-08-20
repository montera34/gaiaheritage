<?php
$tit = get_the_title();
$perma = get_permalink();
$excerpt = get_the_excerpt();
if ( $count == 1 ) { $item_class = " mosacimg-item-first"; }
elseif ( $count == 4 ) { $item_class = " mosacimg-item-last"; }
else { $item_class = ""; }

if ( has_post_thumbnail() ) {
	$img_id = get_post_thumbnail_id( $post->ID );
	$img_data = wp_get_attachment_image_src( $img_id, 'thumbnail' );
	$img_url = $img_data[0];
	$img = get_the_post_thumbnail($post->ID,'thumbnail');
	$img_out = "
		<div class='mosacimg-item-img'>
			".$img."
		</div>
		";
	$item_class .= " withimg";
	$item_style = " style='background-image: url(" .$img_url. "); background-repeat: no-repeat; background-size: cover;'";
} else {
	$img_out = "";
	$item_class .= " noimg";
	$item_style = "";
}
?>
	<article class="span1">
			<div class="mosacimg-item<?php echo $item_class; ?>"<?php echo $item_style?>>
			<?php //echo $img_out; ?>
			<div class="mosacimg-item-text">
				<h3 class="boxitem-space mosacimg-item-tit"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></h3>
				<div class="boxitem-space mosacimg-item-desc"><?php echo $excerpt; ?></div>
				<a class="mosacimg-item-plus" href="<?php echo $perma; ?>" title="<?php echo $tit; ?>">+</a>
			</div>
			</div>
	</article>
