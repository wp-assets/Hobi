<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = 'hobi';

//
// Create options
//
CSF::createOptions( $prefix, array(
  'menu_title' => 'HOBI Options',
  'menu_slug'  => 'hobi-option',
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
  'title'  => 'Header Options',
  'icon'   => 'fa fa-rocket',
  'fields' => array(
      array(
        'id'    => 'opt-upload',
        'type'  => 'media',
        'title' => 'Upload Logo',
  	  'preview' => true,
  	  'url'   => false,
  	  'library' => 'image',
  	  'default' => array(
  		'url' => get_template_directory_uri().'/img/logo/iman-logo.png' ,
  	  ),
    ),
	
	array(
	  'title' => 'Change Download CV Button text',
	  'type'  => 'text',
	  'id'    => 'down_text',
	  'default' => 'Download CV',
	)

  )
) );



//
// Field: textarea
//
CSF::createSection( $prefix, array(
  'parent'      => 'basic_fields',
  'title'       => 'Textarea',
  'icon'        => 'fa fa-square-o',
  'description' => 'Visit documentation for more details on this field',
  'fields'      => array(

    array(
      'id'    => 'opt-textarea-1',
      'type'  => 'textarea',
      'title' => 'Textarea',
    ),

  )
) );


//
// Field: backup
//
CSF::createSection( $prefix, array(
  'title'       => 'Backup',
  'icon'        => 'fa fa-shield',
  'description' => '',
  'fields'      => array(

    array(
      'type' => 'backup',
    ),

  )
) );


