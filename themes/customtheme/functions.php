<?php
// the navigation bar
function mytheme_theme_setup() {
    // register navigation
    register_nav_menus( array (
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}
// need to add the action
add_action( 'after_setup_theme', 'mytheme_theme_setup' );
// any mistakes here in this file will break the entire website. they need to be fixed before the site will load
// add our featured image support for our posts
add_theme_support( 'post-thumbnails' );

// set up our own custom footer widgets
// function names can be named anything we want.
// register_sidebar is a php hook and the name is already determined for wordpress
function cmsclass_widgets_init() {
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area One', 'cmsclass' ),
        'id' => 'footer-widget-area-one',
        'description' => __( 'The First Widget Area', 'cmsclass' ),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Two', 'cmsclass' ),
        'id' => 'footer-widget-area-two',
        'description' => __( 'The Second Widget Area', 'cmsclass' ),
        'before_widget' => '<div class="about-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Three', 'cmsclass' ),
        'id' => 'footer-widget-area-three',
        'description' => __( 'The Third Widget Area', 'cmsclass' ),
        'before_widget' => '<div class="menu-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Four', 'cmsclass' ),
        'id' => 'footer-widget-area-four',
        'description' => __( 'The Fourth Widget Area', 'cmsclass' ),
        'before_widget' => '<div class="contact-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'cmsclass_widgets_init' );

// our custom plugin
function retro_game_init() {
    $args = array(
        'label' => 'Retro Games',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'taxonomies' => array( 'category' ),
        'hierarchical' => 'false',
        'query_var' => true,
        'menu_icon' => 'dashicons-album',
        'supports' => array(
            'title',
            'editor',
            'excerpts',
            'trackbacks',
            'comments',
            // thumbmail and author should be there
            'thumbnail',
            'author',
            'post-formats',
            'page-attributes',
        )
    );
    register_post_type('retroGames', $args);
}
add_action('init', 'retro_game_init');

// our plugin shortcode
function retro_game_shortcode() {
    // query variable that holds post type, order, and how many. asc = ascending
    $query = new WP_Query(array('post_type' => 'retroGames', 'post_per_page' => 8, 'order' => 'asc'));
    while ($query -> have_posts()) : $query -> the_post();
    ?>
    <div class="retro-game-container">
        <div>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        </div>
        <div>
            <h4><?php the_title(); ?></h4>
            <?php the_content(); ?>
            <p><a href="<?php the_permalink(); ?>">Learn More</a></p>
        </div>
    </div>
    <!-- WordPress equilavent of closing our database connection -->
    <?php wp_reset_postdata();
    endwhile;
}
// don't need action or register function for shortcode. it's a php hook for wordPress. first value is the name of the shortcode, the second is the name of our function
add_shortcode('retroGames', 'retro_games_shortcode');
?>