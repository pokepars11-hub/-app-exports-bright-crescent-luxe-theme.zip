<?php
/**
 * Template Name: Contact Page
 *
 * @package bright-crescent-luxe
 */

get_header();
?>
<section class="bct-section bct-container bct-contact-layout" data-testid="contact-page-template">
    <div class="bct-contact-info" data-testid="contact-info-panel">
        <p class="bct-section-tag">Contact & Locations</p>
        <h1 class="bct-page-title"><?php the_title(); ?></h1>
        <p><?php esc_html_e('Share your requirements for products, custom crystal requests, or technical spare parts sourcing.', 'bright-crescent-luxe'); ?></p>

        <div class="bct-contact-block" data-testid="shop-contact-block">
            <h3><?php esc_html_e('Shop', 'bright-crescent-luxe'); ?></h3>
            <p><?php echo esc_html(bct_get_theme_option('bct_shop_address', '[Add Shop Address], UAE')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_shop_phone', '[Add Shop Phone]')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_shop_email', 'shop@brightcrescenttrading.com')); ?></p>
        </div>

        <div class="bct-contact-block" data-testid="office-contact-block">
            <h3><?php esc_html_e('Office', 'bright-crescent-luxe'); ?></h3>
            <p><?php echo esc_html(bct_get_theme_option('bct_office_address', '[Add Office Address], UAE')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_office_phone', '[Add Office Phone]')); ?></p>
            <p><?php echo esc_html(bct_get_theme_option('bct_office_email', 'office@brightcrescenttrading.com')); ?></p>
        </div>
    </div>

    <div class="bct-contact-form-wrap" data-testid="contact-form-panel">
        <p class="bct-section-tag">Send Inquiry</p>
        <h2><?php esc_html_e('Contact Us', 'bright-crescent-luxe'); ?></h2>
        <?php bct_contact_notice(); ?>

        <form class="bct-contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" data-testid="contact-form">
            <input type="hidden" name="action" value="bct_contact_submit">
            <?php wp_nonce_field('bct_contact_action', 'bct_contact_nonce'); ?>

            <label for="name" data-testid="contact-name-label"><?php esc_html_e('Name', 'bright-crescent-luxe'); ?></label>
            <input id="name" type="text" name="name" required data-testid="contact-name-input">

            <label for="email" data-testid="contact-email-label"><?php esc_html_e('Email', 'bright-crescent-luxe'); ?></label>
            <input id="email" type="email" name="email" required data-testid="contact-email-input">

            <label for="comment" data-testid="contact-comment-label"><?php esc_html_e('Comment', 'bright-crescent-luxe'); ?></label>
            <textarea id="comment" name="comment" rows="6" required data-testid="contact-comment-input"></textarea>

            <button class="bct-btn bct-btn-gold bct-btn-block" type="submit" data-testid="contact-submit-button">
                <?php esc_html_e('Submit Inquiry', 'bright-crescent-luxe'); ?>
            </button>
        </form>
    </div>
</section>
<?php
get_footer();
