<?php

get_header();
?>

<main id="main" class="site-main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article <?php post_class(); ?>>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php
get_footer();
