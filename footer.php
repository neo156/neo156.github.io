    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-title"><?php echo get_bloginfo('name'); ?></h3>
                <p class="footer-description"><?php echo get_theme_mod('footer_description', 'Creating digital experiences with passion and precision. Always learning, always growing.'); ?></p>
                <div class="footer-social">
                    <a href="<?php echo get_theme_mod('youtube_url'); ?>"><i class="fa-brands fa-youtube"></i></a>
                    <a href="<?php echo get_theme_mod('github_url'); ?>"><i class="fa-brands fa-github"></i></a>
                    <a href="<?php echo get_theme_mod('instagram_url'); ?>"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo get_theme_mod('facebook_url'); ?>"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Quick Links</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container_class' => 'footer-links'
                ));
                ?>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Contact</h3>
                <ul class="footer-contact">
                    <li><i class="fas fa-envelope"></i> <?php echo get_theme_mod('email'); ?></li>
                    <li><i class="fas fa-map-marker-alt"></i> <?php echo get_theme_mod('location', 'Davao Oriental, Philippines'); ?></li>
                    <li><i class="fas fa-phone"></i> <?php echo get_theme_mod('phone', 'Available upon request'); ?></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?> | All rights reserved</p>
            <p class="footer-signature">Designed & Built with <i class="fas fa-heart"></i> by <?php echo get_theme_mod('author_name', 'Niño Espe'); ?></p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html> 