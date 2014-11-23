<?php
get_header();

// document post type archive
	$page_tit = "Downloads";
	$page_perma = get_permalink();
	$loop = "table";
	$filters_out = "";

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

				<?php echo $filters_out ?>
				<div class="row mosac-row">
					<div class="span4">
					<table class="table table-hover">
						<thead class="table-head">
							<tr>
								<th>Document</th>
								<th>Project</th>
								<th>Date</th>
								<th>File Type</th>
								<th>File Size</th>
							</tr>
						<thead>
						<tbody>
	<?php // The Loop
	$count = 0;
	while ( have_posts() ) : the_post();
		$count++; //echo $count;
		include "loop.".$loop.".php";
		if ( $count == 4 ) { $count = 0; }
	endwhile; ?>
						</tbody>
					</table>
					</div><!-- .span4 -->
				</div><!-- .row -->
			</div><!-- .box -->
		</div><!-- row-->
		<?php include "pagination.php"; ?>
	</section>

<?php } else {
// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
