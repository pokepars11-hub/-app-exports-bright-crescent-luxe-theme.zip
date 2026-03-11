<?php
/**
 * Register post types and taxonomies.
 *
 * @package bright-crescent-luxe
 */

if (! defined('ABSPATH')) {
    exit;
}

function bct_register_post_types(): void
{
    register_post_type('bct_news', [
        'labels' => [
            'name'          => __('News', 'bright-crescent-luxe'),
            'singular_name' => __('News Item', 'bright-crescent-luxe'),
        ],
        'public'       => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-megaphone',
        'supports'     => ['title', 'editor', 'excerpt', 'thumbnail'],
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'news'],
    ]);

    register_post_type('bct_product', [
        'labels' => [
            'name'          => __('Products', 'bright-crescent-luxe'),
            'singular_name' => __('Product', 'bright-crescent-luxe'),
        ],
        'public'       => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-products',
        'supports'     => ['title', 'editor', 'excerpt', 'thumbnail'],
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'products'],
    ]);

    register_post_type('bct_inquiry', [
        'labels' => [
            'name'          => __('Contact Inquiries', 'bright-crescent-luxe'),
            'singular_name' => __('Inquiry', 'bright-crescent-luxe'),
        ],
        'public'           => false,
        'show_ui'          => true,
        'show_in_menu'     => true,
        'show_in_rest'     => false,
        'menu_icon'        => 'dashicons-email-alt',
        'supports'         => ['title', 'editor'],
        'capability_type'  => 'post',
        'map_meta_cap'     => true,
    ]);

    register_taxonomy('bct_product_type', ['bct_product'], [
        'labels' => [
            'name'          => __('Product Types', 'bright-crescent-luxe'),
            'singular_name' => __('Product Type', 'bright-crescent-luxe'),
        ],
        'public'       => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'rewrite'      => ['slug' => 'product-type'],
    ]);
}
add_action('init', 'bct_register_post_types');

function bct_seed_product_terms(): void
{
    $terms = [
        'appliances'       => 'Appliances',
        'crystal-products' => 'Crystal Products',
        'spare-parts'      => 'Spare Parts',
    ];

    foreach ($terms as $slug => $name) {
        if (! term_exists($slug, 'bct_product_type')) {
            wp_insert_term($name, 'bct_product_type', ['slug' => $slug]);
        }
    }
}
add_action('init', 'bct_seed_product_terms', 20);
