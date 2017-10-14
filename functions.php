<?php
/**
 * Main Functions file
 *
 * @category WordPress
 * @package  Lark
 * @author   Linesh Jose <lineshjos@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://linesh.com/projects/lark/
 *
 */

// lark- setup --------------->
add_action( 'after_setup_theme', 'lark_setup' );
function lark_setup() 
{
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 900;

	load_theme_textdomain( 'lark', get_template_directory() . '/languages' );

	add_theme_support('automatic-feed-links' );
	add_theme_support('title-tag' );
	add_theme_support('post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );
	
	add_theme_support('html5', array('comment-form', 'comment-list', 'gallery', 'caption'	) );
	add_theme_support('customize-selective-refresh-widgets' );
	add_theme_support('post-thumbnails' );
		set_post_thumbnail_size( 150, 150,true ); 
		add_image_size('lark-post-medium', 400, 250, true );
		add_image_size('lark-post-big', 850,300, true );
		add_image_size('lark-post-single', 800,0, false );
		add_image_size('lark-post-wide', 1200,500, true );

	add_theme_support( 'custom-logo', array());
	add_theme_support( "custom-header", array(
		'width'        => 1600,
		'default-image'  => '',
		'height'        => 600,
		'header-text' => true,
		'video'              => true,
		'video-active-callback' => '',
		'default-text-color' => '#FFFFFF',
	));
	add_theme_support( "custom-background",  array(
		'default-color' => '#FFFFFF',
	) );

	register_nav_menus( array(
		'social'  => __( 'Social Menu','lark' ),
		'footer'  => __( 'Footer Menu','lark' ),
	) );
}// lark_setup

// lark sidebarsetup --------------->
function lark_sidebars(){
	$sidebars=array(
			array(
			'name'          => __( 'Lark Widget Area', 'lark' ),
			'id'            => 'lark_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'lark' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) 	
	);
	return $sidebars;
}
add_action( 'widgets_init', 'lark_widgets_init' );
function  lark_widgets_init() {
	foreach(lark_sidebars() as $sidebar){
		register_sidebar($sidebar);
	}
}


// Customizer settings ----------->
function lark_customize_partial_blogname() {bloginfo( 'name' );}
function lark_customize_partial_blogdescription() {bloginfo( 'description' );}
add_action( 'customize_register', 'lark_customize_register', 11 );
function lark_customize_register( $wp_customize ) 
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname', array(
            'selector' => '.site-title a',
            'container_inclusive' => false,
            'render_callback' => 'lark_customize_partial_blogname',
            ) 
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription', array(
            'selector' => '.site-description',
            'container_inclusive' => false,
            'render_callback' => 'lark_customize_partial_blogdescription',
            ) 
        );
    }

	// Lark settings ---------------->
	$colors_array =array(
			'header_background_color'=>array(
					'title'=>__('Header Background Color', 'lark' ),
					'default'           => '#222',
			),
			'footer_bg_color'=>array(
					'title'=>__('Footer Background Color', 'lark' ),
					'default'  => '#E0E0E0',
			),
			'wt_bg_color'=>array(
					'title'=>__('Widget Title Background Color', 'lark' ),
					'default'  => '#0270A0',
			),
			'bt_bg_color'=>array(
					'title'=>__('Button Background color', 'lark' ),
					'default'  => '#555555',
			),
			'wt_color'=>array(
					'title'=>__('Widget Title Color', 'lark' ),
					'default'  => '#FFFFFF',
			),
			'footer_color'=>array(
					'title'=>__('Footer Text Color', 'lark' ),
					'default'  => '#0270A0',
			),
			/*'bt_color'=>array(
					'title'=>__('Button Text Color', 'lark' ),
					'default'  => '#FFFFFF',
			),*/
			'link_color'=>array(
					'title'=>__('Link color', 'lark' ),
					'default'  => '#0270A0',
			),
		);

	foreach($colors_array as $index=>$color){
		$wp_customize->add_setting( $index, array(
			'default'           => $color['default'],
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $index, array(
			'label'       => __('Lark', 'lark' ) .' - '.$color['title'],
			'section'     => 'colors',
		)));
	}

	//  Fotter text ----------------------->
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	));
	$wp_customize->add_control('footer_text', array(
		'label'       => __('Lark - Footer Text ', 'lark' ),
		'section'     => 'title_tagline',
		'type' => 'textarea',
	));

}

// Adding scripts and CSS --------------->
	add_action( 'wp_enqueue_scripts', 'lark_scripts' );
	function lark_scripts() {
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), null,'all');
		wp_enqueue_style( 'lark-style', get_stylesheet_uri(), array() ,null,'all');
		wp_enqueue_style( 'lark-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), null,'all');
		
		// Inline css ---------------->
		$custom_css ='';
		if (!display_header_text() ) {
		 $custom_css .= '.site-branding, .site-branding .site-title, .site-description {
				 clip: rect(1px, 1px, 1px, 1px)!important;
				 position: absolute!important;
				 margin:0px !important;
			}';
		}
		$image=(array)get_custom_header();
		$custom_css .= '#masthead{';
			if($image['url']){
				$custom_css .= 'background-image:url(\''.esc_url($image['url']).'\') !important;
					background-size:cover;
					background-repeat: no-repeat;
					';
			}	
			$custom_css .= 'background-color:'.esc_attr(get_theme_mod('header_background_color')).'
			}
			#masthead, #masthead a,#masthead .site-header-menu ul li a {
			 	color: #'.esc_attr(get_header_textcolor()).';
			}
			#secondary.sidebar .widget .widget-title { 
				color:'.esc_attr(get_theme_mod('wt_color')).' ;
			}';
			
			if($wt_bg_color=get_theme_mod('wt_bg_color')){
			$custom_css .= '#secondary.sidebar .widget .widget-title { 
					background:'.esc_attr($wt_bg_color).';
				}
				#secondary.sidebar .widget { 
					border-bottom-color:'.esc_attr($wt_bg_color).';
				}';	
				
			}
			$custom_css .= 'button, .button, input[type="submit"],input[type="reset"] {
				background-color:'.esc_attr(get_theme_mod('bt_bg_color')).'; 
				color:'.esc_attr(get_theme_mod('bt_color')).';
			}
			#content a{ 
				color:'.esc_attr(get_theme_mod('link_color')).';
			}
			#colophon{
				background-color:'.esc_attr(get_theme_mod('footer_bg_color')).'; 
			}
			#colophon,
			#colophon a{
				color:'.esc_attr(get_theme_mod('footer_color')).'; 
			}
		';

        wp_add_inline_style( 'lark-style', $custom_css );

		
        // Scripts ---------------->
		if ( is_singular() ) { wp_enqueue_script( "comment-reply" ); }
		wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/assets/js/html5.js', array( 'jquery' ), NULL, false );
    	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'lark-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), NULL, false );

	}

	add_action( 'customize_preview_init', 'lark_customize_preview_js' );
	function lark_customize_preview_js() {
		wp_enqueue_script( 'lark-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), NULL, true );
	}
require (get_template_directory() . '/inc/main-funtions.php');
?>