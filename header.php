<?php

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main">
    <?php esc_html_e('Skip to content', 'applause-core'); ?>
</a>
<header class="site-header">
    <h1 class="site-title">
        <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
        </a>
    </h1>

    <nav aria-label="<?php esc_attr_e('Primary menu', 'applause-core'); ?>">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'primary-menu',
                'fallback_cb' => false,
            ]);
        } else {
            $fallback_items = applause_core_get_fallback_menu_items();
            if (!empty($fallback_items)) {
                echo '<ul class="primary-menu">';
                foreach ($fallback_items as $item) {
                    printf(
                        '<li><a href="%s">%s</a></li>',
                        esc_url($item['url']),
                        esc_html($item['label'])
                    );
                }
                echo '</ul>';
            }
        }
        ?>
    </nav>
</header>
