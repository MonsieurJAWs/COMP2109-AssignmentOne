<?php
/**
* Template Name: Single Post Template
* Template Post Type: post
*/
get_header();
// make a variable called featured image
$featuredImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<section class="post-masthead" style="background: url('<?php echo $featuredImg[0]; ?>');">
    <div>
        <h1><?php the_title(); ?></h1>
    </div>
</section>

<section class="row">
    <!-- This will display our single post content -->
    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php echo get_the_content(); ?>
        <p><?php echo get_the_date(); ?></p>
        <p><?php echo the_tags(); ?></p>
        <p><?php echo the_category(',', '', get_the_ID()); ?></p>
    </div>
    <!-- This will display our other posts -->
    <div class="post_list col-sm-12 col-md-4 col-lg-4">
        <?php
            // define our WP Query Parameters
            $the_query = new WP_Query('posts_per_page=3');
            // start our WP Query
            while ($the_query -> have_posts()) : $the_query -> the_post();
        ?>
        <article>
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo $featuredImg[0]; ?>" alt="post featured image">
            </a>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php echo the_excerpt(); ?>
        </article>
        <?php
            // end the while loop
            endwhile;
            wp_reset_postdata();
        ?>
    </div>
</section>

<?php 
get_footer();
?>