<?php

/* Dipendenze
---------------------------------------------------------------------------------------------- */
// Register Custom Navigation Walker
require_once('assets/bs4navwalker.php');

/*
---------------------------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) $content_width = 1400; /* larghezza massima*/

/* Setup installazione tema
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */

if(! function_exists ('ll_setup_theme') ) {

	function ll_setup_theme() {

		add_theme_support('title-tag');                /* tag title */
		add_theme_support('post-thumbnails');          /* img in ev */
		add_theme_support('automatic-feed-links');     /*  */

/* dimensioni personalizzate immagini per il tema */
		add_image_size('ll_big', 1400, 800, true);
		add_image_size('ll_quad', 600, 600, true);
		add_image_size('ll_single', 800, 500, true);


/* Inclusione menu
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */
		register_nav_menus(array(
			'header' => esc_html__('Header','ll'),
		));

		register_nav_menus(array(
			'footer' => esc_html__('Footer','ll'),
		));

	}
}

add_action('after_setup_theme','ll_setup_theme');

/* Inclusione sidebar
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */

if(! function_exists('ll_sidebars') ){

	function ll_sidebars(){

		register_sidebar(array(
			'name'          => esc_html__('Primary','ll'),
			'id'            => 'primary',
			'description'   => esc_html__('Sidebar Primaria','ll'),
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
		)
	);
	}
}

add_action( 'widgets_init', 'll_sidebars' );


/* Inclusione script file JavaScript
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */

if (! function_exists('ll_scripts') ) {

	function ll_scripts() {

		wp_enqueue_script('ll-popper-js', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), null, true);
	   wp_enqueue_script('ll-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
	   wp_enqueue_script('ll-scripts-js', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

	   if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}

add_action( 'wp_enqueue_scripts', 'll_scripts' );



/* Inclusione file CSS
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */

if(! function_exists('ll_stile') ) {

	function ll_stile() {
		wp_enqueue_style('ll-font', '//fonts.googleapis.com/css?family=Montserrat:300,400,700');
		wp_enqueue_style('ll-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('ll-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('ll-style-default-css', get_template_directory_uri() . '/style.css');
	}
}

add_action( 'wp_enqueue_scripts', 'll_stile' );



/* Commenti
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */

/* Classi per pulsante di INVIO dei form
---------------------------------------------------------------------------------------------- */

function wpdocs_comment_form_defaults( $defaults ) {
  $defaults['class_submit'] = 'btn btn-primary btn-lg';
  return $defaults;
}
add_filter( 'comment_form_defaults', 'wpdocs_comment_form_defaults' );



/* Varie
----------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------- */


/* Add class to button submit
-------------------------------------------------------- */


add_action( 'body_class', 'add_class_bg_trasp_body');

function add_class_bg_trasp_body($classes){
  if(has_post_thumbnail() && is_page()){
    array_push($classes,'navbar-transparent');
  } else if(is_front_page()){
    array_push($classes,'navbar-transparent');
  }

  return $classes;

}


/* Tassonomia personalizzata per pagine da includere nello slider della frontpage */

function llcpt_register_contenuto_per_frontpage() {

	$labels = array(
		"name" => __( "Contenuto per frontpage", "ll" ),
		"singular_name" => __( "Contenuto per frontpage", "ll" ),
	);

	$args = array(
		"label" => __( "Contenuto per frontpage", "ll" ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Contenuto per frontpage",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'contenuto_per_frontpage', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "contenuto_per_frontpage", array( "page" ), $args );
}

add_action( 'init', 'llcpt_register_contenuto_per_frontpage' );




/* Rimuovi EMOJI
---------------------------------------------------------------------------------------------- */

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );




/* Customizer
---------------------------------------------------------------------------------------------- */


function ll_customize_register( $wp_customizer ){

/* LOGO */
		$wp_customizer -> add_section( 'll_logo', array(
			'title' => __( 'logo', 'll' ),
			'description' => __( 'All the info about the logo','ll' ),
			'priority' => 20
			)
	);

/* Logo img */
		$wp_customizer -> add_setting( 'll_logo_img', array( 'default' => '' ) );
		$wp_customizer -> add_control( new WP_Customize_Image_Control( $wp_customizer, 'll_logo_img', array(
				'section' => 'll_logo',
				'label' => __( 'Logo image', 'll' ),
				'settings' => 'll_logo_img'
				)
	 		)
		);

/* Logo alt text */
		$wp_customizer -> add_setting( 'll_logo_alt_text', array( 'default' => 'Logo del sito' ));
		$wp_customizer -> add_control( 'll_logo_alt_text', array(
			'section' => 'll_logo',
			'label' => __( 'Logo alt text', 'll' ),
			'type' => 'text'
		)
	);

}

add_action( 'customize_register', 'll_customize_register' );

?>