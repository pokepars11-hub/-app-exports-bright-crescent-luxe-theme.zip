<?php
/**
 * Main index template.
 *
 * @package bright-crescent-luxe
 */

get_header();
?>
<section class="bct-section bct-container" data-testid="blog-index-section">
    <p class="bct-section-tag">Latest Updates</p>
    <h1 class="bct-page-title"><?php esc_html_e('News & Insights', 'bright-crescent-luxe'); ?></h1>

    <div class="bct-grid bct-grid-3">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="bct-card" data-testid="blog-card-<?php the_ID(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" data-testid="blog-card-link-<?php the_ID(); ?>"><?php the_post_thumbnail('large'); ?></a>
                    <?php endif; ?>
                    <div class="bct-card-content">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'bright-crescent-luxe'); ?></p>
        <?php endif; ?>
    </div>

    <?php the_posts_pagination(); ?>
</section>
<?php
get_footer();
