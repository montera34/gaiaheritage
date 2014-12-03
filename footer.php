</div><!-- .container -->

<?php if ( is_page_template('page-building.php') ) {} else { ?>
<footer>
	<div id="epi" class="container">
		<div class="row">
			<div class="span4 box-bordertop">
				<p><span style="text-transform: uppercase; font-weight: bold; color: #cc344f;"><?php echo GAIA_BLOGNAME; ?></span><br />
				<?php echo GAIA_BLOGDESC; ?></p>
				<ul class="unstyled">
					<li><a href="/disclaimer">Disclaimer</a></li>
					<li>Developed by <a href="http://montera34.com">m34</a> using <a href="/software-design-credits">free software</a>.</li>
				</ul>
			</div><!-- .box/bordertop -->
		</div>
	</div><!-- #pre -->
</footer>
<?php } ?>

<?php wp_footer(); ?>

</body><!-- end body as main container -->
</html>
