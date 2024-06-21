<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

		<div class="header_top_area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-xs-12">
						<div class="shopmenu_contact">
							<ul>
								<li><a href="#"><i class="fa fa-phone"></i>01723 411 969 </a></li>
								<li><a href="www.gmail.com"><i class="fa fa-rocket"></i>alorchokh@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-xs-12">
						<div class="shopmenu">
							<ul>
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						
					</div>
				</div>
			</div>
		</div>
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 d-flex align-items-center">

                         <div class="logo">
							<?php global $hobi; ?>
							<a href="<?php echo esc_url(bloginfo('home')); ?>"><img src="<?php echo $hobi['logo_upload']['url']?>" alt="logo"></a>
						
                        </div>
                    </div>

                    <div class="col-lg-7 d-flex align-content-center justify-content-end">
                        <div class="main-menu text-center f-right">
                        	
								<?php 
									wp_nav_menu(array(
										'menu_location'=>'main-menu',
										'menu_id'=>'mobile-menu',
									));
								 ?>	
                        </div>



                    </div>

                    <div class="col-lg-3">
                        <div class="header-btn f-right">
                            <a href="<?php echo esc_url(get_template_directory_uri() ) ?>/img/Iman Ali.pdf" class="btn"><?php echo $hobi['download_cv'];?></a>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 


