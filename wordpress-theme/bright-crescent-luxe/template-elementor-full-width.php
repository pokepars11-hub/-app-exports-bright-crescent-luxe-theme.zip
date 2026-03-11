<?php
/**
 * Template Name: Elementor Full Width
 *
 * @package bright-crescent-luxe
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}

get_footer();
