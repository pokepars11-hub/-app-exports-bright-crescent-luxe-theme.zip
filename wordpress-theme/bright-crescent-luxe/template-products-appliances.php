<?php
/**
 * Template Name: Appliances Products Page
 *
 * @package bright-crescent-luxe
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        echo '<section class="bct-section bct-container" data-testid="appliances-page-template">';
        the_content();
        echo '</section>';
    }
}

get_footer();
