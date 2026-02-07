<?php

get_header();
?>

<main id="main" class="site-main">
    <article>
        <h1><?php esc_html_e('Page not found', 'applause-core'); ?></h1>
        <p><?php esc_html_e('The page you are looking for could not be found.', 'applause-core'); ?></p>
        <p>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php esc_html_e('Back to home', 'applause-core'); ?>
            </a>
        </p>
    </article>
</main>

<?php
get_footer();
