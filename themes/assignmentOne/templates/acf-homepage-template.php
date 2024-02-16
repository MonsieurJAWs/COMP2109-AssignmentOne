<?php 
/**
 * Template Name: Homepage Advanced custom fields
 * Template Post Type: page
 */
get_header();
?>
<main>
    <!-- inline css to use the image in ACF -->
    <section class="masthead" style="background-image: url('<?php echo wp_kses_post(get_field('masthead_image')); ?>')">
        <div>
            <h1><?php echo wp_kses_post(get_field('page_title')); ?></h1>
        </div>
    </section>
    <section class="homeIntro">
        <h2><?php echo wp_kses_post(get_field('row_title')); ?></h2>
        <p><?php echo wp_kses_post(get_field('row_one_text')); ?></p>
    </section>
    <section class="section_plugin_custom row">
        <?php echo do_shortcode("[profile]"); ?>
    </section>
</main>
<?php 
get_footer();
?>