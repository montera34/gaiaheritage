<?php
get_header();
?>

<?php
if ( have_posts() ) { 
while ( have_posts() ) : the_post();


$page_tit = get_the_title();
// pages menu 
$args = array(
	'post_type' => 'page',
	'sort_order' => 'ASC',
	'sort_column' => 'menu_order',
	'post_parent' => $post->ID,
	'posts_per_page' => -1
);
$children = get_posts($args);
//print_r($children);
// if this page is parent and has children
if ( $post->post_parent == '0' && count($children) >> 0 ) { 
	$page_menu_out = "<header class='page-menu-item'><h1>" .$page_tit. "</h1></header>";
	$menu_children_out = "";
	foreach ( $children as $child ) {
		$child_tit = $child->post_title;
		$child_slug = $child->post_slug;
		$child_perma = get_permalink($child->ID);
		$page_menu_out .= "<div class='page-menu-item'><a href='" .$child_perma. "' title='" .$child_tit. "'>" .$child_tit. "</a></div>";
	}

// if this page is child
} elseif ( $post->post_parent != '0' ) {
	$parent_id = $post->post_parent;
	$parent_tit = get_the_title($parent_id);
	$parent_perma = get_permalink($parent_id);
	$page_menu_out = "<div class='page-menu-item'><a href='" .$parent_perma. "' title='" .$parent_tit. "'>" .$parent_tit. "</a></div>";
	$args = array(
		'post_type' => 'page',
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'post_parent' => $post->post_parent,
		'posts_per_page' => -1
	);
	$children = get_posts($args);
	foreach ( $children as $child ) {
		$child_tit = $child->post_title;
		$child_slug = $child->post_slug;
		$child_perma = get_permalink($child->ID);
		if ( $child->ID == $post->ID ) {
			$page_menu_out .= "<header class='page-menu-item'><h1>" .$page_tit. "</h1></header>";
		} else {
			$page_menu_out .= "<div class='page-menu-item'><a href='" .$child_perma. "' title='" .$child_tit. "'>" .$child_tit. "</a></div>";
		}
	}

} else {
	$page_menu_out = "<header class='page-menu-item'><h1>" .$page_tit. "</h1></header>";

} // end if this page has children
?>

	<div class="row sec-space">
		<section class="span3">
			<div class="row">
				<div class="span4 page-menu"><?php echo $page_menu_out ?></div>
			</div>
			<article class="row">
				<div class="span3 box">
				<div class="boxitem-bigspace">
					<?php the_content(); ?>
				</div><!-- .boxitem-space -->
				</div><!-- .box -->
			</article><!-- row-->

		</section>

		<section class="span1">

<?php // links query
$links = get_bookmarks();
if ( $links[0] != '' ) {
	echo "
		<div class='row'>
			<div class='span1'>
				<header><h2 class='sec-tit'>Links</h2></header>
				<div class='box'>
	";
	$which_loop = "links";
	$list_count = 0;
	foreach ( $links as $link ) {
		$list_count++;
		include "loop.list.php";
	}
	echo "
				</div><!-- .box -->
			</div><!-- .span1 -->
		</div><!-- .row -->
	";
}
?>
		</section>
	</div>
<?php endwhile;
} else {

// if no posts in this loop

} // end if have post ?>

<?php get_footer(); ?>
