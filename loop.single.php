<?php
$rows = 5;
$count_rows = 0;
$loop_out = "";
$img_class = "gallery-item";
$img_tit = get_the_title();
$prefix = "pr";
include "loop.gallery.php";
?>
	<div class="span2 gallery">
		<?php echo $loop_out; ?>
	</div>
	<div class="span1">
		<?php the_content(); ?>
	</div>
