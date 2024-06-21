<?php 
/*
* Template Name: front-page
*
*/
get_header(); ?>

<?php get_template_part('home-slider');?>

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
                    <div class="col-lg-6">
                        <div class="section-title">
                            <span><?php echo get_post_meta($post-> ID, 'about_span', true);  ?></span>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </div>
				
                    <div class="col-lg-6">
                        <div class="about-right">
                            <?php the_content(); ?>
                        <div class="about-btn">
                            <a href="<?php echo get_post_meta($post-> ID, 'cv_d_link', true); ?>" class="cv-btn"><?php echo get_post_meta($post-> ID, 'download_cv', true); ?></button></a>
                            <a href="<?php echo get_template_directory_uri() ?><?php echo get_post_meta($post-> ID, 'design_pro_link', true ); ?>" class="detail-btn"><?php echo get_post_meta($post-> ID, 'design_process', true ); ?></button></a>
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

        <!-- Service -->
        <section id="service" class="service-area pt-115 pb-115">
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
                                        <li><i class="fa fa-<?php echo get_post_meta($post->ID, 'service_icon', true); ?>"></i><a href="<?php get_post_meta($post-> ID, 'service_link', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text', true); ?></a></li>

                                        <li><i class="fa fa-<?php echo get_post_meta($post->ID, 'service_icon1', true) ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link1', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text1', true); ?></a></li>

                                        <li><i class="fa fa-<?php echo get_post_meta($post->ID, 'service_icon2', true); ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link2', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text2', true); ?></a></li>

 
                                        <li><i class="fa fa-<?php echo get_post_meta($post->ID, 'service_icon3', true); ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link3', true ); ?>"><?php echo get_post_meta($post-> ID, 'service_text3', true); ?></a></li>
                                        
                                        <li><i class="fa fa-<?php echo get_post_meta($post->ID, 'service_icon4', true); ?>"></i><a href="<?php echo get_post_meta($post-> ID, 'service_link4', true); ?>"><?php echo get_post_meta($post-> ID, 'service_text4', true); ?></a></li>
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
		
        <!-- call to action -->
        <section class="cta-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title">
                            <span><?php echo $hobi['any_span']?></span>
                            <h2><?php echo $hobi['anyproject_big']?></h2>
                        </div>
                    </div>
                    <div class="cta-btn">
                        <a class="quote-btn" href="<?php echo $hobi['get_qute_link']; ?>"><button class="fa fa-user"><?php echo $hobi['get_qute']?></button></a>
                        <a class="mail-btn" href="<?php echo $hobi['giv_mail_link']; ?>"><button class="fa fa-envelope"><?php echo $hobi['giv_mail']; ?></button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- call to action -->

        <!-- Experience -->
        <section class="experience-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-3 text-center">
                        <div class="section-title">
                            <span><?php echo get_post_meta( '', '', true ); ?></span>
                            <h2>Working Closely We Engineers</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
					<?php 
						$experience = new WP_Query(array(
							'post_type' => 'experience',
							'posts_per_page' => 6,
						));
					?>
					<?php if($experience->have_posts()):?>
					<?php while($experience->have_posts() ) : $experience->the_post() ; ?>					
                        <!-- single experience -->
                        <div class="col-lg-4 mb-30">
                            <div class="single-experience">
                                <i class="fa fa-<?php echo get_post_meta($post-> ID, 'exp_icon', true); ?>"></i>
                                <span><?php echo get_post_meta($post-> ID, 'exp_comp', true); ?></span>
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
								<a href="<?php echo wp_trim_words(get_the_content(), '20', false );?>" class="read-more"> </a>
                            </div>
                        </div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					<?php else : ?>
					<p><?php _e( 'Sorry, no Experience posts matched your query.' ); ?></p>
					<?php endif; ?>		
					
                    </div>
                </div>
            </div>
        </section>
        <!-- Experience -->
        <!-- education -->
        <section class="education-area mt-120 mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <span>My Qualification</span>
                            <h2>Education </h2>
                        </div>
						<?php 
							$qualification = new WP_Query(array(
								'post_type' => 'qualification',
								'posts_per_page' => 3,
							));
						?>
						<?php if($qualification->have_posts()):?>
						<?php while($qualification->have_posts() ) : $qualification->the_post() ; ?>
						
						<?php $qualification_date = get_post_meta($post-> ID, 'qualification_date', true);?>

							<div class="education-summary">
								<div class="education-content">
									<span><?php echo $qualification_date ?></span>
									<h3><?php the_title(); ?></h3>
									
									<p><?php echo wp_trim_words(get_the_content(), '27', false );?></p>
									
								</div>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

						<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
						<?php endif; ?>	
                    </div>
                    <div class="col-lg-6">
                        <div class="education-right">
                            <img class="small" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/education/education-up.jpg" alt="">
                            <img class="big" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/education/education.jpg" alt="">
                            <div class="ok-sign">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- education -->
        <!-- Counter -->
        <section class="counter-area pt-120 pb-120">
            <div class="container">
                <div class="row">
					<?php 
						$counterUp = new WP_Query(array(
							'post_type' => 'counterup',
							'posts_per_page' => 4,
						));
					?>
					<?php if($counterUp->have_posts()):?>
					<?php while($counterUp->have_posts() ) : $counterUp->the_post() ; ?>
					
					<?php $counterup_icon = get_post_meta($post-> ID, 'counterup_icon', true);?>
                    <div class="col-lg-3">
                        <div class="single-counter">
                            <i class="fa fa-<?php echo $counterup_icon ?>"></i>
                            <span class="counter"><?php the_content(); ?></span>
                            <p><?php the_title(); ?></p>
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
        <!-- Counter -->
   		<!-- Our testimonial-->
         <section id="testimonial-area" class="pb-120 pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="blog-title">
                            <span>Testimonial</span>
                            <h2>Client Feedback</h2>
                        </div>
                    </div>
                </div>
                <div class="row owl-carousel owl-theme" id="testimonial-active" style="margin-right: 0; ">
					<?php 
						$sweet_client = new WP_Query(array(
							'post_type' => 'sweetclients',
							'posts_per_page' => 3,
						));
					?>
					<?php if($sweet_client->have_posts()):?>
					<?php while($sweet_client->have_posts() ) : $sweet_client->the_post() ; ?>
					<?php $client_funder = get_post_meta($post-> ID, 'client_funder', true);?>
                        <div class="after_testimonial">
                            <div class="single-testimonial">
                                <div class="review-testimonal">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <h4>“ Design Quality “</h4>
                                </div>
                                <div class="testimonial_content">
	                                <p><?php echo wp_trim_words(get_the_content(), '30', true )?></p>
	                                <div class="testimonail-avatar">
	                                    <?php the_post_thumbnail(); ?>
	                                </div>
									<div class="aut-feedback">
										<h4><?php the_title();?></h4>
										<span><?php echo $client_funder; ?></span>
									</div>
                                </div>
                            </div>
					    </div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your team post query.' ); ?></p>
					<?php endif; ?>	
                </div>
            </div>
        </section> 
        <!-- Our testimonial -->
        <!-- Portfolio -->
        <section id="portfolio" class="portfolio-area pt-40 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <span><?php the_title(); ?></span>
                            <h2><?php echo $hobi['my_portfolio']?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-title">
                            <span><?php echo $hobi['portfolio_work']; ?></span>
                            <h2><?php echo $hobi['portfolio_cool']; ?></h2>
                        </div>
                    </div>
					<div class="col-lg-6">
                    <!-- Filters -->
                    <?php if(!is_tax()) {
                        $terms = get_terms('filter');
                        $countmax = count($terms);
                        if ( $countmax > 0 ){ ?>
                        <div class="portfolio-menu">
                            <button class="filter" data-filter="*"><?php  _e('All', 'protfolio'); ?></button>
                            <?php
                                foreach ( $terms as $term ) {
                                echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
                                } 
                                
                            ?>  
                            
                        </div>
                    <?php }; } ?>
                    
                    </div>
                </div>
                <div class="row portfolio-active">
                    <!-- For Crop feature Image and calling-->
                    <?php 
                        $protfolio = new WP_Query(array(
                            'post_type' => 'portfolio',
                            'posts_per_page' => 6,
                        ));
                    ?>
                    <?php if($protfolio->have_posts()):?>
                    <?php while($protfolio->have_posts() ) : $protfolio->the_post() ; ?>

                    <div <?php post_class('col-lg-4 grid-item'); ?>>
                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                        <div class="portfolio bootstrap view view-tenth">
                            <div class="portfolio_hover mask">
                                <h2><?php the_title(); ?></h2>
                                <a href="<?php echo get_post_meta(get_the_ID(), 'portolio_link', true);?>" target="__blank"><i class="fa fa-search"></i></a>

                                <?php echo wp_trim_words(get_the_content(), '50', false );?>
                                <!-- <a class="info" href="<?php the_permalink();?>">Read More</a> -->

                            </div>
                                <?php if ( has_post_thumbnail()) the_post_thumbnail('portfolio-thumb'); ?>
                                <?php echo '<a class="image-link" href="'.esc_url($featured_img_url).'" rel="lightbox">'; 
                            echo '</a>';?>
                        </div>
                    </div> 
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                    <p><?php _e( 'Sorry, No Portfolio Posts matched your query.' ); ?></p>
                    <?php endif; ?> 				
	
                </div>
            </div>
        </section>
        <!-- Portfolio -->
        <!-- Blog -->
        <section id="blog" class="blog-area pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <span><?php echo $hobi['my_title']; ?></span>
                            <h2><?php echo $hobi['my_blog']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
					<?php
					$args = array(
						'post_type'        => 'post',
						'post_status'      => 'publish',
						'posts_per_page'   => 1,
						'order'            => 'DESC');	
						
					$small_info = get_posts($args);
					foreach ($small_info as $post): setup_postdata($post); ?>
						<div class="col-lg-7">
							<div class="blog-thumb">
								<?php the_post_thumbnail('post-thumb_long', array('class'=>''));?>
							</div>
							<div class="blog-content">
								<div class="blog-info">
									<i class="fa fa-calendar"></i><span><?php the_time('j F, Y'); ?></span>
									<i class="fa fa-comments"></i><span><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'Comments Off');?></span>
									<i class="fa fa-user"></i><span> by : <?php the_author(); ?></span>
								</div>
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
								<p><?php echo wp_trim_words(get_the_content(), '55', false )?></p><a class="link_more" href="<?php the_permalink();?>">Read More</a>
							</div>
						</div>
					<?php endforeach; ?>
					<?php wp_reset_query(); ?>
                    <div class="col-lg-5">
						<?php $args = array(
								'post_type'        => 'post',
								'post_status'      => 'publish',
								'posts_per_page'   => 5,
								'order'            => 'DESC');						
							
							$small_info = get_posts($args);
							foreach ($small_info as $post): setup_postdata($post);
                            
                           if(isset($i)){
                            echo $i++;;
                           }
                            
                            
							
						?>                                            
						<!-- thumb small post -->
                       <?php //if($i != 1) : ?>
							<div class="blog-right">
								<i class="fa fa-calendar"></i><span><?php the_time('j F, Y'); ?></span>
								<i class="fa fa-comments"></i><span><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'Comments Off');?></span>
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							</div>
						<?php //endif; ?>
						<?php endforeach; ?>
						<?php wp_reset_query(); ?>
                    </div>
					<div id="pagi">
						<?php
						the_posts_pagination(array(
						'show_all' => true,
						'prev_text' => 'PREV',
						'next_text' => 'NEXT',
						'screen_reader_text' => '  ',
						));
						?>
					</div>
                </div>
            </div>
        </section>
        <!-- Blog -->
		<!-- contact -->
        <section id="contact" class="contact-area pt-120 pb-120 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-4">
                        <div class="sction-title">
                            <span><?php the_title(); ?></span>
                            <h2><?php echo $hobi['contact_us']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 text-left">			
                        <div class="contact-from">
		                    <?php while(have_posts()):the_post();?>
								<?php the_content();?>
                                <?php echo do_shortcode( '[contact-form-7 id="159" title="Contact Page"]' ); ?>
<!--                                     <div class="contact-from">
                                        <label for="name">Your Name <span>**</span>
                                        <input type="text" name="name" placeholder="Enter your name....">
                                        <label for="email">Email Address <span>**</span>
                                        <input type="text" name="email" placeholder="Enter your email adress....">
                                        <label for="message">Massage <span>**</span>
                                        <textarea name="" id="massage" cols="30" rows="15"></textarea>
                                        <input type="submit" value="Get A Quote">
                                    </label></label></label>
                                </div> -->

							<?php endwhile;?>
                        </div> 
                    </div>

                    <div class="col-lg-6">
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11726.174662530704!2d88.50414066424065!3d26.05132970541835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1683911429611!5m2!1sen!2sbd" width="600" height="560\" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact -->
    <!-- Main -->
<?php get_footer(); ?>