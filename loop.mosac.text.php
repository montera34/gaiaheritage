<?php
$tit = get_the_title();
$perma = get_permalink();
$excerpt = get_the_excerpt();
if ( $count == 1 ) { 
	$header = "<h2 class='sec-tit catcheye'>" .$tit. "</h2><div class='box-catcheye catcheye'>" .$genvars['blogdesc']. "</div>";
} else {
	$header = "<h2 class='sec-tit'>" .$tit. "</h2>";
}
?>
	<article>
		<div class="span1">
			<header>
				<?php echo $header; ?>
			</header>
			<div class="box mosactext-item">
				<div class="boxitem-space mosactext-item-text"><?php echo $excerpt; ?></div>
			</div>
			<div class="mosactext-more"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>">+</a></div>
		</div>
	</article>
