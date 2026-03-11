<?php
/**
 * Template Name: Spare Parts Page
 *
 * @package bright-crescent-luxe
 */

get_header();

$query = new WP_Query([
    'post_type'      => 'bct_product',
    'posts_per_page' => 15,
    'tax_query'      => [
        [
            'taxonomy' => 'bct_product_type',
            'field'    => 'slug',
            'terms'    => 'spare-parts',
        ],
    ],
]);
?>
<section class="bct-section bct-container" data-testid="spare-parts-page-template">
    <p class="bct-section-tag">Cooling & Appliance Components</p>
    <h1 class="bct-page-title"><?php the_title(); ?></h1>

    <div class="bct-catalog-box" data-testid="catalog-download-box">
        <div>
            <p class="bct-card-meta">Spare Parts Catalog</p>
            <p><?php esc_html_e('Upload your final catalog file and link it on this button from Elementor or page editor.', 'bright-crescent-luxe'); ?></p>
        </div>
        <a class="bct-btn bct-btn-gold" href="#" data-testid="catalog-download-button"><?php esc_html_e('Download Catalog', 'bright-crescent-luxe'); ?></a>
    </div>

    <div class="bct-grid bct-grid-3">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <article class="bct-card" data-testid="spare-product-<?php the_ID(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="bct-card-media"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <div class="bct-card-content">
                    <h2><?php the_title(); ?></h2>
                    <p class="bct-card-meta">
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'bct_product_type');
                        if ($terms && ! is_wp_error($terms)) {
                            echo esc_html($terms[0]->name);
                        }
                        ?>
                    </p>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <p><?php esc_html_e('No spare parts yet. Add products from Dashboard > Products.', 'bright-crescent-luxe'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
