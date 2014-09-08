<?php
//if ( $home_sticky_pages == 1 ) { $perma = get_permalink(2); }
$perma = get_permalink();
 
if ( is_home() ) {
	$tit = get_the_title();
	$excerpt = get_the_excerpt();

} elseif ( is_archive() ) {
	$date_human = get_the_time('F d, Y');
	$date = get_the_time('Y-m-d');
	$tit = "<time datetime='" .$date. "'>" .$date_human. "</time>";	
		$header = "<h2 class='sec-tit catcheye'>" .$tit. "</h2><div class='box-catcheye catcheye'>" .$genvars['blogdesc']. "</div>";
	$excerpt = "<h3 class='mosactext-item-tit'><a href='" .$perma. "'>" .get_the_title(). "</a></h3>" .get_the_excerpt();
}

if ( $count == 1 && is_home() ) { 
	$tit_out = "<h2 class='sec-tit catcheye'>" .$tit. "</h2><div class='box-catcheye catcheye'>" .$genvars['blogdesc']. "</div>";
} else {
	$tit_out = "<h2 class='sec-tit'>" .$tit. "</h2>";
}

?>
	<article>
		<div class="span1 mosactext">
			<header>
				<?php echo $tit_out; ?>
			</header>
			<div class="box mosactext-item">
				<div class="boxitem-space mosactext-item-text"><?php echo $excerpt; ?></div>
			</div>
			<div class="mosactext-more"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>">+ info</a></div>
		</div>
	</article>
