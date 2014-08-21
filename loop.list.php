<?php
if ( $which_loop == 'links' ) {
	$tit = $link->link_name;
	$perma = $link->link_url;
	if ( $link->link_description != '' ) { $excerpt_out = "<div class='boxitem-space list-item-text'>" .$link->link_description. "</div>"; }
	else { $excerpt_out = ""; }

} else {
	$tit = get_the_title();
	$perma = get_permalink();
	if ( is_home() ) { $excerpt_out = ""; }
	else { $excerpt_out = "<div class='boxitem-space list-item-text'>" .get_the_excerpt(). "</div>"; }
}

if ( $list_count == 1 ) { $list_class = "list-item-first"; }
else { $list_class = "list-item"; }
?>
	<div class="<?php echo $list_class ?>">
		<h3 class="boxitem-space list-item-tit"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></h3>
		<?php echo $excerpt_out; ?>
	</div>
