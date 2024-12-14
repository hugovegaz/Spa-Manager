<?php
// Registrar estilos y scripts
function spa_manager_enqueue_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'spa_manager_enqueue_scripts');

// Configurar soporte del tema
function spa_manager_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'spa-manager'),
    ));
}
add_action('after_setup_theme', 'spa_manager_setup');
?>
