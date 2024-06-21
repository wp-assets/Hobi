<?php


get_header(); ?>

<!-- Service -->
<section id="service" class="service-area pt-20 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
				<?php 
					while ( have_posts() ) :
						the_post();

						the_post_thumbnail(); 
						the_title();

						the_content();


					endwhile; // End of the loop.
					wp_reset_postdata();
				?>
			</div>

			<!-- sidebar -->
			<div class="col-lg-4">
				<?php dynamic_sidebar('sidebar-right'); ?>
			</div>


		</div>
	</div>
</section>


<?php get_footer();
