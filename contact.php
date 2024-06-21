<?php 
/*
* Template Name: Contact Us
*
*
*/
get_header(); ?>
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
<?php get_footer(); ?>