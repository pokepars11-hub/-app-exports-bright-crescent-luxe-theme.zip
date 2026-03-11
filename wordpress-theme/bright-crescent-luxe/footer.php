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
    <div class="bct-container bct-footer-grid">
        <section data-testid="footer-company-block">
            <p class="bct-footer-label">Bright Crescent</p>
            <h3 class="bct-footer-title"><?php bloginfo('name'); ?></h3>
            <p class="bct-footer-text"><?php echo esc_html(get_bloginfo('description')); ?></p>
        </section>

        <section data-testid="footer-shop-block">
            <p class="bct-footer-label">Shop</p>
            <p><?php echo esc_html(bct_get_theme_option('bct_shop_address', '[Add Shop Address], UAE')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_shop_phone', '[Add Shop Phone]')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_shop_email', 'shop@brightcrescenttrading.com')); ?></p>
        </section>

        <section data-testid="footer-office-block">
            <p class="bct-footer-label">Office</p>
            <p><?php echo esc_html(bct_get_theme_option('bct_office_address', '[Add Office Address], UAE')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_office_phone', '[Add Office Phone]')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_office_email', 'office@brightcrescenttrading.com')); ?></p>
        </section>
    </div>

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
