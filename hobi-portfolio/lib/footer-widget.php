                        <div class="footer-right">
                            <div class="slogan">
                                <h2><?php echo $hobi['footer_digital']?></h2>
                            </div>
							<?php if(is_active_sidebar('footer_widget1')) : ?>
							<?php dynamic_sidebar('footer_widget1');?>
							<?php endif; ?>

							<?php if(is_active_sidebar('footer_widget2')) : ?>
							<?php dynamic_sidebar('footer_widget2');?>
							<?php endif; ?>

							<?php if(is_active_sidebar('footer_widget3')) : ?>
							<?php dynamic_sidebar('footer_widget3');?>
							<?php endif; ?>
                        </div>