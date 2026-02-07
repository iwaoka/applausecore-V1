<?php

declare(strict_types=1);

if (!function_exists('applause_core_setup')) {
    function applause_core_setup(): void
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus([
            'primary' => __('Primary Menu', 'applause-core'),
        ]);
    }
}
add_action('after_setup_theme', 'applause_core_setup');

if (!function_exists('applause_core_enqueue_assets')) {
    function applause_core_enqueue_assets(): void
    {
        wp_enqueue_style(
            'applause-core-style',
            get_stylesheet_uri(),
            [],
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'applause_core_enqueue_assets');
