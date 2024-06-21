<?php
/*
* Template Name: Services
**/

?>
<?php get_header(); ?>
        <!-- Service -->
        <section id="service" class="service-area pt-40 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <span><?php the_title(); ?></span>
                            <h2><?php echo $hobi['my_service']?></h2>
                        </div>
                    </div>
                </div>
				
                <div class="row">
				<?php $service = new WP_Query(array(
					'post_type'        => 'service',
					'posts_per_page'   => 3,
					'order'            => 'DESC'
				))?>
					
				<?php if($service->have_posts()):?>
				<?php while($service->have_posts()):$service->the_post()?>

                    <!-- single service -->
                    <div class="col-lg-4">
                        <div class="single-service">
                            <div class="service">
                                <?php the_post_thumbnail(); ?>
                                <h2 class="mb-20 mt-20"><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                                <div class="service-list">
                                    <ul>
                                        <li><i class="fa fa-<?php echo get_post_meta($post-> ID, 'service_icon', true); ?>"></i><a href="<?php get_post_meta($post-> ID, 'service_link', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text', true); ?></a></li>

                                        <li><i class="fa fa-<?php echo get_post_meta($post-> ID, 'service_icon1', true) ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link1', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text1', true); ?></a></li>

                                        <li><i class="fa fa-<?php echo get_post_meta($post-> ID, 'service_icon2', true); ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link2', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text2', true); ?></a></li>

 
                                        <li><i class="fa fa-<?php echo get_post_meta($post-> ID, 'service_icon3', true); ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link3', true ); ?>"><?php echo get_post_meta($post-> ID, 'service_text3', true); ?></a></li>
                                        
                                        <li><i class="fa fa-<?php echo get_post_meta($post-> ID, 'service_icon4', true); ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link4', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text4', true); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single service -->
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
				<?php endif; ?>
					
                </div>
            </div>
        </section>
        <!-- Service -->
<?php get_footer(); ?>