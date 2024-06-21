<?php
/*
* Template Name: Portfolio
**/
?>
<?php get_header(); 

?>
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
                                <a href="<?php echo get_post_meta(get_the_ID(), 'portolio_link', true);?>" target="__balank"><i class="fa fa-search"></i></a>

                                <?php echo wp_trim_words(get_the_content(), '50', false );?>
                                <a class="info" href="<?php the_permalink();?>">Read More</a>

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
<?php get_footer(); ?>