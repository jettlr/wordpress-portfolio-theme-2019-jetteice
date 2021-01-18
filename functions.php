<?php
    // project post type function
    function create_posttype() {

        register_post_type('project',
        // options
            array(
                'labels' => array(
                'name' => __( 'Projects' )
                ),
                'supports' => array(
                    'thumbnail',
                    'title',
                    'editor',
                    'author'
                ),
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-portfolio',

            )
        );
    }

    // menu function
    function register_main_menu() {
      register_nav_menu( 'primary', __( 'Page Menu', 'header-nav' ) );
    }


    function taxonomies() {

    $labels = array(
        'name'                  => _x( 'Project types', 'taxonomy general name' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
    );
    register_taxonomy( 'project_type', array( 'project' ), $args );
    unset( $args );
    unset( $labels );


    $labels = array(
        'name'                  => _x( 'Project skills', 'taxonomy general name' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
    );
    register_taxonomy( 'project_skill', array( 'project' ), $args );
    }


    // run post type function
    add_action('init','create_posttype');

    // run menu function
    add_action( 'after_setup_theme', 'register_main_menu' );

    // run taxonomies
    add_action( 'init', 'taxonomies', 0 );

    add_theme_support('post-thumbnails');
    add_theme_support('post-formats');
    add_image_size( 'grid_thumbnail', 300, 300, true );
    add_image_size( 'single_large', 660, 400, true );
