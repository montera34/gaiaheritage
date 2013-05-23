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
				<p><span style="text-transform: uppercase; font-weight: bold; color: #cc344f;"><?php echo $genvars['blogname']; ?></span><br />
				<?php echo $genvars['blogdesc']; ?></p>
				<ul class="unstyled">
					<li><a href="">Disclaimer</a></li>
					<li>Developed by <a href="http://montera.com">m34</a> using <a href="http://wordpress.org">WordPress</a>.</li>
				</ul>
			</div><!-- .box/bordertop -->
		</div>
	</div><!-- #pre -->
</footer>

<?php wp_footer(); ?>

</body><!-- end body as main container -->
</html>
