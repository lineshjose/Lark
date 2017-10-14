<?php /*	Template Name:Index */?>
<?php 
	get_header();
	$i=1; 
?>

	
	
<!-- Content section -->
<div id="content">
<section role="main">
	<!-- Title -->
	<h1  class="noborder">
		<?php if (is_category()): ?><?php single_cat_title(); ?> 
		<?php elseif (is_day()): ?>Archive for "<?php the_time('F jS, Y'); ?>"
		<?php elseif (is_month()): ?>Archive for "<?php the_time('F, Y'); ?>"
		<?php elseif (is_year()): ?>Archive for "<?php the_time('Y'); ?>"
		<?php elseif (is_tag()): ?>Archive for "<?php single_tag_title(); ?> "
		<?php elseif (is_search()): ?>Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;
		<?php elseif (is_author()): 
			if(get_query_var('author_name')) :
			$curauth = get_userdatabylogin(get_query_var('author_name'));
			else :
			$curauth = get_userdata(get_query_var('author'));
			endif;
			echo $curauth->display_name; ?>'s  Archives  <?php echo get_the_author() ;?>
		<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])): ?>Blog Archives
		<?php elseif (is_home()): ?>Latest Posts
		<?php else: ?>Page not found.
		<?php endif; ?></h1>
		<div class="bottom_arrow"></div>
	<!-- end Title -->
	
	<?php if (have_posts()) {?>
		<!-- Posts lists -->
		<ul class="posts">
		<?php   while (have_posts()) : the_post();
		$title="Read about :".get_the_title();
		$post_format=get_post_format();
		?>
		<!-- post-<?php the_ID(); ?> -->
			<li  <?php post_class($pos); ?> id="post-<?php the_ID(); ?>"  ll="<?php echo get_post_format();?>">
				<article>
					<div class="comment">
					<?php comments_popup_link(__('No Comments', 'lj'), __('1 Comment', 'lj'), __('% Comments', 'lj'), '', __('Comments Closed', 'lj') ); ?>
					</div>
				
					
					<header class="entry_header">
					<?php if($post_format!='status') { ?>	
						<h2><a href="<?php the_permalink() ?>" rel="bookmark"  title="Read '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
						<?php }?>
						<div class="date">Posted by <a href="<?php echo get_author_posts_url(get_the_author_id());?>" title="<?php the_author();?>" alt="<?php the_author();?>" class="auth_link"><?php the_author();?></a> on <time datetime="<?php echo get_the_date('c'); ?>" pubdate="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(__('F jS, Y', 'lj')) ; ?></time></div>
					</header>
					
					
					<div class="entry_content">
						<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail(get_the_ID()))) {?>
						<div class="thumb">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $title ?>">
							<?php the_post_thumbnail('blog-thumbnail', array('title' => $title,'alt' => $title, 'class' => 'thumb_img'));?>
						</a>
						</div>
						<?php }?>
						<div class="excerpt">
						
						<?php 
							
							
							if($post_format=='gallery') { get_template_part( 'content', $post_format ); }
							
							else if($post_format=='video' || $post_format=='aside' || $post_format=='link' || $post_format=='quote' || $post_format=='status' || $post_format=='image') 							
							{the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lj' ));}
							
							else{the_excerpt(); }
							
						 ?>
						
						</div>
					</div>
					</article>
				<div class="clearall"></div>
			</li>
			<!-- /post-<?php the_ID(); ?> -->
			<?php endwhile; // end of one post ?>
		</ul>
		
		
		<?php if (  $wp_query->max_num_pages > 1 ) { ?>
		<!-- Pagination starts -->
		<div class="pagination">
			<?php lj_pagination();?>
			<div class="clearall"></div>
		</div>
		<!-- Pagination ends -->
		<?php } ?>
		
		
<?php }  else {?>
	<div class="single_post">
	<article id="post-0" class="posts no-results not-found" style="padding-top:10px;">
		<header class="entry_header">
			<h2 class="entry_title"><?php _e( 'Nothing Found', 'lj' ); ?></h2>
		</header><!-- .entry-header -->
		<div class="entry_content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'lj' ); ?></p>
		</div><!-- .entry-content -->
	</article>
	</div>
<?php }?>
</section>
</div>	
<!-- /Content section -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>