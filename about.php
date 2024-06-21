<?php
/*
* Template Name: About Us
**/
get_header(); 
global $hobi;
?>
        <!-- about-area -->
        <section id="about" class="about-area pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <span><?php the_title();?></span>
                            <h2><?php echo $hobi['about_us'];?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
				<?php $about = new WP_Query(array(
					'post_type' => 'about',
					'posts_per_page' => 1,
				))?>
					
				<?php if($about->have_posts()):?>
				<?php while($about->have_posts()):$about->the_post()?>
					<?php $about_span = get_post_meta($post-> ID, 'about_span', true);?>
				
                    <div class="col-lg-6">
                        <div class="section-title">
                            <span><?php echo $about_span ?></span>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
				
                    <div class="col-lg-6">
                        <div class="about-right">
                            <?php the_content(); ?>
                        </div>
                        <div class="about-btn">
                            <a href="<?php echo get_post_meta($post-> ID, 'cv_d_link', true); ?>" class="cv-btn"><?php echo get_post_meta($post-> ID, 'download_cv', true); ?></button></a>
                            <a href="<?php echo get_post_meta($post-> ID, 'design_pro_link', true ); ?>" class="detail-btn"><?php echo get_post_meta($post-> ID, 'design_process', true ); ?></button></a>
                        </div>
                    </div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
				<?php endif; ?>	

            </div>
        </section>
        <!-- about-area -->
<?php get_footer(); ?>