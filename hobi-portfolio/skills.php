<?php
/*
* Template Name: Skills
**/
get_header(); 
?>        <!-- My Skillset -->
        <section id="skill" class="skill-area pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-title">
                            <span><?php the_title(); ?></span>
                            <h2><?php echo $hobi['my_skill']?></h2>
                        </div>
                    </div>
                </div>
			
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
                        <div class="hobi-skill-bar wow bounceInRight">
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
        <!-- Skill -->
<?php get_footer(); ?>