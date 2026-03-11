<?php
/**
 * Template Name: Spare Parts Page
 *
 * @package bright-crescent-luxe
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        echo '<section class="bct-section bct-container" data-testid="spare-parts-page-template">';
        the_content();
        echo '</section>';
    }
}

get_footer();
