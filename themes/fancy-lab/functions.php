<?php

function fancy_lab_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array('jquery'), '5.3.0',true);
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '5.3.0', 'all');
    wp_enqueue_style('fancy-lab-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
}

add_action('wp_enqueue_scripts', 'fancy_lab_scripts');


function fancy_lab_config() {
    // woocommerce主题授权，并修改基本参数
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 255,
        'single_image_width' => 255,
        'product_grid' => array(
            'default_rows' => 10,
            'min_rows' => 5,
            'max_rows' => 10,
            'default_columns' => 1,
            'min_columns' => 1,
            'max-columns' => 1
        )
    ) );
    add_theme_support('wc-product-gallery-zoom'); // 产品主图放大
    add_theme_support('wc-product-gallery-lightbox'); // 产品主图tab
    add_theme_support('wc-product-gallery-slider'); // 产品主图滑动


    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }
    register_nav_menus(
      array(
          'fancy_lab_main_menu' => 'Fancy Lab Main Menu',
          'fancy_lab_footer_menu' => 'Fancy Lab Footer Menu'
      )
    );

}
add_action('after_setup_theme', 'fancy_lab_config', 0);

require get_template_directory() . '/inc/wc-modifications.php';

/*使用过滤器更改页面内容*/
//add_filter('woocommerce_show_page_title', 'fancy_lab_remove_shop_title');
//function fancy_lab_remove_shop_title($val) {
//    $val = false;
//    return $val;
//}

 add_action('woocommerce_after_shop_loop_item_title', 'the_excerpt', 1);