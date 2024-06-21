<?php
//portfolio shortcoded
function portfolio_shortcoded($atts, $content){
	ob_start()
	
//$shortcode_portfolio = 	extract(shortcode_atts(array(
	//'number' => '3',
//), $atts ));

	?>
        <section id="portfolio" class="portfolio-area pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portfolio-title">
                            <span>work</span>
                            <h2>Cool Stuffs</h2>
                        </div>
                    </div>

					<div class="col-lg-6">
					<!-- Filters -->
					<?php if(!is_tax()) {
						$terms = get_terms('filter');
						$count = count($terms);
						if ( $count > 0 ){ ?>
						<div class="portfolio-menu">
							<button class="filter" data-filter="*"><?php  _e('All', 'protfolio'); ?></button>
							<?php
								foreach ( $terms as $term ) {
								echo '<button data-filter=".'.$term->slug.'">'.$term->name.'</button>';
								} 
								//<button class="filter" data-filter="'.$term->slug.'">'.$term->name.'</button>
							?>	
							
						</div>
					<?php } } ?>
					
                    </div>
                </div>

                <div class="row portfolio-active">

					<!-- For Crop feature Image and calling-->
					<?php 
						$protfolio = new WP_Query(array(
							'post_type' => 'portfolio',
							'posts_per_page' => $number,
						));
					?>
					<?php if($protfolio->have_posts()):?>
					<?php while($protfolio->have_posts() ) : $protfolio->the_post() ; ?>
                     
				<div <?php post_class('col-lg-4 grid-item'); ?>>

                        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

						
							<div class="portfolio bootstrap">
								<?php if ( has_post_thumbnail()) the_post_thumbnail('portfolio-thumb'); ?>
								
								<?php echo '<a class="image-link" href="'.esc_url($featured_img_url).'" rel="lightbox">'; 
                            echo '</a>';?>
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
	
	
	<?php 

	// $portfolio = ob_get_clean();
	// 	return $portfolio;
	
};
add_shortcode('portfolio', 'portfolio_shortcoded');


//Services shortcoded
function service_shortcoded($atts, $content){
	ob_start()
	
//$shortcode_portfolio = 	extract(shortcode_atts(array(
	//'number' => '3',
//), $atts ));

	?>
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

	
	<!--End Short Code-->
	<?php $service_under = ob_get_clean();
		return $service_under;
	
}
add_shortcode('services', 'service_shortcoded');


//Skills shortcoded
function skill_shortcoded($atts, $content){
	ob_start()
	
//$shortcode_portfolio = 	extract(shortcode_atts(array(
	//'number' => '3',
//), $atts ));

	?>
        <section id="skill" class="skill-area pt-115 pb-115">
            <div class="container">
                <div class="row">
				<?php $skills = new WP_Query(array(
					'post_type'        => 'skills',
					'posts_per_page'   => 3,
					'order'            => 'DESC'
				))?>
					
				<?php if($skills->have_posts()):?>
				<?php while($skills->have_posts()):$skills->the_post()?>
					<!-- Skill Meta-->
					<?php $skill_span = get_post_meta($post-> ID, 'skill_span', true);?>
					
					<!-- Per Skill Meta-->
					<?php $skill_title = get_post_meta($post-> ID, 'skill_title', true);?>
					<?php $skill_total = get_post_meta($post-> ID, 'skill_total', true);?>
					<!-- Per Skill Meta-->
					
					<!-- Per Skill Meta-->
					<?php $skill_title1 = get_post_meta($post-> ID, 'skill_title1', true);?>
					<?php $skill_total1 = get_post_meta($post-> ID, 'skill_total1', true);?>
					<!-- Per Skill Meta-->
					
					<!-- Per Skill Meta-->
					<?php $skill_title2 = get_post_meta($post-> ID, 'skill_title2', true);?>
					<?php $skill_total2 = get_post_meta($post-> ID, 'skill_total2', true);?>
					<!-- Per Skill Meta-->
					
					<!-- Per Skill Meta-->
					<?php $skill_title3 = get_post_meta($post-> ID, 'skill_title3', true);?>
					<?php $skill_total3 = get_post_meta($post-> ID, 'skill_total3', true);?>
					<!-- Per Skill Meta-->
                    <div class="col-lg-6">
                        <div class="skill-photo">
                            <?php the_post_thumbnail();?>
                        </div>
                    </div>
                    <!-- Skill Right -->
                    <div class="col-md-6 col-lg-6">
                        <div class="skill-right  wow bounceInRight">
                        <span><?php echo $skill_span; ?></span>
                            <h2><?php the_title();?></h2>
                        </div>
                        <div class="nandine-skill-bar wow bounceInRight">
                            <!-- skill item -->
                            <div class="skill-bar">
                                <h5 class="skilba-title"><?php echo $skill_title; ?></h5>
                                <div class="skillbar" data-percent="<?php echo $skill_total?>">
                                    <p class="skillbar-bar" style="background: #e67e22;"><span class="skill-bar-percent"></span></p>                                    
                                </div>
                            </div>
                            <!-- skill item -->
                            <div class="skill-bar">
                                <h5 class="skilba-title"><?php echo $skill_title1; ?></h5>
                                <div class="skillbar" data-percent="<?php echo $skill_total1; ?>">
                                    <p class="skillbar-bar" style="background: #e67e22;"><span class="skill-bar-percent"></span></p>
                                </div>
                            </div> 
                            <!-- skill item -->
                            <div class="skill-bar">
                                <h5 class="skilba-title"><?php echo $skill_title2; ?></h5>
                                <div class="skillbar" data-percent="<?php echo $skill_total2; ?>">
                                    <p class="skillbar-bar" style="background: #e67e22;"><span class="skill-bar-percent"></span></p>
                                </div>
                            </div>
                            <!-- skill item -->
                            <div class="skill-bar">
                                <h5 class="skilba-title"><?php echo $skill_title3; ?></h5>
                                <div class="skillbar" data-percent="<?php echo $skill_total3; ?>">
                                    <p class="skillbar-bar" style="background: #e67e22;"><span class="skill-bar-percent"></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Skill Bar -->
                    </div>
					
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your query.' ); ?></p>
				<?php endif; ?>
   	
			</div>
		</div>
	</section>







	
	<!--End Short Code-->
	<?php $skill = ob_get_clean();
		return $skill;
	
}
add_shortcode('skills', 'skill_shortcoded');


?>