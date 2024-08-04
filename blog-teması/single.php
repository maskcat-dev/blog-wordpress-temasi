<?php get_header(); ?>

<div class="container mx-auto px-4 py-8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="prose lg:prose-xl font-semibold text-white mx-auto">
            <?php the_content(); ?>
        </article>
    <?php endwhile; endif; ?>
    
    <div class="comments-section  bg-gray-600 text-yellow-600 p-5 rounded-md">
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
