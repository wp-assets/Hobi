<?php

function hobi_custom_sidebar(){
    register_sidebar(array(
        'name' => 'Footer Widget1',    
        'description' => 'Footer Widget one',    
        'id' => 'footer_widget1',    
        'before_widget' => '<div class="single-widget">', 
        'after_widget' => '</div>', 
        'before_title' => '<span>',
        'after_title' => '</span>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget2',    
        'description' => 'Footer Widget two',    
        'id' => 'footer_widget2',    
        'before_widget' => '<div class="single-widget">', 
        'after_widget' => '</div>', 
        'before_title' => '<span>',
        'after_title' => '</span>',
    ));
    register_sidebar(array(
        'name' => 'Footer Widget3',    
        'description' => 'Footer Widget three',    
        'id' => 'footer_widget3',    
        'before_widget' => '<div class="single-widget">', 
        'after_widget' => '</div>', 
        'before_title' => '<span>',
        'after_title' => '</span>',
    ));

    register_sidebar(array(
        'name' => 'Contact Widget',    
        'description' => 'Contact Widget three',    
        'id' => 'contact-widget',    
        'before_widget' => '<div class="contact-from">', 
        'after_widget' => '</div>', 
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'hobi_custom_sidebar');
?>