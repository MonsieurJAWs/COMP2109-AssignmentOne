<!doctype html>
<!-- PHP hook, functions we don't edit but call on, in which no matter which language we choose, it will change automatically -->
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <!-- add the javaScript -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- add the custom css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo esc_url( home_url('wp-content/themes/customtheme/assets/css/custom-styles.css')); ?>">
        <!-- add the jcustom fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <!-- this php hook lets us target the page, allowing us to target the page individually -->
    <body <?php body_class(); ?>>
        <header>
            <div>
                <a href="<?php echo esc_url( home_url() ); ?>">
                    <img src="<?php echo esc_url( home_url( 'wp-content/uploads/2024/01/logo-1.png' ) ); ?>" alt="header logo">
                </a>
            </div>
            <!-- use a php hook to load the nav into wordpress -->
            <nav>
                <?php
                    wp_nav_menu( array(
                        'menu' => 'main',
                        'theme_location' => '',
                        // two dropdowns
                        'depth' => 2,
                        'fallback_cb' => false
                    ));
                ?>
            </nav>
        </header>