<?php 

/*
Template Name: I Course
*/

while (have_posts() ) {
	the_post();

	the_title();

	the_content();

	echo do_shortcode( '[ld_course_list]' );
	//echo do_shortcode( '[ld_topic_list]' );
	//echo do_shortcode( '[ld_lesson_list]' );




}

//endwhile();

?>