<?php
$tit = get_the_title();
$perma = get_permalink();
if ( is_home() ) { $excerpt_out = ""; }
else { $excerpt_out = "<div class='boxitem-space list-item-text'>" .get_the_excerpt(). "</div>"; }
if ( $list_count == 1 ) { $list_class = "list-item-first"; }
else { $list_class = "list-item"; }
?>
	<article>
		<div class="<?php echo $list_class ?>">
			<h3 class="boxitem-space list-item-tit"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></h3>
			<?php echo $excerpt_out; ?>
		</div>
	</article>
