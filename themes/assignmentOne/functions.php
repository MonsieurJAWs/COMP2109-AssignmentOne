<?php
// the navigation bar
function assignmentOne_setup_theme() {
    // register navigation
    register_nav_menus( array (
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}

// need to add the action
add_action( 'after_setup_theme', 'assignmentOne_setup_theme' );
// any mistakes here in this file will break the entire website. they need to be fixed before the site will load
// add our featured image support for our posts
add_theme_support( 'post-thumbnails' );

// set up our own custom footer widgets
// function names can be named anything we want.
// register_sidebar is a php hook and the name is already determined for wordpress

function footerWidgets() {
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area One', 'footer' ),
        'id' => 'footer-widget-area-one',
        'description' => __( 'First Widget Area', 'Footer' ),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Two', 'footer' ),
        'id' => 'footer-widget-area-two',
        'description' => __( 'Second Widget Area', 'Footer' ),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array(
        'name' =>__( 'Footer Widget Area Three', 'footer' ),
        'id' => 'footer-widget-area-three',
        'description' => __( 'Third Widget Area', 'Footer' ),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>',
    ));
}
// widgets init to enable the footer widgets in the wordpress dashboard
add_action( 'widgets_init', 'footerWidgets' );

// custom plugin
function assignmentOne_profile() {
    // the args variable can be named anything you want
    $args = array(
        'label' => 'Assignment One Profile',
        'public' => true,
        'show_ui' => true,
        // you determine whether it makes a post or a page
        'capability_type' => 'post',
        // taxonomies can either be categories or tags
        'taxonomies' => array( 'category' ),
        // if capability type is page, set hieratchical to true
        'hierarchical' => 'false',
        'query_var' => true,
        // allows cusdtom icons
        'menu_icon' => 'dashicons-album',
        'supports' => array(
            'title',
            'editor',
            'excerpts',
            'trackbacks',
            'comments',
            'thumbnail',
            'author',
            'post-formats',
            'page-attributes',
        )
    );
    register_post_type('profile', $args);
}
add_action('init', 'assignmentOne_profile');

// plugin shortcode
function assignmentOne_shortcode() {
    // query variable that holds post type, order, and how many. asc = ascending
    $query = new WP_Query(array('post_type' => 'profile', 'post_per_page' => 8, 'order' => 'asc'));
    while ($query -> have_posts()) : $query -> the_post();
    ?>
    <div class="profile-container">
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
add_shortcode('profile', 'assignmentOne_shortcode');
?>