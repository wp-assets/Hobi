<?php 
	while ( have_posts() ) :
		the_post();

		the_post_thumbnail(); 
		the_title();

		the_content();


	endwhile; // End of the loop.
	wp_reset_postdata();
?>

