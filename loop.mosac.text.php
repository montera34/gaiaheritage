<?php
//if ( $home_sticky_pages == 1 ) { $perma = get_permalink(2); }
if ( is_page_template("page-about.php") || is_home() ) {
	$perma = get_permalink(2);
} else { $perma = get_permalink(); }
 
if ( is_page_template("page-about.php") ) {
	$tit = get_the_title();
	$excerpt = get_the_content();
	$excerpt = apply_filters( 'the_content', $excerpt );

} elseif ( is_home() || is_page() && !is_page_template('page-about.php') ) {
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
// number of cols
if ( is_page_template("page-about.php") ) {
	$cols = get_post_meta( $post->ID, '_gaia_box_cols', true );
	if ( $cols == '' ) { $cols = 1; }
} else { $cols = 1; }
$span_class = "span".$cols;
?>
	<article>
		<div class="<?php echo $span_class ?> mosactext">
			<header>
				<?php echo $tit_out; ?>
			</header>
			<div class="box mosactext-item">
				<div class="boxitem-space mosactext-item-text"><?php echo $excerpt; ?></div>
			</div>
			<?php if ( is_page_template('page-about.php') ) {} else { ?>
				<div class="mosactext-more"><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>">+ info</a></div>
			<?php } ?>
		</div>
	</article>
