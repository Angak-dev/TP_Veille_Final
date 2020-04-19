<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; 
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version'));
    wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/mjs/main.js', NULL, 1.0, true);
}


////////////////////////////////////////////////////////////////////// 

/* 
 Permet d'adapter la requête principale avant qu'elle
 ne s'exécute.
- La liste de cours pourra s'afficher entièrement sur un page
- Elle sera triée selon le titre des cours
- En ordre ascendant
 */ 

///////////////////////////////////////////////////////// catégorie  cours
function extraire_cours( $query ) {
   if ($query->is_category('cours'))
   {
      $query->set( 'posts_per_page', -1 );
      $query->set( 'orderby', 'title' );
      $query->set( 'order', 'asc' );
   }
}
add_action( 'pre_get_posts', 'extraire_cours' );

///////////////////////////////////////////////////////// catégorie  evenements
function extraire_evenement( $query ) {
   if (!is_home() && $query->is_category('evenement'))
   {
      $query->set( 'posts_per_page', -1 );
      $query->set( 'orderby', 'date' );
      $query->set( 'order', 'asc' );
   }
}
add_action( 'pre_get_posts', 'extraire_evenement' );

///////////////////////////////////////////////////////// catégorie  atelier
function extraire_atelier( $query ) {
   if ($query->is_category('atelier'))
   {
      $query->set( 'posts_per_page', -1 );
   }
}
add_action( 'pre_get_posts', 'extraire_atelier' );

