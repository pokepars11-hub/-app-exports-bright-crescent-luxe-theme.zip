<?php
/**
 * Header template.
 *
 * @package bright-crescent-luxe
 */

if (! defined('ABSPATH')) {
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-testid="site-body">
<?php wp_body_open(); ?>

<header class="bct-header" data-testid="site-header">
    <div class="bct-container bct-header-inner">
        <div class="bct-branding" data-testid="header-branding">
            <?php if (has_custom_logo()) : ?>
                <div class="bct-logo" data-testid="header-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <a class="bct-site-title" href="<?php echo esc_url(home_url('/')); ?>" data-testid="header-site-title"><?php bloginfo('name'); ?></a>
        </div>

        <nav class="bct-nav" data-testid="primary-navigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary_menu',
                'container'      => false,
                'fallback_cb'    => 'wp_page_menu',
                'menu_class'     => 'bct-nav-list',
            ]);
            ?>
        </nav>
    </div>
</header>

<main id="primary" class="site-main" data-testid="site-main">
