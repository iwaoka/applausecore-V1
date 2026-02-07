<?php

get_header();
?>

<main id="main" class="site-main">
    <header>
        <h1><?php the_archive_title(); ?></h1>
    </header>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div>
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e('No posts found.', 'applause-core'); ?></p>
    <?php endif; ?>
</main>

<?php
get_footer();
