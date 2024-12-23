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
// Añadir opciones al Customizer
function spa_manager_customize_register($wp_customize) {
    // Sección de Colores
    $wp_customize->add_section('spa_colors', array(
        'title'    => __('Colores del Tema', 'spa-manager'),
        'priority' => 30,
    ));

    // Configuración del color de fondo
    $wp_customize->add_setting('background_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'    => __('Color de Fondo', 'spa-manager'),
        'section'  => 'spa_colors',
        'settings' => 'background_color',
    )));

    // Configuración del color del texto
    $wp_customize->add_setting('text_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label'    => __('Color del Texto', 'spa-manager'),
        'section'  => 'spa_colors',
        'settings' => 'text_color',
    )));
}
add_action('customize_register', 'spa_manager_customize_register');

// Aplicar estilos personalizados desde el Customizer
function spa_manager_custom_styles() {
    $background_color = get_theme_mod('background_color', '#ffffff');
    $text_color = get_theme_mod('text_color', '#000000');

    // Asegurar que el color tenga el carácter #
    if (strpos($background_color, '#') !== 0) {
        $background_color = '#' . $background_color;
    }
    if (strpos($text_color, '#') !== 0) {
        $text_color = '#' . $text_color;
    }

    echo "<style>
        body {
            background-color: {$background_color};
            color: {$text_color};
        }
    </style>";
}
add_action('wp_head', 'spa_manager_custom_styles');

// Incluir Bootstrap CSS
function spa_manager_enqueue_scripts() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'spa_manager_enqueue_scripts');

// Registrar Google Fonts
function spa_manager_enqueue_google_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap', false);
}
add_action('wp_enqueue_scripts', 'spa_manager_enqueue_google_fonts');

// Añadir controles avanzados al Customizer
function spa_manager_customize_register($wp_customize) {
    // Sección de colores
    $wp_customize->add_section('spa_colors', array(
        'title'    => __('Colores del Tema', 'spa-manager'),
        'priority' => 30,
    ));

    // Color de fondo
    $wp_customize->add_setting('background_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'    => __('Color de Fondo', 'spa-manager'),
        'section'  => 'spa_colors',
        'settings' => 'background_color',
    )));

    // Color del texto
    $wp_customize->add_setting('text_color', array(
        'default'   => '#000000',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label'    => __('Color del Texto', 'spa-manager'),
        'section'  => 'spa_colors',
        'settings' => 'text_color',
    )));

    // Color de los contenedores
    $wp_customize->add_setting('container_color', array(
        'default'   => '#f5f5f5',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'container_color', array(
        'label'    => __('Color del Contenedor', 'spa-manager'),
        'section'  => 'spa_colors',
        'settings' => 'container_color',
    )));
}
add_action('customize_register', 'spa_manager_customize_register');

// Aplicar estilos dinámicos
function spa_manager_custom_styles() {
    $background_color = get_theme_mod('background_color', '#ffffff');
    $text_color = get_theme_mod('text_color', '#000000');
    $container_color = get_theme_mod('container_color', '#f5f5f5');

    echo "<style>
        body {
            background-color: {$background_color};
            color: {$text_color};
        }
        .container {
            background-color: {$container_color};
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>";
}
add_action('wp_head', 'spa_manager_custom_styles');
?>
