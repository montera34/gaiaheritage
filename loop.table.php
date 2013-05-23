<?php
$tit = get_the_title();
$perma = get_permalink();
$excerpt = get_the_excerpt();
$date_human = get_the_time('m\/d\/Y');
$date = get_the_time('Y-m-d');
$format = "PDF";
$size = "340kB";
?>
	<tr class="table-row">
		<td><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></td>
		<td><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></td>
		<td><time datetime="<?php echo $date; ?>"><?php echo $date_human; ?></time></td>
		<td><?php echo $format; ?></td>
		<td><?php echo $size; ?></a></td>
	</tr>
