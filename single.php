<?php /*
	Template Name: Single post view */?>
<?php get_header(); 
$permalink = get_permalink();
?>

<!-- Content section -->
<div id="content">
<section role="main">
	<!-- Title -->
	<h1 class="pagetitle"><?php the_title(); ?></h1>
	<div class="bottom_arrow"></div>
	<!-- end Title -->
		<!-- post-<?php the_ID(); ?> -->
		<div <?php post_class($pos); ?> id="post-<?php the_ID(); ?>" >
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="single_post">
		<article>
		<header class="entry_header">
			<div class="comment"><?php comments_popup_link(__('No Comments', 'lj'), __('1 Comment', 'lj'), __('% Comments', 'lj'), '', __('Comments Closed', 'lj') ); ?>	
			</div>
			
			<div class="date">Posted by <a href="<?php echo get_author_posts_url(get_the_author_id());?>" title="<?php the_author();?>" alt="<?php the_author();?>" class="auth_link"><?php the_author();?></a> on <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>/" ><time datetime="<?php echo get_the_date('c'); ?>" pubdate="<?php echo get_the_date('c'); ?>"><?php echo get_the_date() ; ?></time></a>
			in <?php the_category(' , ') ?>
			<?php edit_post_link('Edit this','<!-- Post Edit-->  |  <span class="edit">','</span'); ?> 
			
			</div>
				
			<div  class="small_share">
				<script type="text/javascript">
					(function() {
					var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
					s.type = 'text/javascript';
					s.async = true;
					s.src = 'http://widgets.digg.com/buttons.js';
					s1.parentNode.insertBefore(s, s1);
					})();
				</script>
				<span class="fb"><fb:like href="<?php echo $permalink;?>" send="false" layout="button_count" show_faces="false" font="segoe ui"></fb:like></span>
				<span class="tw"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="Techroid">Tweet</a></span>
				<span class="dig"><a class="DiggThisButton  DiggCompact" href="<?php echo $permalink;?>"></a></span>
				<span class="gp"><g:plusone size="medium" count="true" href="<?php echo $permalink;?>" ></g:plusone></span>
			
 			</div>
			</header>
			
			<div class="entry_content">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<div class="navigation">', 'after' => '</div>', 'next_or_number' => '', 'nextpagelink'     => __('Read More<big>&raquo;</big>'), 'previouspagelink' => __('<big>&laquo;</big>Go Back'))); ?>
			</div>
				
			<footer>
				 <?php the_tags('<div class="tags"><strong>Tagged: </strong>', ', ', '</div>'); ?> 
			</footer>
		</article>
		</div>
		<?php endwhile; else: ?>
		<?php endif; ?>		
		
		<?php comments_template(); ?>
			
		</div>
		<!-- /post-<?php the_ID(); ?> -->
</section>		
</div>
<!-- /Content section -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>