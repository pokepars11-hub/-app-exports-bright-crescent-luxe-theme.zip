<?php
/**
 * Single template.
 *
 * @package bright-crescent-luxe
 */

get_header();
?>
<section class="bct-section bct-container" data-testid="single-post-section">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article data-testid="single-post-<?php the_ID(); ?>">
            <p class="bct-section-tag"><?php echo esc_html(get_the_date()); ?></p>
            <h1 class="bct-page-title"><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div class="bct-featured-image" data-testid="single-featured-image"><?php the_post_thumbnail('large'); ?></div>
            <?php endif; ?>
            <div class="bct-rich-text"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</section>
<?php
get_footer();
