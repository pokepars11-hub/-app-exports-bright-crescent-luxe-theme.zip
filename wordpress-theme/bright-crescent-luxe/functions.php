<?php
/**
 * Bright Crescent Luxe theme functions.
 *
 * @package bright-crescent-luxe
 */

if (! defined('ABSPATH')) {
    exit;
}

define('BCT_THEME_VERSION', '1.0.0');

require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/default-content.php';

function bct_theme_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 280,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');

    register_nav_menus([
        'primary_menu' => __('Primary Menu', 'bright-crescent-luxe'),
        'footer_menu'  => __('Footer Menu', 'bright-crescent-luxe'),
    ]);
}
add_action('after_setup_theme', 'bct_theme_setup');

function bct_enqueue_assets(): void
{
    wp_enqueue_style('bct-theme-style', get_stylesheet_uri(), [], BCT_THEME_VERSION);
    wp_enqueue_script('bct-theme-script', get_template_directory_uri() . '/assets/js/theme.js', [], BCT_THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'bct_enqueue_assets');

function bct_register_widget_areas(): void
{
    register_sidebar([
        'name'          => __('Footer Column One', 'bright-crescent-luxe'),
        'id'            => 'footer-col-1',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ]);

    register_sidebar([
        'name'          => __('Footer Column Two', 'bright-crescent-luxe'),
        'id'            => 'footer-col-2',
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'bct_register_widget_areas');

function bct_elementor_support(): void
{
    if (did_action('elementor/loaded')) {
        add_post_type_support('page', 'excerpt');
    }
}
add_action('after_setup_theme', 'bct_elementor_support');

function bct_elementor_register_locations($elementor_theme_manager): void
{
    if (! $elementor_theme_manager) {
        return;
    }

    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'bct_elementor_register_locations');

function bct_get_theme_option(string $key, string $fallback = ''): string
{
    $value = get_theme_mod($key, $fallback);
    return is_string($value) ? $value : $fallback;
}

function bct_default_image(string $image_name): string
{
    return get_template_directory_uri() . '/assets/images/' . $image_name;
}

function bct_handle_contact_form_submission(): void
{
    if (! isset($_POST['bct_contact_nonce']) || ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['bct_contact_nonce'])), 'bct_contact_action')) {
        wp_safe_redirect(add_query_arg('contact_status', 'invalid_nonce', wp_get_referer()));
        exit;
    }

    $name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $comment = isset($_POST['comment']) ? sanitize_textarea_field(wp_unslash($_POST['comment'])) : '';

    if (empty($name) || empty($email) || empty($comment) || ! is_email($email)) {
        wp_safe_redirect(add_query_arg('contact_status', 'invalid', wp_get_referer()));
        exit;
    }

    $post_id = wp_insert_post([
        'post_type'   => 'bct_inquiry',
        'post_status' => 'publish',
        'post_title'  => sprintf(__('Inquiry from %s', 'bright-crescent-luxe'), $name),
        'post_content' => $comment,
        'meta_input'  => [
            '_bct_inquiry_name'  => $name,
            '_bct_inquiry_email' => $email,
            '_bct_inquiry_time'  => current_time('mysql'),
        ],
    ]);

    if ($post_id && ! is_wp_error($post_id)) {
        $admin_email = get_option('admin_email');
        $subject = __('New Bright Crescent Website Inquiry', 'bright-crescent-luxe');
        $message = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$comment}";
        wp_mail($admin_email, $subject, $message);

        wp_safe_redirect(add_query_arg('contact_status', 'success', wp_get_referer()));
        exit;
    }

    wp_safe_redirect(add_query_arg('contact_status', 'error', wp_get_referer()));
    exit;
}
add_action('admin_post_nopriv_bct_contact_submit', 'bct_handle_contact_form_submission');
add_action('admin_post_bct_contact_submit', 'bct_handle_contact_form_submission');

function bct_contact_notice(): void
{
    $status = isset($_GET['contact_status']) ? sanitize_text_field(wp_unslash($_GET['contact_status'])) : '';

    if (! $status) {
        return;
    }

    $messages = [
        'success'      => __('Thank you. Your message has been submitted.', 'bright-crescent-luxe'),
        'invalid'      => __('Please provide valid Name, Email, and Comment.', 'bright-crescent-luxe'),
        'invalid_nonce'=> __('Security check failed. Please retry.', 'bright-crescent-luxe'),
        'error'        => __('Unable to submit right now. Please try again.', 'bright-crescent-luxe'),
    ];

    if (! isset($messages[$status])) {
        return;
    }

    printf(
        '<div class="bct-contact-notice bct-notice-%1$s" data-testid="contact-form-status-message">%2$s</div>',
        esc_attr($status),
        esc_html($messages[$status])
    );
}
