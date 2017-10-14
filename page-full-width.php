<?php /** 
 * Lark single page file
 *
 * @category WordPress
 * @package  Lark
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/lark/
 *
 */
/* Template Name: Full Width */
get_header(); 
?>
<main id="main" class="site-main  single-page full-width " role="main">
  <?php 
  while ( have_posts() ) : the_post(); 
    get_template_part( 'content');	
  endwhile; 
  ?>
</main>
<?php get_footer(); ?>