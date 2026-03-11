<?php
/**
 * About section.
 *
 * @package bright-crescent-luxe
 */

$about_img = bct_get_theme_option('bct_about_image', bct_default_image('about.jpg'));
?>
<section class="bct-section bct-container bct-about-grid" data-testid="home-about-section">
    <div>
        <p class="bct-section-tag">About Bright Crescent</p>
        <h2><?php echo esc_html(bct_get_theme_option('bct_about_title', 'A trusted trading partner with premium standards.')); ?></h2>
        <p><?php echo esc_html(bct_get_theme_option('bct_about_text', 'Bright Crescent Trading Co LLC serves retail and commercial clients across UAE with carefully selected appliances, elegant crystal products, and dependable spare parts solutions.')); ?></p>
    </div>
    <div class="bct-about-image-wrap" data-testid="home-about-image-wrap">
        <img src="<?php echo esc_url($about_img); ?>" alt="About Bright Crescent" data-testid="home-about-image">
    </div>
</section>
