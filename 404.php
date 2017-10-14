<?php /*
	Template Name: 404
*/?>
<?php get_header(); ?>

<!-- Content section -->
<div id="content" >
<section role="main">
	<!-- Title -->
	<h1>Page Not Found</h1>
	<div class="bottom_arrow"></div>
	
	
	
	<!-- 404 -->
	<div class="content">
	<div class="single_post">
		<article >
		<div class="entry_content">
		<h3 class="title">Can't find that page</h3>
		<p >I'm sorry but it appears that you found a page that can't be found on www.lineshjose.com. It may have been moved, deleted, or you may have accidently mistyped the URL in the address bar.</p>
		
		<p>Since this isn't the page you were looking for (unless you are a fan of 404 pages then in that case, go nuts) I will see what I can do to help you find the correct page.</p>
		<p>Let me help you find what you came here for:</p>
		
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<table cellpadding="0" cellspacing="3">
				<tr>
					<th width=100>Search for it:</th>
					<td class="noborder">
						<input type="text" class="textbox searchbox" value="" name="s" id="s"  />
						<input type="hidden" id="searchsubmit" value="Search" />
						<input type="submit" id="searchsubmit" value="Go" class="button searchbutton" />
					</td>
				</tr>
			</table>
		</form>
		</div>
	</article>
	</div>
	</div>
	<!-- /404 -->
	</section>
</div>
<!-- /Content section -->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>