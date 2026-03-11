<?php
/**
 * Footer template.
 *
 * @package bright-crescent-luxe
 */

if (! defined('ABSPATH')) {
    exit;
}
?>
</main>

<footer class="bct-footer" data-testid="site-footer">
    <div class="bct-footer-bottom" data-testid="footer-bottom">
        <div class="bct-container bct-footer-bottom-inner">
            <p><?php echo esc_html(bct_get_theme_option('bct_footer_text', 'Bright Crescent Trading Co LLC. All rights reserved.')); ?></p>
            <nav data-testid="footer-navigation">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'fallback_cb'    => '__return_empty_string',
                    'menu_class'     => 'bct-footer-nav',
                ]);
                ?>
            </nav>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
