<?php



//Style Script
function theme_scripts() {
wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
wp_register_style('carousel', get_template_directory_uri().'/css/owl.carousel.min.css');
wp_register_style('theme-default', get_template_directory_uri().'/css/owl.theme.default.min.css');
wp_register_style('animate', get_template_directory_uri().'/css/animate.min.css');
wp_register_style('magnific', get_template_directory_uri().'/css/magnific-popup.css');
wp_register_style('awesome', get_template_directory_uri().'/css/font-awesome.min.css');
wp_register_style('meanmenu', get_template_directory_uri().'/css/meanmenu.css');
wp_register_style('slicknav', get_template_directory_uri().'/css/slicknav.min.css');
wp_register_style('slick', get_template_directory_uri().'/css/slick.css');
wp_register_style('defaults', get_template_directory_uri().'/css/default.css');
wp_register_style('style', get_template_directory_uri().'/css/style.css', array(), '3.3');
wp_register_style('responsive', get_template_directory_uri().'/css/responsive.css');
wp_register_style('slideWiz', get_template_directory_uri().'/css/slideWiz.css');
wp_register_style('style10', get_template_directory_uri().'/css/style10.css');
wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );
	
wp_enqueue_style('bootstrap');
wp_enqueue_style('carousel');
wp_enqueue_style('animate');
wp_enqueue_style('magnific');
wp_enqueue_style('awesome');
wp_enqueue_style('meanmenu');
wp_enqueue_style('slicknav');
wp_enqueue_style('slick');
wp_enqueue_style('defaults');
wp_enqueue_style('style');
wp_enqueue_style('responsive');
wp_enqueue_style('slideWiz');
wp_enqueue_style('style10');

//jQuery Script
wp_register_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr-3.5.0.min.js', array('jquery'), '3.5.0', true );
//wp_register_script('jquery-1', get_template_directory_uri().'/js/vendor/jquery-1.12.4.min.js', array('jquery') );
wp_register_script('popper', get_template_directory_uri().'/js/popper.min.js', array('jquery'),'3.5.0', true );
wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),'3.5.0', true );
wp_register_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array('jquery'),'2.2.1', true );
wp_register_script('isotope', get_template_directory_uri().'/js/isotope.pkgd.min.js', array('jquery'),'3.5.0', true );
wp_register_script('nav', get_template_directory_uri().'/js/one-page-nav-min.js', array('jquery'),'3.5.0', true );
wp_register_script('slick', get_template_directory_uri().'/js/slick.min.js', array('jquery'),'3.5.0', true );
wp_register_script('slicknav', get_template_directory_uri().'/js/jquery.meanmenu.min.js', array('jquery'),'1.0.10', true);
wp_register_script('slicknav', get_template_directory_uri().'/js/slicknav.min.js', array('jquery'),'1.0.10', true);
wp_register_script('ajax', get_template_directory_uri().'/js/ajax-form.js', array('jquery'),'3.5.0', true );
wp_register_script('wow', get_template_directory_uri().'/js/wow.min.js', array('jquery'),'3.5.0', true );
wp_register_script('scrollUp', get_template_directory_uri().'/js/jquery.scrollUp.min.js', array('jquery'),'3.5.0', true  );
wp_register_script('imagesloaded', get_template_directory_uri().'/js/imagesloaded.pkgd.min.js', array('jquery'),'3.5.0', true );
wp_register_script('magnific', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array('jquery'),'3.5.0', true );
wp_register_script('skill', get_template_directory_uri().'/js/skill.bars.jquery.js', array('jquery'),'3.5.0', true );
wp_register_script('masonry', get_template_directory_uri().'/js/masonry.pkgd.min.js', array('jquery'),'3.5.0', true );
wp_register_script('counterup', get_template_directory_uri().'/js/jquery.counterup.min.js', array('jquery'),'3.5.0', true );
wp_register_script('waypoints', get_template_directory_uri().'/js/waypoints.min.js', array('jquery'),'3.5.0', true );
wp_register_script('plugins', get_template_directory_uri().'/js/plugins.js', array('jquery'),'3.5.0', true );

wp_register_script('slideShow', get_template_directory_uri().'/js/slideshow/slideShow.js', array('jquery'),'3.5.0', false );
wp_register_script('slideWiz', get_template_directory_uri().'/js/slideshow/slideWiz.js', array('jquery'),'3.5.0', false );
    
wp_register_script('main', get_template_directory_uri().'/js/main.js', array('jquery'),'3.5.0', true );
    
    
wp_enqueue_script('jquery');
wp_enqueue_script('modernizr');
wp_enqueue_script('jquery-1');
wp_enqueue_script('popper');
wp_enqueue_script('bootstrap');
wp_enqueue_script('owl-carousel');
wp_enqueue_script('isotope');
wp_enqueue_script('nav');
wp_enqueue_script('slick');
wp_enqueue_script('meanmenu');
wp_enqueue_script('slicknav');
wp_enqueue_script('ajax');
wp_enqueue_script('wow');
wp_enqueue_script('scrollUp');
wp_enqueue_script('imagesloaded');
wp_enqueue_script('magnific');
wp_enqueue_script('skill');
wp_enqueue_script('masonry');
wp_enqueue_script('counterup');
wp_enqueue_script('waypoints');
wp_enqueue_script('plugins');

wp_enqueue_script('slideShow');
wp_enqueue_script('slideWiz');
wp_enqueue_script('main');
    
}
add_action('wp_enqueue_scripts', 'theme_scripts');