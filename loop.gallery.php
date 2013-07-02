<?php
	while ( $rows > $count_rows ) {
		$count_rows++;
		$row_cols = get_post_meta( $post->ID, '_gaia_'.$prefix.'_row'.$count_rows.'_cols', true );
		$item_count = 0;
		if ( $row_cols == 1 ) {
			$row_img1 =  get_post_meta( $post->ID, '_gaia_'.$prefix.'_row'.$count_rows.'_img1', true );
			if ( $row_img1 != '' ) {
				$loop_out .= "
				<div class='row'><div class='span2'>
					<div class='mosacimg-item mosacimg-item-first'>
						<img style='right: 10px;' class='".$img_class."' src='".$row_img1."' alt='".$img_tit."' />
					</div>
				</div></div>
				";
			}

		} elseif ( $row_cols == 2 ) {
			$row_img1 =  get_post_meta( $post->ID, '_gaia_'.$prefix.'_row'.$count_rows.'_img1', true );
			$row_img2 =  get_post_meta( $post->ID, '_gaia_'.$prefix.'_row'.$count_rows.'_img2', true );
			if ( $row_img1 != '' || $row_img2 != '' ) {
				$loop_out .= "
				<div class='row'><div class='span1'>
					<div class='mosacimg-item mosacimg-item-first'>
						<img class='".$img_class."' src='".$row_img1."' alt='".$img_tit."' />
					</div>
				</div>
				<div class='span1'>
						<img class='".$img_class."' src='".$row_img2."' alt='".$img_tit."' />
				</div></div>
				";
			}

		} else {
			// do nothing
		}
	} // end while rows
?>
