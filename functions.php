<?php


	if ( function_exists( 'the_privacy_policy_link' ) ) {
	   the_privacy_policy_link( '<div>', '</div>' );
	}
	// Option Panel Include
	require_once('lib/redux-framework/ReduxCore/framework.php');
	require_once('lib/redux-framework/sample/config.php');
	require_once('lib/redux-vendor-support-master/redux-vendor-support.php');

	// Hobi
	//require_once('lib/functions/shortcode.php');
	require_once('lib/functions/theme-script.php');
	require_once('lib/functions/sidebar-file.php');
	require_once('lib/functions/custom-post.php');


	require_once('lib/plugins/class-tgm-plugin-activation.php');
	require_once('lib/plugins/require_plugin.php');

	require_once('learndash/iprofile.php');
	require_once('learndash/icourse.php');





	function hobi_default_support(){
		// Widgets shortcode Support code
		add_filter('widget_text', 'do_shortcode');

		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('slider');
		add_theme_support('woocommerce');
		add_theme_support('custom-background');
		add_image_size( 'post-thumb_long', 670, 480, true );
		add_image_size( 'slider-thumb', 920, 285, true );
	}
	add_action('after_setup_theme', 'hobi_default_support');

	function hobi_custom_function(){
	    load_theme_textdomain('hobi', get_template_directory_uri().'/languages');
	    };
	add_action('after_setup_theme', 'hobi_custom_function');

	//Menu  
	add_action('after_setup_theme', 'wpj_register_menu');
	function wpj_register_menu() {
		if (function_exists('register_nav_menu')) {
			register_nav_menu( 'mainmenu', __( 'Main Menu', 'hobi' ));
		}
	}
	function wpj_default_menu() {
		echo '<ul class="nav pull-right">';
		if ('page' != get_option('show_on_front')) {
			echo '<li><a href="'. home_url() . '/">Home</a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}

// Product Page Design

//Remove WooCommerce Default Functions Shop Page
function woo_shop_page_design(){
    
    /* Remove Categories from Single Products */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    //remove default breadcrumb
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10, 0 );

    //remove default breadcrumb
    remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10, 0 );


    //remove default catalog ordering
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
    
    //remove default result count
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	
    //remove default pagination
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
	
}
add_action('init', 'woo_shop_page_design');
//End Remove WooCommerce Default Functions

//Product Per Row
if (!function_exists('loop_columns_3')) {
	function loop_columns_3() {
		return 3; // 3 products per row
	}
}
add_filter( 'loop_shop_columns' , 'loop_columns_3' );
//End Product Per Row

// Change woocommerce defaults breadcrumb
function hobi_theme_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<div class="breadcrumb-inner">
          <ul class="list-inline list-unstyled">',
            'wrap_after'  => '</ul>
        </div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
add_filter( 'woocommerce_breadcrumb_defaults', 'hobi_theme_woocommerce_breadcrumbs' );
// End woocommerce defaults breadcrumb

//Woocommerce pagination
function woocommece_hobi_pagination() {
global $wp_query;
$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
		'prev_next'          => true,
		'prev_text'          => __('<i class="fa fa-angle-left"></i>'),
		'next_text'          => __('<i class="fa fa-angle-right"></i>'),

    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
        }
}
add_action('init', 'woocommece_hobi_pagination'); 
//End Woocommerce pagination


//custom_woocommerce_template_loop_add_to_cart
function custom_woocommerce_product_add_to_cart_text() {
	global $product;
	
	$product_type = $product->product_type;
	
	switch ( $product_type ) {
		case 'external':
			return __( 'Buy product', 'woocommerce' );
		break;
		case 'grouped':
			return __( 'View products', 'woocommerce' );
		break;
		case 'simple':
			return __( 'Add cart', 'woocommerce' );
		break;
		case 'variable':
			return __( 'Select options', 'woocommerce' );
		break;
		default:
			return __( 'Read more', 'woocommerce' );
	}
}
add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );

// WooCommerce shop page show per page drop down
function hobi_woocommerce_catalog_page_ordering() {
 ?>

 <div class="lbl-cnt">
 <?php echo '<span class="lbl">Show</span>' ?>
 <form action="" method="POST" name="results" class="fld inline">
 <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
 <?php

// //Get products on page reload
if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
$numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
} else {
$numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
}
//  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.
$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
//Add as many of these as you like, -1 shows all products per page
//  ''       => __('Results per page', 'woocommerce'),
'12' 		=> __('12', 'storefront'),
'20' 		=> __('20', 'storefront'),
'30' 		=> __('30', 'storefront'),
'40' 		=> __('40', 'storefront'),
'50' 		=> __('50', 'storefront'),
'-1' 		=> __('All', 'storefront'),
));
foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
?>
 </select>
 </form>
 </div>
 <?php
 }


// // WooCommerce custom catalog ordering 
add_filter( 'woocommerce_catalog_orderby', 'flipmart_custom_woocommerce_catalog_orderby' );
function flipmart_custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order'] = 'Position';
	$sortby['price'] = 'Price:Lowest first';
	$sortby['price-desc'] = 'Price:HIghest first';
	unset($sortby['popularity']);
	unset($sortby['date']);
	unset($sortby['rating']);
	
	return $sortby;
}

// style-hobi.css
function hobi_style_colling(){
	wp_register_style('style-hobi', get_template_directory_uri().'style-hobi.css');


	wp_register_script('main', get_template_directory_uri().'/js/main.js', array('jquery'),' ', true );

	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'hobi_style_colling');


// Portfolio Metabox

add_action('add_meta_boxes', 'wpbeuty_meta_box_adding');

function wpbeuty_meta_box_adding(){
	add_meta_box(
		'wp_beuty_unique',
		'Portfolio Live Link',
		'beuty_fortfolio_callback',
		'portfolio',
		'normal',
		'high'
	);
}

function beuty_fortfolio_callback( $post ){
	global $post; ?>

	<p> 
		<label for="wp_beu">Portfolio Link</label>
		<input type="text" id="wp_beu" class="regular-text" name="wp_beuty" value="<?php echo get_post_meta( $post->ID, '_portolio_link', true ) ?>">
	</p>


	<?php
}


// Save Post Meta Database
add_action('save_post', 'data_save_meta_box'); 
function data_save_meta_box($post_id){
	global $post; 

	if(isset($_POST['wp_beuty'])){
		update_post_meta($post_id, '_portolio_link', $_POST['wp_beuty']);
	}
	
}

// Portfolio Metabox

// Slider Metabox
add_action('add_meta_boxes', 'slider_meta_box_adding');

function slider_meta_box_adding(){
	add_meta_box(
		'slider_wp_unique',
		'Slider Live Link',
		'slider_fortfolio_callback',
		'slider',
		'normal',
		'high'
	);
}

function slider_fortfolio_callback( $post ){
	global $post; ?>

	<p> 
		<label for="wp_beu">Slider Solution</label>
		<input type="text" id="wp_beu" class="regular-text" name="slider_sub" value="<?php echo get_post_meta( $post->ID, 'slider_span', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Learn More Button</label>
		<input type="text" id="wp_beu" class="regular-text" name="slider_learn" value="<?php echo get_post_meta( $post->ID, '_learn_text', true ) ?>">
	</p>	
	<p> 
		<label for="wp_beu">Play Button Text</label>
		<input type="text" id="wp_beu" class="regular-text" name="ytub_play" value="<?php echo get_post_meta($post->ID, '_play_tube', true); ?>">
	</p>
	<p> 
		<label for="wp_beu">Play Button Link</label>
		<input type="text" id="wp_beu" class="regular-text" name="ytub_link" value="<?php echo get_post_meta($post->ID, '_tube_link', true); ?>">
	</p>

	<?php
}

// Save Post Meta Database
add_action('save_post', 'slider_data_save_meta_box'); 
function slider_data_save_meta_box($post_id){
	global $post; 

	if(isset($_POST['slider_sub'])){
		update_post_meta($post_id, '_slider_span', $_POST['slider_sub']);
	}
	if(isset($_POST['slider_learn'])){
		update_post_meta($post_id, '_learn_text', $_POST['slider_learn']);
	}

	if(isset($_POST['ytub_play'])){
		update_post_meta($post_id, '_play_tube', $_POST['ytub_play']);
	}

	if(isset($_POST['ytub_link'])){
		update_post_meta($post_id, '_tube_link', $_POST['ytub_link']);
	}


}
// Slider Metabox




// About Metabox
add_action('add_meta_boxes', 'about_metabox');
function about_metabox(){
	add_meta_box(
		'about_wp_unique',
		'About Post Additonal',
		'about_falback',
		'about',
		'normal',
		'high'
	);
}
function about_falback( $post ){
	global $post; ?>
	<p> 
		<label for="wp_beu">About Sub Text</label>
		<input type="text" id="wp_beu" class="regular-text" name="about_subtext" value="<?php echo get_post_meta( $post-> ID, '_about_span', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">About Button Left</label>
		<input type="text" id="wp_beu" class="regular-text" name="slider_sub" value="<?php echo get_post_meta( $post-> ID, '_download_cv', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">About Button Left Link</label>
		<input type="text" id="wp_beu" class="regular-text" name="cv_d_link" value="<?php echo get_post_meta( $post-> ID, '_cv_d_link', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">About Button Right</label>
		<input type="text" id="wp_beu" class="regular-text" name="design_process" value="<?php echo get_post_meta( $post-> ID, '_design_process', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">About Button Right Link</label>
		<input type="text" id="wp_beu" class="regular-text" name="design_pro_link" value="<?php echo get_post_meta( $post-> ID, '_design_pro_link', true ) ?>">
	</p>

	<?php
}
// Save Post Meta Database
add_action('save_post', 'about_save_post'); 
function about_save_post($post_id){
	global $post;

	if(isset($_POST['about_subtext'])){
		update_post_meta($post_id, '_about_span', $_POST['about_subtext']);
	}
	if(isset($_POST['slider_sub'])){
		update_post_meta($post_id, '_download_cv', $_POST['slider_sub']);
	}
	if(isset($_POST['cv_d_link'])){
		update_post_meta($post_id, '_cv_d_link', $_POST['cv_d_link']);
	}
	if(isset($_POST['design_process'])){
		update_post_meta($post_id, '_design_process', $_POST['design_process']);
	}
	if(isset($_POST['design_pro_link'])){
		update_post_meta($post_id, '_design_pro_link', $_POST['design_pro_link']);
	}

}
// About Metabox


/*// Start Services Add Metabox
add_action('add_meta_boxes', 'about_metabox');
function about_metabox(){
	add_meta_box(
		'about_wp_unique',
		'About Post Additonal',
		'about_falback',
		'about',
		'normal',
		'high'
	);
}

// Add Custom Field html
function about_falback( $post ){
	global $post; ?>
	<p> 
		<label for="wp_beu">About Sub Text</label>
		<input type="text" id="wp_beu" class="regular-text" name="about_subtext" value="<?php echo get_post_meta( $post-> ID, 'about_span', true ) ?>">
	</p>

	<?php
}
// Save Services Post Meta Database
add_action('save_post', 'about_save_post'); 
function about_save_post($post_id){
	global $post; 
	update_post_meta($post_id, 'about_span', $_POST['about_subtext']);
}
// End Service Metabox
*/

// Start Services Add Metabox
add_action('add_meta_boxes', 'service_metabox');
function service_metabox(){
	add_meta_box(
		'services_wp_unique',
		'Services Post Additonal',
		'service_fallback',
		'service',
		'normal',
		'high'
	);
}

// Add Custom Field html
function service_fallback( $post ){
	global $post; ?>
	<p> 
		<label for="wp_beu">Font-Awesome Icon Name</label>
		<input type="text" id="wp_beu" class="" name="sf_icon" value="<?php echo get_post_meta( $post-> ID, 'service_icon', true ) ?>">
		<label for="wp_beu">Service Text</label>
		<input type="text" id="wp_beu" class="" name="st_icon" value="<?php echo get_post_meta( $post-> ID, 'service_text', true ) ?>">
		<label for="wp_beu">Service Link</label>
		<input type="text" id="wp_beu" class="" name="sl_icon" value="<?php echo get_post_meta( $post-> ID, 'service_link', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Font-Awesome Icon Name</label>
		<input type="text" id="wp_beu" class="" name="sf_icon1" value="<?php echo get_post_meta( $post-> ID, 'service_icon1', true ) ?>">
		<label for="wp_beu">Service Text</label>
		<input type="text" id="wp_beu" class="" name="st_icon1" value="<?php echo get_post_meta( $post-> ID, 'service_text1', true ) ?>">
		<label for="wp_beu">Service Link</label>
		<input type="text" id="wp_beu" class="" name="sl_icon1" value="<?php echo get_post_meta( $post-> ID, 'service_link1', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Font-Awesome Icon Name</label>
		<input type="text" id="wp_beu" class="" name="sf_icon2" value="<?php echo get_post_meta( $post-> ID, '_service_icon2', true ) ?>">
		<label for="wp_beu">Service Text</label>
		<input type="text" id="wp_beu" class="" name="st_icon2" value="<?php echo get_post_meta( $post-> ID, '_service_text2', true ) ?>">
		<label for="wp_beu">Service Link</label>
		<input type="text" id="wp_beu" class="" name="sl_icon2" value="<?php echo get_post_meta( $post-> ID, '_service_link2', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Font-Awesome Icon Name</label>
		<input type="text" id="wp_beu" class="" name="sf_icon3" value="<?php echo get_post_meta( $post-> ID, '_service_icon3', true ) ?>">
		<label for="wp_beu">Service Text</label>
		<input type="text" id="wp_beu" class="" name="st_icon3" value="<?php echo get_post_meta( $post-> ID, '_service_text3', true ) ?>">
		<label for="wp_beu">Service Link</label>
		<input type="text" id="wp_beu" class="" name="sl_icon3" value="<?php echo get_post_meta( $post-> ID, '_service_link3', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Font-Awesome Icon Name</label>
		<input type="text" id="wp_beu" class="" name="sf_icon4" value="<?php echo get_post_meta( $post-> ID, '_service_icon4', true ) ?>">
		<label for="wp_beu">Service Text</label>
		<input type="text" id="wp_beu" class="" name="st_icon4" value="<?php echo get_post_meta( $post-> ID, '_service_text4', true ) ?>">
		<label for="wp_beu">Service Link</label>
		<input type="text" id="wp_beu" class="" name="sl_icon4" value="<?php echo get_post_meta( $post-> ID, '_service_link4', true ) ?>">
	</p>

	<?php
}
// Save Services Post Meta Database
add_action('save_post', 'service_save_post'); 
function service_save_post($post_id){
	global $post; 

	if(isset($_POST['sf_icon'])){
		update_post_meta($post_id, '_service_icon', $_POST['sf_icon']);
	}	
	if(isset($_POST['st_icon'])){
		update_post_meta($post_id, '_service_text', $_POST['st_icon']);
	}	
	if(isset($_POST['sl_icon'])){
		update_post_meta($post_id, '_service_link', $_POST['sl_icon']);
	}	
	if(isset($_POST['sf_icon1'])){
		update_post_meta($post_id, '_service_icon1', $_POST['sf_icon1']);
	}	
	if(isset($_POST['sl_icon1'])){
		update_post_meta($post_id, '_service_link1', $_POST['sl_icon1']);
	}	
	if(isset($_POST['sf_icon2'])){
		update_post_meta($post_id, '_service_icon2', $_POST['sf_icon2']);
	}	
	if(isset($_POST['st_icon2'])){
		update_post_meta($post_id, '_service_text2', $_POST['st_icon2']);
	}	
	if(isset($_POST['sl_icon2'])){
		update_post_meta($post_id, '_service_link2', $_POST['sl_icon2']);
	}	
	if(isset($_POST['sf_icon3'])){
		update_post_meta($post_id, '_service_icon3', $_POST['sf_icon3']);
	}	
	if(isset($_POST['st_icon3'])){
		update_post_meta($post_id, '_service_text3', $_POST['st_icon3']);
	}	
	if(isset($_POST['sl_icon3'])){
		update_post_meta($post_id, '_service_link3', $_POST['sl_icon3']);
	}	
	if(isset($_POST['sf_icon4'])){
		update_post_meta($post_id, '_service_icon4', $_POST['sf_icon4']);
	}	
	if(isset($_POST['st_icon4'])){
		update_post_meta($post_id, '_service_text4', $_POST['st_icon4']);
	}	
	if(isset($_POST['sl_icon4'])){
		update_post_meta($post_id, '_service_link4', $_POST['sl_icon4']);
	}

}
// End Service Metabox


// Start Team Add Metabox
add_action('add_meta_boxes', 'team_metabox');
function team_metabox(){
	add_meta_box(
		'team_wp_unique',
		'Team Social Link',
		'social_fallback',
		'team',
		'normal',
		'high'
	);
}

// Add Custom Field html
function social_fallback( $post ){
	global $post; ?>
	<p> 
		<label for="wp_beu">Set Icon Name: facebook</label>
		<input type="text" id="wp_beu" class="" name="facebook_icon" value="<?php echo get_post_meta( $post->ID, '_facebook_name', true ) ?>">
		<label for="wp_beu">Facebook Profile Link</label>
		<input type="text" id="wp_beu" class="" name="fb_team_link" value="<?php echo get_post_meta( $post->ID, '_facebook_link', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Set Icon Name: twitter</label>
		<input type="text" id="wp_beu" class="" name="twitter_icon" value="<?php echo get_post_meta( $post->ID, '_twitter_name', true ) ?>">
		<label for="wp_beu">Twitter Profile Link</label>
		<input type="text" id="wp_beu" class="" name="tw_team_link" value="<?php echo get_post_meta( $post->ID, '_twitter_link', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Set Icon Name: behence</label>
		<input type="text" id="wp_beu" class="" name="behencer_icon" value="<?php echo get_post_meta( $post->ID, '_behence_name', true ) ?>">
		<label for="wp_beu">Behence Profile Link</label>
		<input type="text" id="wp_beu" class="" name="behencer_team_link" value="<?php echo get_post_meta( $post->ID, '_behence_link', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Set Icon Name: linkedin</label>
		<input type="text" id="wp_beu" class="" name="linkedin_icon" value="<?php echo get_post_meta( $post->ID, '_linkedin_name', true ) ?>">
		<label for="wp_beu">Linkedin Profile Link</label>
		<input type="text" id="wp_beu" class="" name="linkedin_team_link" value="<?php echo get_post_meta( $post->ID, '_linkedin_link', true ) ?>">
	</p>
	<p> 
		<label for="wp_beu">Set Icon Name: github</label>
		<input type="text" id="wp_beu" class="" name="github_icon" value="<?php echo get_post_meta( $post->ID, '_github_name', true ) ?>">
		<label for="wp_beu">Github Profile Link</label>
		<input type="text" id="wp_beu" class="" name="github_team_link" value="<?php echo get_post_meta( $post->ID, '_github_link', true ) ?>">
	</p>

	<?php
}
// Save Team Post Meta Database
add_action('save_post', 'team_save_post'); 
function team_save_post($post_id){
	global $post; 

	if (isset($_POST['facebook_icon'])) {
		update_post_meta($post_id, '_facebook_name', $_POST['facebook_icon']);
	}
	
	if (isset($_POST['fb_team_link'])) {
		update_post_meta($post_id, '_facebook_link', $_POST['fb_team_link']);
	}
	
	if (isset($_POST['twitter_icon'])) {
		update_post_meta($post_id, '_twitter_name', $_POST['twitter_icon']);
	}

	if (isset($_POST['tw_team_link'])) {
		update_post_meta($post_id, '_twitter_link', $_POST['tw_team_link']);
	}

	if (isset($_POST['behencer_icon'])) {
		update_post_meta($post_id, '_behence_name', $_POST['behencer_icon']);
	}
	
	if (isset($_POST['behencer_team_link'])) {
		update_post_meta($post_id, '_behence_link', $_POST['behencer_team_link']);

	}
	if (isset($_POST['linkedin_icon'])) {
		update_post_meta($post_id, '_linkedin_name', $_POST['linkedin_icon']);

	}
	if (isset($_POST['linkedin_team_link'])) {
		update_post_meta($post_id, '_linkedin_link', $_POST['linkedin_team_link']);

	}
	
	if (isset($_POST['github_icon'])) {
		update_post_meta($post_id, '_github_name', $_POST['github_icon']);

	}
	
	
	if (isset($_POST['github_team_link'])) {
		update_post_meta($post_id, '_github_link', $_POST['github_team_link']);

	}
	



	
	

}
// End Team Metabox


// Start Experience Add Metabox
add_action('add_meta_boxes', 'experience_metabox');
function experience_metabox(){
	add_meta_box(
		'about_wp_unique',
		'Experience Post Additonal',
		'experience_falback',
		'experience',
		'normal',
		'high'
	);
}

// Add Custom Field html
function experience_falback( $post ){
	global $post; ?>
	<p> 
		<label for="wp_beu">Experience Organaization Name</label>
		<input type="text" id="wp_beu" class="regular-text" name="experience_organaization" value="<?php echo get_post_meta($post-> ID, 'exp_comp', true); ?>">
	</p>
	<p> 
		<label for="wp_beu">Experience Icon</label>
		<input type="text" id="wp_beu" class="regular-text" name="experience_icon" value="<?php echo get_post_meta($post-> ID, 'exp_icon', true); ?>">
	</p>

	<?php
}
// Save Experience Post Meta Database
add_action('save_post', 'experience_save_post'); 
function experience_save_post($post_id){
	global $post; 
	if (isset($_POST['experience_organaization'])) {
		update_post_meta($post_id, 'exp_comp', $_POST['experience_organaization']);
	}
	if (isset($_POST['experience_icon'])) {
		update_post_meta($post_id, 'exp_icon', $_POST['experience_icon']);
	}
	
}
// End Experience Metabox