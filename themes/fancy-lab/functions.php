<?php

function fancy_lab_scripts() {
    wp_enqueue_style('fancy-lab-style', get_stylesheet_uri(), array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'fancy_lab_scripts');