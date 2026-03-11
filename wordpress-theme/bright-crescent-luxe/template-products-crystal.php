<?php
/**
 * Template Name: Crystal Products Page
 *
 * @package bright-crescent-luxe
 */

get_header();

$query = new WP_Query([
    'post_type'      => 'bct_product',
    'posts_per_page' => 12,
    'tax_query'      => [
        [
            'taxonomy' => 'bct_product_type',
            'field'    => 'slug',
            'terms'    => 'crystal-products',
        ],
    ],
]);
?>
<section class="bct-section bct-section-dark" data-testid="crystal-page-template">
    <div class="bct-container">
        <p class="bct-section-tag">Crystal Selection</p>
        <h1 class="bct-page-title"><?php the_title(); ?></h1>

        <div class="bct-grid bct-grid-3">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <article class="bct-card bct-card-dark" data-testid="crystal-product-<?php the_ID(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="bct-card-media"><?php the_post_thumbnail('large'); ?></div>
                    <?php endif; ?>
                    <div class="bct-card-content">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); else : ?>
                <p><?php esc_html_e('No crystal products yet. Add products from Dashboard > Products.', 'bright-crescent-luxe'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();
