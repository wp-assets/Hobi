<?php 

/*
Template Name: I Profile
*/

while (have_posts() ) {
	the_post();

	the_title();

	the_content();

	echo do_shortcode('[ld_profile]');

}
?>
