<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body id="site-body" <?php body_class(); ?>>
<div id="page" class="site">
<div class="screen-reader-text"> <a class="skip-link" href="#content">
  <?php esc_html_e( 'Skip to content', 'lark' ); ?>
  </a> </div>
<header id="masthead" class="site-header" role="banner">
  <?php the_custom_header_markup();?>
  <div class="wrapper">
    <?php lark_the_custom_logo();  ?>
    <nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Link', 'lark' ); ?>">
      <?php if (has_nav_menu('social')) {
				wp_nav_menu(array( 
					'theme_location' => 'social', 
					'container' => false, 
					'menu_id' => 'social-menu', 
					'menu_name' => 'social_menu', 
					'menu_class' => 'social-menu', 
					'link_before' => '<span class="screen-reader-text">', 
					'link_after' => '</span>',
					'depth'=>1
				));
			}
			?>
      <div class="clear"></div>
    </nav>
    <div class="clear"></div>
  </div>
</header>
<div id="content" class="site-content wrapper">
<div class="search-form">
<?php get_search_form();?>
<div class="clear"></div>
</div>
