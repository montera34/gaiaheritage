<?php
$tit = get_the_title();
$excerpt = get_the_excerpt();
?>
	<article>
		<div class="span1">
		<header>
					<h2 class="sec-tit"><?php echo $tit; ?></h2>
		</header>
			<div class="box mosactext-item">
				<div class="boxitem-space mosactext-item-text"><?php echo $excerpt; ?></div>
			</div>
		</div>
	</article>
