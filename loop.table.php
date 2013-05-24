<?php
$args = array(
	'post_type' => 'attachment',
	'numberposts' => 1,
	'post_status' => null,
	'post_parent' => $post->ID,
);
$attachments = get_posts($args);
if ( $attachments ) {
	foreach ( $attachments as $attachment ) {
		$tit = get_the_title();
		$excerpt = get_the_excerpt();
		$date_human = get_the_time('m\/d\/Y');
		$date = get_the_time('Y-m-d');
		$perma = get_post_meta( $post->ID, '_gaia_doc', true );
		$perma_path = realpath($perma);
		$format = $attachment->post_mime_type;
		$size = round( filesize( get_attached_file( $attachment->ID ) ) /1024 ) . " kB";
?>
	<tr class="table-row">
		<td><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></td>
		<td><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></td>
		<td><time datetime="<?php echo $date; ?>"><?php echo $date_human; ?></time></td>
		<td><?php echo $format; ?></td>
		<td><?php echo $size; ?></a></td>
	</tr>

<?php	} // end loop
} // end if attachment ?>
