	<?php /*	Template Name: Sidebar	*/?>
	
	
	<!-- Sidebar -->
	<div id="sidebar">
	<section>
		
	
	<aside id=""><div class="widget">
		<?php _e('<h3>Main menu</h3>'); ?>
	<div class="side_cont">	
		<ul>
			<?php lj_get_custom_nav('MainNavigation');?>
		</ul>
	</div>
	</div></aside>
		
		
		
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if (!dynamic_sidebar("Sidebar") ) : ?>

		<aside id=""><div class="widget">
			<?php _e('<h3>Archives</h3>'); ?>
			<div class="side_cont">	
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
		</div></aside>

	<?php endif; ?>
		<aside id=""><div class="widget">
			<h3>Feeds</h3>
			<div class="side_cont">	
				<ul>		
			<li><a href="<?php bloginfo_rss( 'rss2_url' ); ?>" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS 2.0</abbr></a></li>
			<li><a href="<?php bloginfo_rss( 'atom_url' ); ?>" title="Syndicate this site using atom">Entries <abbr title="Really Simple Syndication">Atom</abbr></a></li>
			<li><a href="<?php bloginfo_rss( 'comments_rss2_url' ); ?>" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS 2.0</abbr></a></li>
				</ul>
			</div>
		</div></aside>
		
	</section>
	</div>
	<!-- Sidebar  ends-->	