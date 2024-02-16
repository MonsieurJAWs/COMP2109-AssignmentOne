        <footer>
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

                <div class="fourth widget-area">
                    <?php dynamic_sidebar('footer-widget-area-four'); ?>
                </div>

            </section>
        </footer>
    </body>
</html>