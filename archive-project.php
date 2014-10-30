<?php
get_header();

// project post type archive

	$page_tit = "Projects";
	$page_perma = GAIA_BLOGURL. "/project";
	$loop = "mosac.img";
	// filters
	$years = get_terms( "yearr" );
	$countries = get_terms( "country" );
	if ( array_key_exists('yearr', $_GET) && sanitize_text_field($_GET['yearr']) != '' ) {
		$current_yearr = sanitize_text_field($_GET['yearr']);
		$page_tit .= " developed during " .$current_yearr;
	} else { $current_yearr = ""; }
	if ( array_key_exists('country', $_GET) && sanitize_text_field($_GET['country']) != '' ) {
		$current_country = sanitize_text_field($_GET['country']);
		if ( $page_tit == 'Projects' ) { $page_tit .= " developed in " .$current_country; }
		else { $page_tit .= " in " .$current_country; }
	} else { $current_country = ""; }

	$options_out = "";
	foreach ( $years as $term ) {
		if ( $term->slug == $current_yearr ) { $options_out .= "<option value='" .$term->slug. "' selected>" .$term->name. "</option>"; $selected = true; }
		else { $options_out .= "<option value='" .$term->slug. "'>" .$term->name. "</option>"; $selected = false; }
	}
	if ( $selected == true ) { $selected_out = ""; } else { $selected_out = " selected"; }
	$filters_out = "
	<div class='row mosac-row'>
		<div class='span4'>
			<form class='filter-form form-inline row' name='selec-tax' action='" .$page_perma. "' method='get'>
			<fieldset class='span1'>
			<label class='label-first' for='yearr'>Year</label>
			<select name='yearr'>
				<option value=''>All</option>
				" .$options_out. "
			</select>
			</fieldset>
	";

	unset($selected); unset($selected_out); $options_out = "";
	foreach ( $countries as $term ) {
		if ( $term->slug == $current_country ) { $options_out .= "<option value='" .$term->slug. "' selected>" .$term->name. "</option>"; $selected = true; }
		else { $options_out .= "<option value='" .$term->slug. "'>" .$term->name. "</option>"; $selected = false; }
	}
	if ( $selected == true ) { $selected_out = ""; } else { $selected_out = " selected"; }
	$filters_out .= "
			<fieldset class='span1'>
			<label for='country'>Country</label>
			<select name='country'>
				<option value=''>All</option>
				" .$options_out. "
			</select>
			</fieldset>
			<fieldset class='span1'>
			<input class='form-button' type='submit' value='Filter' />
			<a href='" .$page_perma. "'>Reset filters</a>
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
					<h1 class="sec-tit catcheye"><?php echo $page_tit ?></h1>
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
	} else {
		// if no posts in this loop
		echo "<div class='span4 boxitem-space'><strong>We have found no projects with these criteria. Try again!</strong></div>";
	} // end if have post ?>
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
		<?php include "pagination.php"; ?>
	</section>


<?php get_footer(); ?>
