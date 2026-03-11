<?php
/**
 * Services/products section.
 *
 * @package bright-crescent-luxe
 */

$cards = [
    [
        'title' => 'Premium Appliances',
        'desc'  => 'Curated residential and commercial appliance collections from trusted manufacturers.',
        'url'   => home_url('/appliances-products'),
        'img'   => bct_default_image('appliances.jpg'),
    ],
    [
        'title' => 'Crystal Products',
        'desc'  => 'Elegant crystal products inspired by modern craftsmanship and premium décor trends.',
        'url'   => home_url('/crystal-products'),
        'img'   => bct_default_image('crystal.jpg'),
    ],
    [
        'title' => 'Appliances Spare Parts',
        'desc'  => 'Reliable components for AC, fridge, and home appliance service requirements.',
        'url'   => home_url('/appliances-spare-parts'),
        'img'   => bct_default_image('spare-parts.jpg'),
    ],
];
?>
<section class="bct-section bct-container" data-testid="home-services-section">
    <p class="bct-section-tag">Core Divisions</p>
    <h2>Professional sourcing across appliances, crystal products, and spare parts.</h2>

    <div class="bct-grid bct-grid-3">
        <?php foreach ($cards as $index => $card) : ?>
            <article class="bct-card" data-testid="service-card-<?php echo esc_attr((string) $index); ?>">
                <div class="bct-card-media"><img src="<?php echo esc_url($card['img']); ?>" alt="<?php echo esc_attr($card['title']); ?>"></div>
                <div class="bct-card-content">
                    <h3><?php echo esc_html($card['title']); ?></h3>
                    <p><?php echo esc_html($card['desc']); ?></p>
                    <a class="bct-inline-link" href="<?php echo esc_url($card['url']); ?>" data-testid="service-card-link-<?php echo esc_attr((string) $index); ?>">View Category</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
