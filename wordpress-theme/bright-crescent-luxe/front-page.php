<?php
/**
 * Front page template.
 *
 * @package bright-crescent-luxe
 */

get_header();

get_template_part('template-parts/section', 'hero');
get_template_part('template-parts/section', 'about');
get_template_part('template-parts/section', 'services');
get_template_part('template-parts/section', 'cta');
get_template_part('template-parts/section', 'contact');

get_footer();
