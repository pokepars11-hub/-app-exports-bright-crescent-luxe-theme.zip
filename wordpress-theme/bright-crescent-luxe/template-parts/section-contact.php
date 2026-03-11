<?php
/**
 * Contact preview section.
 *
 * @package bright-crescent-luxe
 */
?>
<section class="bct-section bct-container bct-contact-preview" data-testid="home-contact-preview-section">
    <div>
        <p class="bct-section-tag">Locations</p>
        <h2>Visit our Shop and Office in UAE.</h2>
        <p><strong>Shop:</strong> <?php echo esc_html(bct_get_theme_option('bct_shop_address', '[Add Shop Address], UAE')); ?></p>
        <p><strong>Office:</strong> <?php echo esc_html(bct_get_theme_option('bct_office_address', '[Add Office Address], UAE')); ?></p>
    </div>
    <div>
        <a class="bct-btn bct-btn-outline-dark" href="<?php echo esc_url(home_url('/contact-us')); ?>" data-testid="home-contact-preview-button">Open Contact Page</a>
    </div>
</section>
