<?php /** 
 * Lark content none file
 *
 * @category WordPress
 * @package  Lark
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/lark/
 *
 */
 ?>
<section class="no-results not-found">
  <header class="page-header">
    <h1 class="page-title">
      <?php esc_html_e('Nothing Found', 'lark'); ?>
    </h1>
  </header>
  <div class="page-content">
    <?php if (lark_is_home_page() && current_user_can('publish_posts') ) : ?>
    <p><?php echo esc_html__('Ready to publish your first post? ', 'lark').'<a href="'.esc_url(admin_url('post-new.php')).'">'.esc_html__('Get started here.', 'lark').'</a>'; ?></p>
    <?php elseif (is_search() ) : ?>
    <p>
      <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lark'); ?>
    </p>
    <div class="search-form-wrap">
      <?php get_search_form(); ?>
    </div>
    <?php else : ?>
    <p>
      <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lark'); ?>
    </p>
    <div class="search-form-wrap">
      <?php get_search_form(); ?>
    </div>
    <?php endif; ?>
  </div>
</section>
