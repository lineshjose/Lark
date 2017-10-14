<?php /*
	Template Name: Footer
*/?>

	<div class="clearall"></div>
	</div>
	<!--  /Page -->


	<!--  Footer -->
	<div id="footer">
		<ul class="lefttext">
			<?php lj_get_custom_nav('FooterNavigation',footer);?>
		</ul>
		<p>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url') ?>"><?php bloginfo('name'); ?></a> all rights reserved. </p>
		<p>Proudly powered by  <a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">WordPress</a> | Lark theme by <a href="http://linesh.com/" title="Free HTML5 and CSS3 WordPress themes" rel="generator">Linesh Jose</a></p>	
		<?php wp_footer(); ?>
	</div>
	<!--  /Footer -->

</div>
<!--  /Container -->
	
</body>
</html>