<?php
/*
* Template Name: Blog
*/
get_header(); 
?>
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
                    
                    get_template_part('loop-post'); 
                    
                    the_content(); 

                    ?>


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
<?php get_footer(); ?>