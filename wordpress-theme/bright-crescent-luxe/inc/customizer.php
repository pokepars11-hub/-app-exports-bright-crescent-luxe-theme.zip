<?php
/**
 * Customizer options for editable sections.
 *
 * @package bright-crescent-luxe
 */

if (! defined('ABSPATH')) {
    exit;
}

function bct_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section('bct_header_section', [
        'title'    => __('Header Settings', 'bright-crescent-luxe'),
        'priority' => 20,
    ]);

    $wp_customize->add_setting('bct_header_tagline', [
        'default'           => 'BRIGHT CRESCENT TRADING CO LLC',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_header_tagline', [
        'label'   => __('Header Tagline', 'bright-crescent-luxe'),
        'section' => 'bct_header_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_header_button_text', [
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_header_button_text', [
        'label'   => __('Header Button Text', 'bright-crescent-luxe'),
        'section' => 'bct_header_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_header_button_url', [
        'default'           => '/contact-us',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('bct_header_button_url', [
        'label'   => __('Header Button URL', 'bright-crescent-luxe'),
        'section' => 'bct_header_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_section('bct_hero_section', [
        'title'    => __('Hero Section', 'bright-crescent-luxe'),
        'priority' => 21,
    ]);

    $wp_customize->add_setting('bct_hero_title', [
        'default'           => 'Bright Crescent Trading Co LLC',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_hero_title', [
        'label'   => __('Hero Title', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_hero_subtitle', [
        'default'           => 'Premium trading in appliances, crystal craft, and precision spare parts.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('bct_hero_subtitle', [
        'label'   => __('Hero Subtitle', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('bct_hero_primary_text', [
        'default'           => 'Contact Us',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_hero_primary_text', [
        'label'   => __('Primary Button Text', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_hero_primary_url', [
        'default'           => '/contact-us',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('bct_hero_primary_url', [
        'label'   => __('Primary Button URL', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('bct_hero_secondary_text', [
        'default'           => 'Explore Products',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_hero_secondary_text', [
        'label'   => __('Secondary Button Text', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_hero_secondary_url', [
        'default'           => '/appliances-products',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('bct_hero_secondary_url', [
        'label'   => __('Secondary Button URL', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_setting('bct_hero_bg', [
        'default'           => bct_default_image('hero.jpg'),
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bct_hero_bg', [
        'label'   => __('Hero Background Image', 'bright-crescent-luxe'),
        'section' => 'bct_hero_section',
    ]));

    $wp_customize->add_section('bct_about_section', [
        'title'    => __('About Section', 'bright-crescent-luxe'),
        'priority' => 22,
    ]);

    $wp_customize->add_setting('bct_about_title', [
        'default'           => 'A trusted trading partner with premium standards.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_about_title', [
        'label'   => __('About Title', 'bright-crescent-luxe'),
        'section' => 'bct_about_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_about_text', [
        'default'           => 'Bright Crescent Trading Co LLC serves retail and commercial clients across UAE with carefully selected appliances, elegant crystal products, and dependable spare parts solutions.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('bct_about_text', [
        'label'   => __('About Text', 'bright-crescent-luxe'),
        'section' => 'bct_about_section',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('bct_about_image', [
        'default'           => bct_default_image('about.jpg'),
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bct_about_image', [
        'label'   => __('About Image', 'bright-crescent-luxe'),
        'section' => 'bct_about_section',
    ]));

    $wp_customize->add_section('bct_cta_section', [
        'title'    => __('CTA Section', 'bright-crescent-luxe'),
        'priority' => 23,
    ]);

    $wp_customize->add_setting('bct_cta_title', [
        'default'           => 'Need premium product sourcing support?',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_cta_title', [
        'label'   => __('CTA Title', 'bright-crescent-luxe'),
        'section' => 'bct_cta_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_cta_text', [
        'default'           => 'Connect with our team for product catalogs, pricing details, and partnership opportunities.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('bct_cta_text', [
        'label'   => __('CTA Description', 'bright-crescent-luxe'),
        'section' => 'bct_cta_section',
        'type'    => 'textarea',
    ]);

    $wp_customize->add_setting('bct_cta_button_text', [
        'default'           => 'Get in Touch',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_cta_button_text', [
        'label'   => __('CTA Button Text', 'bright-crescent-luxe'),
        'section' => 'bct_cta_section',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('bct_cta_button_url', [
        'default'           => '/contact-us',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('bct_cta_button_url', [
        'label'   => __('CTA Button URL', 'bright-crescent-luxe'),
        'section' => 'bct_cta_section',
        'type'    => 'url',
    ]);

    $wp_customize->add_section('bct_contact_details', [
        'title'    => __('Contact Details', 'bright-crescent-luxe'),
        'priority' => 24,
    ]);

    $contact_fields = [
        'bct_shop_address'  => ['Shop Address', '[Add Shop Address], UAE'],
        'bct_shop_phone'    => ['Shop Phone', '[Add Shop Phone]'],
        'bct_shop_email'    => ['Shop Email', 'shop@brightcrescenttrading.com'],
        'bct_office_address'=> ['Office Address', '[Add Office Address], UAE'],
        'bct_office_phone'  => ['Office Phone', '[Add Office Phone]'],
        'bct_office_email'  => ['Office Email', 'office@brightcrescenttrading.com'],
    ];

    foreach ($contact_fields as $key => $meta) {
        $wp_customize->add_setting($key, [
            'default'           => $meta[1],
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control($key, [
            'label'   => __($meta[0], 'bright-crescent-luxe'),
            'section' => 'bct_contact_details',
            'type'    => 'text',
        ]);
    }

    $wp_customize->add_section('bct_footer_section', [
        'title'    => __('Footer Settings', 'bright-crescent-luxe'),
        'priority' => 25,
    ]);

    $wp_customize->add_setting('bct_footer_text', [
        'default'           => 'Bright Crescent Trading Co LLC. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('bct_footer_text', [
        'label'   => __('Footer Text', 'bright-crescent-luxe'),
        'section' => 'bct_footer_section',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'bct_customize_register');
