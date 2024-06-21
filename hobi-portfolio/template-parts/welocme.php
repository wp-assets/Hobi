<?php 
/*
* Template Name: Hobi Home
*
*
*/
get_header(); 
?>
    <div id="home" class="main">
        <!-- slider-area -->
        <section class="slider-area gray-bg">
            <div class="owl-carousel owl-theme slider-active">
				<?php $hobipost= new WP_Query(array(
					'post_type' => 'slider',
					'posts_per_page' => 1,
				))?>
				<?php if($hobipost->have_posts()):?>
				<?php while($hobipost->have_posts()):$hobipost->the_post()?>
				
				<?php $slider_span = get_post_meta($post-> ID, 'slider_span', true);?>
				<?php $learn_more = get_post_meta($post-> ID, 'learn_more', true);?>
				<?php $youtube = get_post_meta($post-> ID, 'tube_link', true);?>
						
                <div class="single-slider d-flex align-items-center" data-background="<?php the_post_thumbnail('slider') ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="slider-content">
									<span><?php echo $slider_span; ?></span>
									<h2><?php the_title(); ?></h2>
									<?php the_content(); ?>
									<div class="slider-btn">
										<a href="<?php echo $learn_more?>"><button class="btn">Learn More</button></a>
										<a class="popup-video" href="<?php echo $youtube?>"><i class="fa fa-play"></i><button class="video-btn"></button><span>Play Video</span></a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
				<?php endif; ?>	
				
            </div>
        </section>
        <!-- slider-area -->

        <!-- about-area -->
        <section id="about" class="about-area pt-115 pb-115">
            <div class="container">
                <div class="row">
				<?php $about = new WP_Query(array(
					'post_type' => 'about',
					'posts_per_page' => 1,
				))?>
					
				<?php if($about->have_posts()):?>
				<?php while($about->have_posts()):$about->the_post()?>
					
				<?php $about_span = get_post_meta($post-> ID, 'about_span', true);?>
				<?php $download_cv = get_post_meta($post-> ID, 'download_cv', true);?>
				<?php $cv_d_link = get_post_meta($post-> ID, 'cv_d_link', true);?>
				<?php $design_process = get_post_meta($post-> ID, 'design_process', true);?>
				<?php $design_pro_link = get_post_meta($post-> ID, 'design_pro_link', true);?>

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
                            <a href="<?php echo $cv_d_link ?>" class="cv-btn"><?php echo $download_cv ?></button></a>
                            <a href="<?php echo $design_pro_link; ?>" class="detail-btn"><?php echo $design_process ?></button></a>
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
        <!-- about-area -->

        <!-- Service -->
        <section id="service" class="service-area pt-115 pb-115">
            <div class="container">
                <div class="row">
				<?php $service = new WP_Query(array(
					'post_type'        => 'service',
					'posts_per_page'   => 3,
					'order'            => 'DESC'
				))?>
					
				<?php if($service->have_posts()):?>
				<?php while($service->have_posts()):$service->the_post()?>
					<!-- Line One-->
					<?php $service_icon = get_post_meta($post-> ID, 'service_icon', true);?>
					<?php $service_link = get_post_meta($post-> ID, 'service_link', true);?>
					<?php $service_text = get_post_meta($post-> ID, 'service_text', true);?>
					<!-- Line one-->
					<!-- Line two-->
					<?php $service_icon1 = get_post_meta($post-> ID, 'service_icon1', true);?>
					<?php $service_link1 = get_post_meta($post-> ID, 'service_link1', true);?>
					<?php $service_text1 = get_post_meta($post-> ID, 'service_text1', true);?>
					<!-- Line two-->
					<!-- Line three-->
					<?php $service_icon2 = get_post_meta($post-> ID, 'service_icon2', true);?>
					<?php $service_link2 = get_post_meta($post-> ID, 'service_link2', true);?>
					<?php $service_text2 = get_post_meta($post-> ID, 'service_text2', true);?>
					<!-- Line three-->
					<!-- Line four-->
					<?php $service_icon3 = get_post_meta($post-> ID, 'service_icon3', true);?>
					<?php $service_link3 = get_post_meta($post-> ID, 'service_link3', true);?>
					<?php $service_text3 = get_post_meta($post-> ID, 'service_text3', true);?>
					<!-- Line four-->
					<!-- Line five-->
					<?php $service_icon4 = get_post_meta($post-> ID, 'service_icon4', true);?>
					<?php $service_link4 = get_post_meta($post-> ID, 'service_link4', true);?>
					<?php $service_text4 = get_post_meta($post-> ID, 'service_text4', true);?>
					<!-- Line five-->
				
                    <!-- single service -->
                    <div class="col-lg-4">
                        <div class="single-service">
                            <div class="service">
                                <?php the_post_thumbnail(); ?>
                                <h2 class="mb-20 mt-20"><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                                <div class="service-list">
                                    <ul>
                                        <li><i class="fa fa-<?php echo $service_icon; ?>"></i><a href="<?php echo $service_link; ?>"><?php echo $service_text; ?></a></li>
                                        <li><i class="fa fa-<?php echo $service_icon1; ?>"></i><a href="<?php echo $service_link1; ?>"><?php echo $service_text1; ?></a></li>
                                        <li><i class="fa fa-<?php echo $service_icon2; ?>"></i><a href="<?php echo $service_link2; ?>"><?php echo $service_text2; ?></a></li>
 
                                        <li><i class="fa fa-<?php echo $service_icon3; ?>"></i><a href="<?php echo $service_link3; ?>"><?php echo $service_text3; ?></a></li>
                                        
                                        <li><i class="fa fa-<?php echo $service_icon4; ?>"></i><a href="<?php echo $service_link4; ?>"><?php echo $service_text4; ?></a></li>
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
        <section id="team" class="team-area pb-220 pt-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <span>Team</span>
                            <h2>Our Team</h2>
                        </div>
                    </div>
                </div>
                <div class="row owl-carousel owl-theme owl-team">
					<?php 
						$we_team = new WP_Query(array(
							'post_type' => 'team',
							'posts_per_page' => 3,
						));
					?>
					
					<?php if($we_team->have_posts()):?>
					<?php while($we_team->have_posts() ) : $we_team->the_post() ; ?>
					
					<?php $we_team_social = get_post_meta($post-> ID, '', true);?>
				
				
                    <div class="we_team">
                        <div class="single-team">
                            <?php the_post_thumbnail(); ?>
							<div class="team-hover">
								<h3><?php the_title(); ?></h3>
								<span><?php the_content(); ?></span>
								<div class="team-social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-behence"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
									<a href="#"><i class="fa fa-youtube"></i></a>
									<a href="#"><i class="fa fa-github-alt"></i></a>
								</div>
							</div>
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
        <!-- Our Team -->
		

        <!-- call to action -->
        <section class="cta-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-title">
                            <span><?php echo $hobi['any_span'];?></span>
                            <h2><?php echo $hobi['anyproject_big'];?></h2>
                        </div>
                    </div>
                    <div class="cta-btn">
                        <a class="quote-btn" href="<?php echo $hobi['get_qute_link'];?>"><button class="fa fa-user"><?php echo $hobi['get_qute'];?></button></a>
                        <a class="mail-btn" href="<?php echo $hobi['giv_mail_link'];?>"><button class="fa fa-envelope"><?php echo $hobi['giv_mail'];?></button></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- call to action -->

        <!-- Experience -->
        <section class="experience-area pt-120 pb-90">
            <div class="container">
                <div class="row">
				<?php global $hobi; ?>
                    <div class="col-lg-6 offset-3 text-center">
                        <div class="section-title">
                            <span><?php echo $hobi['experience']; ?></span>
                            <h2><?php echo $hobi['experience_big']; ?></h2>
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
					
					<?php $exp_comp = get_post_meta($post-> ID, 'exp_comp', true);?>
					<?php $exp_icon = get_post_meta($post-> ID, 'exp_icon', true);?>
					
                        <!-- single experience -->
                        <div class="col-lg-4 mb-30">
                            <div class="single-experience">
                                <i class="fa fa-<?php echo $exp_icon ?>"></i>
                                <span><?php echo $exp_comp ?> </span>
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
								<a href="<?php echo wp_trim_words(get_the_content(), '20', false );?>" class="read-more"> </a>
                            </div>
                        </div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
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
                            <span><?php echo $hobi['education_span']?></span>
                            <h2><?php echo $hobi['educatin_title']?></h2>
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
                            <img class="small" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/education/bg-3.jpg" alt="">
                            <img class="big" src="<?php echo esc_url(get_template_directory_uri()); ?>/img/education/bg-big.jpg" alt="">
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

        <!-- Testimonial -->
        <section class="testimonial-area pt-120 pb-220">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="testimonial-title">
                            <span><?php echo $hobi['testimonial_span']; ?></span>
                            <h2><?php echo $hobi['sweet_client']; ?></h2>
                        </div>
                    </div>
                </div>
                <!-- Testimonial -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="owl-testimonial owl-carousel owl-theme">
					<?php 
						$sweet_client = new WP_Query(array(
							'post_type' => 'sweetclients',
							'posts_per_page' => 4,
						));
					?>
					<?php if($sweet_client->have_posts()):?>
					<?php while($sweet_client->have_posts() ) : $sweet_client->the_post() ; ?>
					
					<?php $client_funder = get_post_meta($post-> ID, 'client_funder', true);?>
						
                            <div class="item single-testimonial">
								<div class="testimonial_div">
									<div class="review-testimonal">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<h4>“ Design Quality “</h4>
									</div>
									<p><?php echo wp_trim_words(get_the_content(), '38', true )?></p>
									<div class="testimonail-avatar">
										<?php the_post_thumbnail(); ?>
										<h4><?php the_title();?></h4>
										<span><?php echo $client_funder; ?></span>
									</div>
								</div>
                            </div>
							
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

					<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
					<?php endif; ?>		
							
                        </div>                    
                    </div>                   
                </div>

            </div>
        </section>
        <!-- Testimonial end -->

		
		
		
		
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
					foreach ($small_info as $post): setup_postdata($post);
					?>  
						
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
								
								
							<?php readmore('80'); ?>
							....... <a href="<?php the_permalink();?>">Read More</a>
								
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
						$i++;
						
					?>                                            
					<!-- thumb small post -->
					<?php if($i != 1):?>
						<div class="blog-right">
							<i class="fa fa-calendar"></i><span><?php the_time('j F, Y'); ?></span>
							<i class="fa fa-comments"></i><span><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'Comments Off');?></span>
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						</div>
					<?php endif; ?>
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
                            <label for="name">Your Name <span>**</span></lable>
                            <input type="text" name="name" placeholder="Enter your name....">
                            <label for="email">Email Address <span>**</span></lable>
                            <input type="text" name="email" placeholder="Enter your email adress....">
                            <label for="message">Massage <span>**</span></lable>
                            <textarea name="" id="massage" cols="30" rows="15"></textarea>
                            <input type="submit" value="Get A Quote">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="map">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact -->		

		
    </div>
    <!-- Main -->
<?php get_footer(); ?>