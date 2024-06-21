<?php

get_header(); ?>

<!-- Service -->
<section id="service" class="service-area pt-115 pb-115">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">


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
		</div>
	</div>
</section>

<?php

get_footer();
