<?php

declare(strict_types=1);

if (!function_exists('applause_core_setup')) {
    function applause_core_setup(): void
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );
        add_theme_support('responsive-embeds');
        add_theme_support('align-wide');

        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1200;
        }

        register_nav_menus([
            'primary' => __('Primary Menu', 'applause-core'),
        ]);
    }
}
add_action('after_setup_theme', 'applause_core_setup');

remove_action('wp_head', 'wp_generator');

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

if (!function_exists('applause_core_get_fallback_menu_items')) {
    function applause_core_get_fallback_menu_items(): array
    {
        $items = [];

        $items[] = [
            'label' => __('Home', 'applause-core'),
            'url' => home_url('/'),
        ];

        $access_page = get_page_by_path('access');
        if ($access_page instanceof WP_Post) {
            $items[] = [
                'label' => __('Access', 'applause-core'),
                'url' => get_permalink($access_page),
            ];
        }

        $contact_page = get_page_by_path('contact');
        if ($contact_page instanceof WP_Post) {
            $items[] = [
                'label' => __('Contact', 'applause-core'),
                'url' => get_permalink($contact_page),
            ];
        }

        return $items;
    }
}

if (!function_exists('applause_core_disable_emoji')) {
    function applause_core_disable_emoji(): void
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', 'applause_core_disable_emojis_tinymce');
    }
}
if (apply_filters('applause_core_disable_emoji', false)) {
    add_action('init', 'applause_core_disable_emoji');
}

if (!function_exists('applause_core_disable_emojis_tinymce')) {
    function applause_core_disable_emojis_tinymce(array $plugins): array
    {
        if (!is_array($plugins)) {
            return [];
        }

        return array_diff($plugins, ['wpemoji']);
    }
}
