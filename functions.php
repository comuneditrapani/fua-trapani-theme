<?php

add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);

function enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style')  );
}

//add_action( 'wp_enqueue_scripts', 'mio_tema_child_enqueue_styles', PHP_INT_MAX );

function mio_tema_child_enqueue_styles() {
    // Carica CSS di Bootstrap Italia
    wp_enqueue_style( 'bootstrap-italia-css', get_stylesheet_directory_uri() . '/assets/css/bootstrap-italia-comuni.min.css' );
    // Carica JS di Bootstrap Italia
    wp_enqueue_script( 'bootstrap-italia-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap-italia.min.js', array(), null, true );
}

?>

