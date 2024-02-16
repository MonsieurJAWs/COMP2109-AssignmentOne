<?php 
/**
 * Template Name: Homepage Classic & Blocks
 * Template Post Type: page
 */
    get_header();
    // if statement to see if any content is to be had. note that the syntax is different than what we normally use. this is just the wordpress way
    if(have_posts()) : while (have_posts()) : the_post();
    the_content();
    endwhile; else:
?>
<p>Sorry, no content found.</p>
<?php 
    endif;
    get_footer();
?>