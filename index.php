<?php

get_header(); ?>
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
								<?php echo wp_trim_words(get_the_content(), '50', false );?>
								<a href="<?php the_permalink();?>">Read More</a>
								
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
						// var_dump($i) ;
						
					?>                                            
					<!-- thumb small post -->
					
						<div class="blog-right">
							<i class="fa fa-calendar"></i><span><?php the_time('j F, Y'); ?></span>
							<i class="fa fa-comments"></i><span><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'Comments Off');?></span>
							<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
						</div>

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

<?php
get_footer();