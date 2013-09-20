<?php
get_header();
?>
<?php
// project post type archive

//	$args = array(
//		'post_type' => 'project',
//		'posts_per_page' => '-1',
//	);
	$page_tit = "Projects";
	$page_perma = $genvars['blogurl'];
	//$page_perma = $genvars['blogurl']. "/project";
	//$page_perma = $genvars['blogurl']. "?post_type=project"; // this way does not work
	$loop = "mosac.img";
	// filters
	//$years = get_terms( "year", $args );
	$years = get_terms( "yearr", $args );
	$countries = get_terms( "country", $args );
	$current_yearr = wp_strip_all_tags($_GET['yearr']);
	$current_country = wp_strip_all_tags($_GET['country']);

	$options_out = "";
	foreach ( $years as $term ) {
		if ( $term->slug == $current_yearr ) { $options_out .= "<option value='" .$term->slug. "' selected>" .$term->name. "</option>"; $selected = true; }
		else { $options_out .= "<option value='" .$term->slug. "'>" .$term->name. "</option>"; }
	}
	if ( $selected == true ) { $selected_out = ""; } else { $selected_out = " selected"; }
	$filters_out = "
	<div class='row mosac-row'>
		<div class='span4'>
			<form class='filter-form form-inline row' name='selec-tax' action='" .$page_perma. "' method='get'>
			<fieldset class='span1'>
			<label class='label-first' for='yearr'>Year</label>
			<select name='yearr'>
				<option value=''" .$selected_out. ">All</option>
				" .$options_out. "
			</select>
			</fieldset>
	";

	unset($selected); unset($selected_out); $options_out = "";
	foreach ( $countries as $term ) {
		if ( $term->slug == $current_country ) { $options_out .= "<option value='" .$term->slug. "' selected>" .$term->name. "</option>"; $selected = true; }
		else { $options_out .= "<option value='" .$term->slug. "'>" .$term->name. "</option>"; }
	}
	if ( $selected == true ) { $selected_out = ""; } else { $selected_out = " selected"; }
	$filters_out .= "
			<fieldset class='span1'>
			<label for='country'>Country</label>
			<select name='country'>
				<option value=''" .$selected_out. ">All</option>
				" .$options_out. "
			</select>
			</fieldset>
			<fieldset class='span1'>
			<input class='form-button' type='submit' value='Filter' />
			<input id='post_type' name='post_type' type='hidden' value='project' />
			</fieldset>
			</form>
		</div>
	</div>
	";
?>
	<section>
		<header>
			<div class="row sec-space">
				<div class="span4">
					<h2 class="sec-tit catcheye"><?php echo $page_tit ?></h2>
				</div>
			</div>
		</header>
		<div class="row">
			<div class="span4 box">

				<?php echo $filters_out ?>
				<div class="row mosac-row">
	<?php if ( have_posts() ) {
		// The Loop
		$count = 0;
		//while ( $the_query->have_posts() ) : $the_query->the_post();
		while ( have_posts() ) : the_post();
			$count++;
			include "loop.".$loop.".php";
			if ( $count == 4 ) { $count = 0; }
		endwhile;
		/* Restore original Post Data 
		 * NB: Because we are using new WP_Query we aren't stomping on the 
		 * original $wp_query and it does not need to be reset.
		*/
		wp_reset_postdata();
	} else {
		// if no posts in this loop
		echo "<div class='span4 boxitem-space'><strong>We have found no projects with these criteria. Try again!</strong></div>";
	} // end if have post ?>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
	</section>


<?php get_footer(); ?>
