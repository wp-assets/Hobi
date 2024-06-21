<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    //$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        //'opt_name'             => $hobi,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Hobi Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Hobi Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'hobi',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => 'dashicons-portfolio',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => false,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => false,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Header Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Options', 'hobi' ),
        'id'               => 'h_option',
        'icon'             => 'el el-laptop',
        'fields'           => 
			array(
				array(
					'title'=>'Logo Uploder',
					'id'=>'logo_upload',
					'subtitle'=>'Change Your Logo 95x32 pixel transparent image.',
					'desc'    => __( 'upload your Header Logo', 'hobi' ),
					'type'=>'media',
					'default'=> array(
						'url' => get_template_directory_uri().'/img/logo/iman-logo.png' ,
					),	
				),
				array(
					'title'=>'Download CV Button Text',
					'id'=>'download_cv',
					'subtitle'=>'Change Your Download CV Text.',
					'type'=>'text',
					'default'=> 'Download CV',
				),
				array(
					'title'=>'Download CV Button Text',
					'id'=>'download_cv',
					'subtitle'=>'Change Your Download CV Text.',
					'type'=>'text',
					'default'=> 'Download CV',
				),
			)
    ) );

	// -> START Stylish Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Stylish Options', 'hobi' ),
        'id'               => 'style_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'upload your Custom CSS', 'hobi' ),
					'id'=>'custom_css',
					'desc'    => __( 'upload your Custom CSS', 'hobi' ),
					'type'=>'ace_editor',
					'mode'=>'css',
					),
					
				)
			)
    ) ;
	
	// -> START About Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'About Options', 'hobi' ),
        'id'               => 'about_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your About Us', 'hobi' ),
					'id'=> 'about_us',
					'desc'    => __( 'Change your About Us Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'About Us',
					),
				)
			)
    ) ;	
	// -> START Skill Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Skill Options', 'hobi' ),
        'id'               => 'skill_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Skill', 'hobi' ),
					'id'=> 'my_skill',
					'desc'    => __( 'Change your Skills Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'My Skill',
					),
				)
			)
    ) ;
	// -> START Service Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Service Options', 'hobi' ),
        'id'               => 'service_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Services', 'hobi' ),
					'id'=> 'my_service',
					'desc'    => __( 'Change your Service Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'My Service',
					),
				)
			)
    ) ;
	// -> START Portfolio Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Portfolio Options', 'hobi' ),
        'id'               => 'portfolio_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Portfolio', 'hobi' ),
					'id'=> 'my_portfolio',
					'desc'    => __( 'Change your Portfolio Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'My Portfolio',
					),
				array(
					'title'    => __( 'Change your work', 'hobi' ),
					'id'=> 'portfolio_work',
					'desc'    => __( 'Change your work Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Work',
					),
				array(
					'title'    => __( 'Change your Cool Stuffs', 'hobi' ),
					'id'=> 'portfolio_cool',
					'desc'    => __( 'Change your Cool Stuffs Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Cool Stuffs',
					),
				)
			)
    ) ;
	// -> START Team Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Team Options', 'hobi' ),
        'id'               => 'team_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Team', 'hobi' ),
					'id'=> 'my_team',
					'desc'    => __( 'Change your Team Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'My Team',
					),
				)
			)
    ) ;
	// -> START Blog Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Blog Options', 'hobi' ),
        'id'               => 'blog_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Blog', 'hobi' ),
					'id'=> 'my_blog',
					'desc'    => __( 'Change your Blog Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'News Feeds',
					),
				array(
					'title'    => __( 'Change your Blog Page Title', 'hobi' ),
					'id'=> 'my_title',
					'desc'    => __( 'Change your Blog title Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'News',
					),
				)
			)
    ) ;
	// -> START Contact Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact Options', 'hobi' ),
        'id'               => 'contact_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Contact Us', 'hobi' ),
					'id'=> 'contact_us',
					'desc'    => __( 'Change your Contact Us Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Contact us',
					),
				)
			)
    ) ;
	// -> START Experience Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Experience Options', 'hobi' ),
        'id'               => 'experience_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Experience', 'hobi' ),
					'id'=> 'experience',
					'desc'    => __( 'Change your Experience Us Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Experience',
					),
				array(
					'title'    => __( 'Change your Experience', 'hobi' ),
					'id'=> 'experience_big',
					'desc'    => __( 'Change your Experience Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Working Closely We Engineers',
					),
				)
			)
    ) ;
	
	// -> START Education Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Education Options', 'hobi' ),
        'id'               => 'education_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change My Qualification', 'hobi' ),
					'id'=> 'education_span',
					'desc'    => __( 'Change My Qualification Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'My Qualification',
					),
				array(
					'title'    => __( 'Change My Qualification', 'hobi' ),
					'id'=> 'educatin_title',
					'desc'    => __( 'Change My Qualification Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Education',
					),
				)
			)
    ) ;
	
	
	// -> START Testimonial Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Testimonial Options', 'hobi' ),
        'id'               => 'testimonial_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change My Testimonial', 'hobi' ),
					'id'=> 'testimonial_span',
					'desc'    => __( 'Change My Testimonial Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Testimonial',
					),
				array(
					'title'    => __( 'Change My Testimonial', 'hobi' ),
					'id'=> 'sweet_client',
					'desc'    => __( 'Change My Testimonial Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Sweet Clients',
					),
				)
			)
    ) ;
	
	// -> START Any Project On Your Mind Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Any Project', 'hobi' ),
        'id'               => 'anyproject_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change Any Project', 'hobi' ),
					'id'=> 'any_span',
					'desc'    => __( 'Change Any Project Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Any Project On Your Mind',
					),
				array(
					'title'    => __( 'Change Any Project', 'hobi' ),
					'id'=> 'anyproject_big',
					'desc'    => __( 'Change Any Project Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Any Project On Your Mind.',
					),
				
				array(
					'title'    => __( 'Change Get A Quote', 'hobi' ),
					'id'=> 'get_qute',
					'desc'    => __( 'Change Any Project Get A Quote Text', 'hobi' ),
					'type' => 'text',
					'default' => 'Get A Quote',
					),
				
				array(
					'title'    => __( 'Change Get A Quote button Link', 'hobi' ),
					'id'=> 'get_qute_link',
					'desc'    => __( 'Change Any Project Get A Quote Link', 'hobi' ),
					'type' => 'text',
					'default' => 'alorchokh@gmail.com/',
					),
					
				array(
					'title'    => __( 'Change Give A Mail', 'hobi' ),
					'id'=> 'giv_mail',
					'desc'    => __( 'Change Any Project Give A Mail Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Give A Mail',
					),
					
				array(
					'title'    => __( 'Change Give A Mail Link', 'hobi' ),
					'id'=> 'giv_mail_link',
					'desc'    => __( 'Change Any Project Give A Mail Link', 'hobi' ),
					'type'=>'text',
					'default'=> 'alorchokh@gmail.com/',
					),
				)
			)
    ) ;
	
	// -> START Footer Options
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Options', 'hobi' ),
        'id'               => 'footer_option',
        'icon'             => 'el el-laptop',
        'fields'           => array(
				array(
					'title'    => __( 'Change your Footer Logo Text', 'hobi' ),
					'id'=> 'footer_logo',
					'desc'    => __( 'Change your Footer Logo Text', 'hobi' ),
					'subtitle'    => __( 'Change your Footer Logo Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Hobi',
					),
				array(
					'title'    => __( 'Change your Footer Text', 'hobi' ),
					'id'=> 'footer_text',
					'subtitle'    => __( 'Change your Footer Logo button Text', 'hobi' ),
					'desc'    => __( 'Change your Footer Logo Text', 'hobi' ),
					'type'=>'text',
					'default'=> 'Minimal & Crative Portfolio/CV/Biodata Solution in One Platform.',
					),
				array(
					'title'    => __( 'Digital Designer Text', 'hobi' ),
					'id'=> 'footer_digital',
					'subtitle'    => __( 'Change your Footer Digital Designer Text', 'hobi' ),
					'desc'    => __( 'Change your Footer Digital Designer Text', 'hobi' ),
					'type'=>'editor',
					'default'=> 'I’m a digital designer living in United States. Apart from eating burger',
					),
					
				)
			)
    ) ;



	
	

    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */

    /**
     * Custom function for the callback referenced above
     */

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */


    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

