        <footer class="text-center p-3">
            <section class="top-footer">
                
                <div class="first widget-area">
                    <a href="<?php echo esc_url( home_url() ); ?>">
                        <?php dynamic_sidebar('footer-widget-area-one'); ?>
                    </a>
                </div>

                <div class="second widget-area">
                    <?php dynamic_sidebar('footer-widget-area-two'); ?>
                </div>

                <div class="third widget-area">
                    <?php dynamic_sidebar('footer-widget-area-three'); ?>
                </div>

            </section>
        </footer>
    </body>
</html>