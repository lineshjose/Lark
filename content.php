<?php /**
 * Lark content loop file
 *
 * @category WordPress
 * @package  Lark
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/lark/
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
  <?php 
if(is_single() || is_page() ){
  if( is_page_template('page-full-width.php')) { lark_post_thumbnail('lark-post-wide'); }

  else { lark_post_thumbnail('lark-post-single'); }

}else{lark_post_thumbnail('lark-post-big');}
?>
  <div class="entry-wrap <?php if(has_post_thumbnail()) echo 'img';?>">
    <header class="entry-header">
      <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
    </header>
    <div class="entry-meta <?php if(get_post_type()=='page') { echo 'says';}?>">
      <?php lark_entry_meta(); ?>
      <div class="clear"></div>
    </div>
    <?php 
    if( !is_page() && !is_single() && get_post_type()!='forum' && in_array( get_post_format(), array('aside','standard',''))){ ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
      <div class="clear"></div>
    </div>
    <?php }else {?>
    <div class="entry-content">
      <?php
    		  /* translators: %s: Name of current post */
            the_content( sprintf(__( 'Continue Reading %s', 'lark' ),the_title( '<span class="screen-reader-text">', '</span>', false )) );
            wp_link_pages( array(
                            'before'      => '<div class="pagination"><div class="page-links nav-links"><span class="page-links-title">' . __( 'Pages:', 'lark' ) . '</span>',
                            'after'       => '<div class="clear"></div></div></div>',
                            'link_before' => '<span class="page-numbers">',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'lark' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
               ) );
           ?>
      <div class="clear"></div>
    </div>
    <?php } ?>
  </div>
  <?php if( is_single()) {  ?>
  <?php    if ( is_singular( 'attachment' ) ) {
              // Parent post navigation.
              the_post_navigation( array('prev_text' =>'<span class="meta-nav">'.__( 'Published in',  'lark' ).'</span><span class="post-title">%title</span>'));

            } elseif ( is_singular( 'post' ) ) {
              // Previous/next post navigation.
              the_post_navigation( array(
    		  	'in_same_term'               => false,
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'lark' ) . '</span> ' .
                  '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'lark' ) . '</span> ' .
                  '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'lark' ) . '</span> ' .
                  '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'lark' ) . '</span> ' .
                  '<span class="post-title">%title</span>',
              ) );
            }
      ?>
  <div class="clear"></div>
  <div class="author-info vcard author-<?php echo esc_attr(get_the_author_meta( 'ID' ));?>">
    <div class="author-avatar"> <?php echo get_avatar(get_the_author_meta('user_email'), apply_filters( 'lark_author_bio_avatar_size', 70 ) );?> </div>
    <div class="author-description">
      <h3 class="author-title"> <strong><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' )));?>" title="<?php echo esc_attr( 'Posts by', 'lark' );?> <?php  echo esc_attr( get_the_author_meta('display_name'));?>" rel="author" class="author url fn">
        <?php  echo esc_html(get_the_author_meta('display_name'));?>
        </a></strong></h3>
      <?php if($desc=get_the_author_meta('description')) {
        echo '<div class="author-bio">'.esc_html($desc).'</div>';
        } ?>
      <?php lark_author_metas(get_the_author_meta('ID')); ?>
    </div>
    <div class="clear"></div>
  </div>
  <?php } ?>
  <div class="clear"> </div>
</article>