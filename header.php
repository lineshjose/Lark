<?php /*	Template Name:Header */?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">
<title>
<?php lj_title();	?>
</title>
<meta name="description" content="<?php lj_description(); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="robots" content="<?php lj_robotx();?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="Creator" content="Linesh Jose( http://linesh.com/)" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Adamina' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<!--[if (lt IE 9)|!(IE)]><!-->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="screen,projection" />
<!--<![endif]-->

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script>
<script type='text/javascript' src='http://connect.facebook.net/en_US/all.js#xfbml=1'></script>
<script type='text/javascript' src='http://platform.twitter.com/widgets.js'></script>
<?php 
if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script('comment-reply'); 
	// Dynamic wp headers 
	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<!-- Container -->
<div id="container">

<!-- Header -->
<div id="header">
  <header id="branding" role="banner">
  <div class="logo alignleft">
    <hgroup>
      <?php if( get_option('lj_logo') && get_option('lj_logo_header') == "yes" )  { ?>
      <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('lj_logo'); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
      <?php } else if(get_option('lj_logo_header') == "default"  ||  !get_option('lj_logo_header') ){ ?>
      <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo  get_stylesheet_directory_uri();?>/images/logo.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
      <?php } else if(get_option('lj_logo_header')=="no") { ?>
      <div class="title" ><a href="<?php bloginfo('url'); ?>/" >
        <?php bloginfo('name'); ?>
        </a></div>
      <?php } ?>
      <div class="slogan">
        <?php bloginfo('description'); ?>
      </div>
    </hgroup>
  </div>
  <div class="connection alignright">
    <ul>
      <li><a href="http://facebook.com/<?php echo get_option('lj_facebook');?>" class="facebook" title="Facebook" target="_blank"> <img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="facebook"  alt="Facebook" title="Facebook"/> </a></li>
      <li><a href="http://twitter.com/<?php echo get_option('lj_twitter');?>"  class="twitter" title="Twitter"  target="_blank"> <img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="twitter"  alt="Twitter" title="Twitter"/> </a></li>
      <li><a href="http://plus.google.com/<?php echo get_option('lj_google_plus');?>"  class="google_plus"title="Google Plus" target="_blank"> <img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="google_plus"  alt="google plus" title="Google Plus"/></a></li>
      <li><a href="<?php bloginfo_rss( 'rss2_url' ); ?>"  class="rss" title="Syndicate this site using RSS 2.0" target="_blank"> <img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="rss"  alt="RSS Subscribe" title="RSS Subscribe"/></a></li>
    </ul>
  </div>
  <div class="clearall"></div>
  <header>
</div>
<!-- end header --> 

<!-- Main Page -->
<div id="page">

<!--  Search box-->
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <table cellspacing="0"  cellpadding="0" class="search" width="50%" align="center">
    <tr>
      <td><?php _e('<strong>Lost Something?</strong>'); ?></td>
      <td><input type="search" class="textbox searchbox"  name="s" id="s" placeholder="Search" required />
        <input type="hidden" id="searchsubmit" value="Search" /></td>
      <td><input type="submit" id="" value="Search"  class="red-button"/></td>
    </tr>
  </table>
</form>
<!--  Search box--> 