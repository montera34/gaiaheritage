<?php
$tit = get_the_title();
$excerpt = get_the_excerpt();
$date_human = get_the_time('m\/d\/Y');
$date = get_the_time('Y-m-d');
$perma = get_post_meta( $post->ID, '_gaia_doc', true );
$path = parse_url($perma, PHP_URL_PATH);
$doc_path = $_SERVER['DOCUMENT_ROOT'] . $path;
$size = round( filesize( $doc_path ) /1024 ) . " kB";
$format = mime_content_type($doc_path);
$rel_project_url = get_post_meta( $post->ID, '_gaia_rel-project', true );
$rel_project_tit = get_post_meta( $post->ID, '_gaia_rel-project-tit', true );
if ( $rel_project_tit == '' || $rel_project_url == '' ) { $rel_project_out = "none"; }
else { $rel_project_out = "<a href='" .$rel_project_url. "' title='" .$rel_project_tit. "'>" .$rel_project_tit. "</a>"; }
?>
	<tr class="table-row">
		<td><a href="<?php echo $perma; ?>" title="<?php echo $tit; ?>"><?php echo $tit; ?></a></td>
		<td><?php echo $rel_project_out; ?></td>
		<td><time datetime="<?php echo $date; ?>"><?php echo $date_human; ?></time></td>
		<td><?php echo $format; ?></td>
		<td><?php echo $size; ?></a></td>
	</tr>
