	<div id="home" class="main">
		<!-- Slider Section -->
		<section id="home-slider">
			<div class="container-fluid" style="margin:0">
					<?php $hobipost= new WP_Query(array(
						'post_type' => 'slider',
						'posts_per_page' => 3,
					))?>
					<div class="row slider-active owl-carousel owl-theme">
					
					<?php if($hobipost->have_posts()):?>
					<?php while($hobipost->have_posts()):$hobipost->the_post()?>
					
						<div class="single_slider">
							<div class="slider-content">
								<span><?php echo get_post_meta(get_the_ID(), 'slider_span', true); ?></span>
								<h2 class="slide-title"><?php the_title(); ?></h2>
								<p>
								<?php echo wp_trim_words(get_the_content(),'35', false);; ?></p>
								<div class="slider-btn">
									<a href="<?php echo $learn_more?>"><button class="btn"><?php echo get_post_meta(get_the_ID(), 'learn_text', true);?></button></a>
									<a class="popup-video" href="<?php get_post_meta($post-> ID, 'tube_link', true); ?>"><i class="fa fa-play"></i><button class="video-btn"></button><span><?php echo get_post_meta(get_the_ID(), 'play_tube', true); ?></span></a>
								</div>
							</div>
							<div class="slider_image">
								<?php the_post_thumbnail("") ?>
							</div>							
						</div>

						
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
					<?php endif; ?>	
				</div>
			</div>
		</section>
	</div>
	<!-- Slider Section -->