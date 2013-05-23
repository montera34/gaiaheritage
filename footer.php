<?php
// main page vars
global $genvars;
$genvars = array(
	'blogname' => get_bloginfo('name'), // title
	'blogdesc' => get_bloginfo( 'description', 'display' ), // description
	'blogurl' => get_bloginfo('url'), // home url
	'blogtheme' => get_bloginfo('template_directory'), // theme url
);
?>
	</div><!-- .container -->
</section>

<footer>
	<div id="epi" class="container">
		<div class="row">
			<div class="span4 box-bordertop">
				<?php echo $genvars['blogname']; ?><br />
				<?php echo $genvars['blogdesc']; ?><br />
			</div><!-- .box/bordertop -->
		</div>
	</div><!-- #pre -->
</footer>

<?php wp_footer(); ?>

</body><!-- end body as main container -->
</html>
