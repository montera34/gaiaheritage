<?php
/*
Template Name: Contact
*/
get_header();
?>

<?php
$page_tit = get_the_title();
//$loop = "mosac.text";

if ( have_posts() ) { ?>
	<section>
		<header>
			<div class="row sec-space">
				<div class="span4">
					<h1 class="sec-tit catcheye"><?php echo $page_tit ?></h1>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4 box">
				<div class="row mosac-row">
	<?php // The Loop
//	$count = 0;
	//while ( $the_query->have_posts() ) : $the_query->the_post();
	while ( have_posts() ) : the_post(); ?>
					<div class="span1"><div class="mosactext-item-first">
						<?php the_content(); ?>
					</div><!-- .mosactext-item-first -->
					</div><!-- .span1 -->
					<div class="span1"><div class="boxitem-space">
						<?php echo do_shortcode( '[contact-form-7 id="55" title="Contact form 1"]' ); ?>
					</div><!-- .boxitem-space -->
					</div><!-- .span1 -->
					<?php // postal and email addresses
					$postal_out = "";
					$email_out = "";
					$rows = 5;
					$count_rows = 0;
					while ( $rows > $count_rows ) {
						$count_rows++;
						$address_name = get_post_meta( $post->ID, '_gaia_address_name_'.$count_rows, true );
						$address_complete = get_post_meta( $post->ID, '_gaia_address_complete_'.$count_rows, true );
						$address_complete = apply_filters( 'the_content', $address_complete );
						$mail_name = get_post_meta( $post->ID, '_gaia_email_name_'.$count_rows, true );
						$mail_address = get_post_meta( $post->ID, '_gaia_email_address'.$count_rows, true );
						if ( $address_name != '' ) { $postal_out .= "<p><strong>" .$address_name. "</strong><br />" .$address_complete. "</p>"; }
						if ( $mail_address != '' ) { $email_out .= "<p><strong>" .$mail_name. "</strong><br />" .$mail_address. "</p>"; }
					} // end while ?>
					<div class="span1"><div class="boxitem-space">
						<?php echo $postal_out ?>
					</div><!-- .boxitem-space -->
					</div><!-- .span1 -->
					<div class="span1"><div class="boxitem-space">
						<?php echo $email_out ?>
					</div><!-- .boxitem-space -->
					</div><!-- .span1 -->
	<?php
//		$count++;
//		include "loop.".$loop.".php";
//		if ( $count == 4 ) { $count = 0; }
	endwhile;
	/* Restore original Post Data 
	 * NB: Because we are using new WP_Query we aren't stomping on the 
	 * original $wp_query and it does not need to be reset.
	*/
	wp_reset_postdata(); ?>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
