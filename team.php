<?php 
/*
* Template Name: We Team
*
*/
get_header(); ?>

   		<!-- Our Team -->
        <section id="team" class="team-area pb-60 pt-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team-title">
                            <span>Team</span>
                            <h2>Our Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col-lg-12 owl-team owl-carousel owl-theme">
						<?php 
							$hobi_team = new WP_Query(array(
								'post_type' => 'team',
								'posts_per_page' => 4,
							));
						?>
						
						<?php if($hobi_team->have_posts() ):?>
						<?php while($hobi_team->have_posts() ) : $hobi_team->the_post() ; ?>
						
						<div class="we_team">
							<div class="single-team">
								<?php the_post_thumbnail(); ?>
								<div class="team-hover">
									<h3><?php the_title(); ?></h3>
									<span><?php the_content(); ?></span>
									<div class="team-social">
										<a href="<?php echo get_post_meta(get_the_ID(), '_fb_team_link', true); ?>" target="_blank"><i class="fa fa-<?php echo get_post_meta($post->ID, '_facebook_name', true); ?>"></i></a>
										<a href="<?php echo get_post_meta(get_the_ID(), '_tw_team_link', true); ?>" target="_blank"><i class="fa fa-<?php echo get_post_meta($post->ID, '_twitter_name', true); ?>"></i></a>

										<a href="<?php echo get_post_meta(get_the_ID(), '_behence_team_link', true); ?>" target="_blank"><i class="fa fa-<?php echo get_post_meta($post->ID, '_behence_name', true); ?>"></i></a>
										<a href="<?php echo get_post_meta(get_the_ID(), '_linkedin_team_link', true); ?>" target="_blank"><i class="fa fa-<?php echo get_post_meta($post->ID, '_linkedin_name', true); ?>"></i></a>

										<a href="" target="_blank"><i class="fa fa-<?php echo get_post_meta($post->ID, '_github_name', true); ?>"></i></a>
										<a href="<?php echo get_post_meta(get_the_ID(), '_github_team_link', true); ?>"><i class="fa fa-<?php echo get_post_meta($post->ID, '_github_name', true); ?>-alt"></i></a>
									</div>
								</div>
							</div>
						</div>
						
						<?php endwhile; ?>
						<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
						<?php endif; ?>	
						<?php wp_reset_postdata(); ?>
					</div>
                </div>
            </div>
        </section>
        <!-- Our Team -->
		


    <!-- Main -->
<?php get_footer(); ?>