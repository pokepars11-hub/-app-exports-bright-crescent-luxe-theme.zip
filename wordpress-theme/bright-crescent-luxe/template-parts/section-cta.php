<?php
/**
 * CTA section.
 *
 * @package bright-crescent-luxe
 */
?>
<section class="bct-section bct-container" data-testid="home-cta-section">
    <div class="bct-cta-box">
        <div>
            <p class="bct-section-tag">Partnership Opportunity</p>
            <h2><?php echo esc_html(bct_get_theme_option('bct_cta_title', 'Need premium product sourcing support?')); ?></h2>
            <p><?php echo esc_html(bct_get_theme_option('bct_cta_text', 'Connect with our team for product catalogs, pricing details, and partnership opportunities.')); ?></p>
        </div>
        <a class="bct-btn bct-btn-gold" href="<?php echo esc_url(bct_get_theme_option('bct_cta_button_url', '/contact-us')); ?>" data-testid="home-cta-button">
            <?php echo esc_html(bct_get_theme_option('bct_cta_button_text', 'Get in Touch')); ?>
        </a>
    </div>
</section>
