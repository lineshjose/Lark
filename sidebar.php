<?php /**
 * Lark sidebar file
 *
 * @category WordPress
 * @package  Lark
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/lark/
 *
 */ 
 if(lark_active_sidebars()){ ?>
<aside id="secondary" class="sidebar alignright widget-area" role="complementary">
  <?php foreach(lark_sidebars() as $sidebar){
			dynamic_sidebar( $sidebar['id']);
		}?>
</aside>
<?php }; ?>