<!doctype html>
<!-- A PHP Hook that dynamically changes the language based on the one we choose -->
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
        <!-- add the bootstrap css and custom css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo esc_url( home_url('wp-content/themes/assignmentOne/assets/css/customStyles.css')); ?>">
        <!-- add the jcustom fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <!-- add the javaScript. jquery and bootstrap js -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous" defer></script>
    </head>
    <!-- this php hook lets us target the page, allowing us to target the page individually -->
    <body <?php body_class(); ?>>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <!-- Add link to personal logo -->
                    <a class="navbar-brand" href="/profile"><img src="<?php echo esc_url( home_url( 'wp-content/uploads/2024/02/PersonalLogo.png' ) ); ?>" alt="header logo" height="100" width="100" class="d-inline-block align-top">
                    </a>
                    <!-- Hamburger Button for mobile -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- enable hamburger -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo esc_url( home_url() ); ?>"></a>
                        </li>
                    </ul>
            <!-- use a php hook to load the nav into wordpress -->
                <?php
                    wp_nav_menu( array(
                        'menu' => 'main',
                        'theme_location' => '',
                        // two dropdowns
                        'depth' => 2,
                        'fallback_cb' => false
                    ));
                ?>
                </div>
                </div>
            </nav>
        </header>