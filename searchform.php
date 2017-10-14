<?php /**
 * Lark search form file
 *
 * @category WordPress
 * @package  Lark
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/lark/
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <label class=""><?php echo esc_html_x('Lost Something?', 'label', 'lark'); ?></label>
  <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;',  'placeholder', 'lark'); ?>" value="<?php echo get_search_query();?>" name="s" title="<?php echo esc_attr('Search', 'lark'); ?>" required>
  <button type="submit" class="search-submit"> <span ><?php echo esc_html_x('Search', 'submit button', 'lark'); ?></span> </button>
</form>