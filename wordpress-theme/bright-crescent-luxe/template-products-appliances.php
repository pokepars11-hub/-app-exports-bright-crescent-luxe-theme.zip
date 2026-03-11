<?php
/**
 * Template Name: Appliances Products Page
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
            'terms'    => 'appliances',
        ],
    ],
]);
?>
<section class="bct-section bct-container" data-testid="appliances-page-template">
    <p class="bct-section-tag">Appliances Portfolio</p>
    <h1 class="bct-page-title"><?php the_title(); ?></h1>

    <div class="bct-grid bct-grid-3">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <article class="bct-card" data-testid="appliance-product-<?php the_ID(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="bct-card-media"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <div class="bct-card-content">
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo esc_html(get_the_excerpt()); ?></p>
                </div>
            </article>
        <?php endwhile; wp_reset_postdata(); else : ?>
            <?php foreach (bct_default_appliances() as $index => $item) : ?>
                <article class="bct-card" data-testid="appliance-default-<?php echo esc_attr((string) $index); ?>">
                    <div class="bct-card-media"><img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['name']); ?>"></div>
                    <div class="bct-card-content">
                        <p class="bct-card-meta"><?php echo esc_html($item['category'] . ' · ' . $item['origin']); ?></p>
                        <h2><?php echo esc_html($item['name']); ?></h2>
                        <ul>
                            <?php foreach ($item['specs'] as $spec) : ?>
                                <li><?php echo esc_html($spec); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
