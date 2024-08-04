<?php get_header(); ?>

<div class="container pt-5 pb-5 grid grid-cols-3 gap-3 place-items-center font-bold">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post">
            <h3 class="bg-gray-400 mb-2 p-2 rounded-md"><?php the_title(); ?></h3>

            <?php if(has_post_thumbnail()): ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded']); ?>
                </div>
            <?php endif; ?>

            <!-- Açıklama yazısını kaldırdık -->
            <!-- <?php the_excerpt(); ?> -->
            
            <a href="<?php the_permalink(); ?>" class="read-more text-red-700 bg-gray-400 p-2 flex mt-2 rounded-md">Devamını Oku...</a>
        </article>
    <?php endwhile; ?>

    <?php the_posts_navigation(); // Sayfalama eklendi ?>

    <?php else : ?>
        <p>Bu kategoride henüz içerik bulunmuyor.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
