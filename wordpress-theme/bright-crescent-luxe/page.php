<?php
/**
 * Default page template.
 *
 * @package bright-crescent-luxe
 */

get_header();
?>
<section class="bct-section bct-container" data-testid="default-page-section">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article data-testid="page-<?php the_ID(); ?>">
            <h1 class="bct-page-title"><?php the_title(); ?></h1>
            <div class="bct-rich-text"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</section>
<?php
get_footer();
