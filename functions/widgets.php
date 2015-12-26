<?php

function hrm_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'hrm' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'hrm' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Footer', 'hrm' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'hrm' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm-4">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );
  register_sidebar( array(
    'name'            => __( 'Footer 2', 'hrm' ),
    'id'              => 'footer-widget-area-2',
    'description'     => __( 'The footer widget area (middle of footer)', 'hrm' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm-4">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );
  register_sidebar( array(
    'name'            => __( 'Footer 3', 'hrm' ),
    'id'              => 'footer-widget-area-3',
    'description'     => __( 'The footer widget area (right of footer)', 'hrm' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm-4">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'hrm_widgets_init' );