<?php
/**
 * Template Name: News Page
 *
 * @package bright-crescent-luxe
 */

get_header();

$news_query = new WP_Query([
    'post_type'      => 'bct_news',
    'posts_per_page' => 9,
]);
?>
<section class="bct-section bct-container" data-testid="news-page-template">
    <p class="bct-section-tag">Company Updates</p>
    <h1 class="bct-page-title"><?php the_title(); ?></h1>

    <div class="bct-grid bct-grid-3">
        <?php if ($news_query->have_posts()) : ?>
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                <article class="bct-card" data-testid="news-item-<?php the_ID(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="bct-card-media"><?php the_post_thumbnail('large'); ?></div>
                    <?php endif; ?>
                    <div class="bct-card-content">
                        <p class="bct-card-meta"><?php echo esc_html(get_the_date()); ?></p>
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <?php foreach (bct_default_news_items() as $index => $item) : ?>
                <article class="bct-card" data-testid="news-default-item-<?php echo esc_attr((string) $index); ?>">
                    <div class="bct-card-media"><img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>"></div>
                    <div class="bct-card-content">
                        <p class="bct-card-meta"><?php echo esc_html($item['category'] . ' · ' . $item['date']); ?></p>
                        <h2><?php echo esc_html($item['title']); ?></h2>
                        <p><?php echo esc_html($item['excerpt']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
