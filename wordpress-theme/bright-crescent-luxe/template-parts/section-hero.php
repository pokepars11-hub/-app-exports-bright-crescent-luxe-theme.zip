<?php
/**
 * Hero section.
 *
 * @package bright-crescent-luxe
 */

$hero_bg = bct_get_theme_option('bct_hero_bg', bct_default_image('hero.jpg'));
?>
<section class="bct-hero" style="background-image: linear-gradient(to bottom, rgba(2,16,36,0.58), rgba(2,16,36,0.2)), url('<?php echo esc_url($hero_bg); ?>');" data-testid="home-hero-section">
    <div class="bct-container bct-hero-inner">
        <p class="bct-section-tag"><?php echo esc_html(bct_get_theme_option('bct_header_tagline', 'BRIGHT CRESCENT TRADING CO LLC')); ?></p>
        <h1 data-testid="home-hero-title"><?php echo esc_html(bct_get_theme_option('bct_hero_title', 'Bright Crescent Trading Co LLC')); ?></h1>
        <p class="bct-hero-sub" data-testid="home-hero-subtitle"><?php echo esc_html(bct_get_theme_option('bct_hero_subtitle', 'Premium trading in appliances, crystal craft, and precision spare parts.')); ?></p>
        <div class="bct-hero-cta-group">
            <a class="bct-btn bct-btn-gold" href="<?php echo esc_url(bct_get_theme_option('bct_hero_primary_url', '/contact-us')); ?>" data-testid="home-hero-primary-button">
                <?php echo esc_html(bct_get_theme_option('bct_hero_primary_text', 'Contact Us')); ?>
            </a>
            <a class="bct-btn bct-btn-outline" href="<?php echo esc_url(bct_get_theme_option('bct_hero_secondary_url', '/appliances-products')); ?>" data-testid="home-hero-secondary-button">
                <?php echo esc_html(bct_get_theme_option('bct_hero_secondary_text', 'Explore Products')); ?>
            </a>
        </div>
    </div>
</section>
