<?php

/*
	===============================
	 Include Scripts & Styles
	===============================
*/

function prussia_script_enqueue(){

	//CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '3.4.4', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri().'/css/prussia.css', array(), '1.0.0', 'all');

	//JS
	wp_enqueue_script( 'jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '3.4.4', true);
	wp_enqueue_script('customjs', get_template_directory_uri().'/js/prussia.js', array(), '1.0.0', true);
	/* 

		WordPress includes jQuery - Simply call jQuery
		WP prints jQuery inside the header, download your own version of jquery and slap a true statement on it to work around this.
	*/
}

add_action( 'wp_enqueue_scripts', 'prussia_script_enqueue');

/*
	===============================
	Activate Menus
	===============================
*/

function prussia_theme_setup(){
	
	add_theme_support('menus');

	register_nav_menu( 'primary', 'Primary Header Navigation' );
	register_nav_menu( 'secondary', 'Footer Navigation' );
}

add_action('init', 'prussia_theme_setup');


/*
	===================================
	Activate Theme Support Functions
	===================================
*/

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));

/*
	===================================
	Sidebar Function
	===================================
*/

	function prussia_widget_setup(){

		register_sidebar(
			array(
				'name' 	=> 'Sidebar',
				'id'   	=> 'sidebar-1',
				'class'	=> 'custom',
				'description' => 'Standard Sidebar',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'	=> '<h1 class="widget-title">',
				'after_title'	=> '</h1>',
			)
		);
	}

	add_action('widgets_init', 'prussia_widget_setup');



