<?php get_header(); ?>

<div class="bg-gray-700">
    <h1 class="flex ml-5 text-4xl p-4 mt-4 font-semibold text-red-700">ÖNE ÇIKAN BLOGLAR</h1>
</div>
<div class="flex bg-gray-800 justify-center">
    <div class="container pt-5 pb-5">
        <div class="flex justify-center place-content-center items-center relative">
            <button id="scroll-left-featured" class="bg-gray-400 p-2 rounded-md mx-2 hidden">
                &#8592;
            </button>
            <div id="post-container-featured" class="flex overflow-x-hidden whitespace-nowrap w-full">
                <?php
                $args = array(
                    'category_name' => 'onecıkanblog', // Blog kategorisindeki postları çekmek için
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) : 
                    while ($query->have_posts()) : 
                        $query->the_post(); ?>
                        <article class="post flex-shrink-0 w-80 justify-center flex flex-col self-center mr-4 bg-red-600 p-4 rounded-md">
                            <h3 class="bg-gray-400 mb-2 p-2 rounded-md"><?php the_title(); ?></h3>

                            <?php if(has_post_thumbnail()): ?>
                                <div class="post-thumbnail mb-2">
                                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded']); ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="read-more text-red-700 bg-gray-400 p-2 flex mt-2 rounded-md">Devamını Oku...</a>
                        </article>
                    <?php endwhile; 
                    wp_reset_postdata(); 
                else : ?>
                    <p>Bu kategoride henüz içerik bulunmuyor.</p>
                <?php endif; ?>
            </div>
            <button id="scroll-right-featured" class="bg-gray-400 p-2 rounded-md mx-2 hidden">
                &#8594;
            </button>
        </div>
    </div>
</div>

<div class="bg-gray-700">
    <h1 class="flex ml-5 text-4xl p-4 mt-4 font-semibold text-red-700">BLOGLAR</h1>
</div>
<div class="flex bg-gray-800 justify-center">
    <div class="container pt-5 pb-5">
        <div class="flex justify-center place-content-center items-center relative">
            <button id="scroll-left-blog" class="bg-gray-400 p-2 rounded-md mx-2 hidden">
                &#8592;
            </button>
            <div id="post-container-blog" class="flex overflow-x-hidden whitespace-nowrap w-full">
                <?php
                $args = array(
                    'category_name' => 'blog', // Blog kategorisindeki postları çekmek için
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) : 
                    while ($query->have_posts()) : 
                        $query->the_post(); ?>
                        <article class="post flex-shrink-0 w-80 justify-center flex flex-col self-center mr-4 bg-red-600 p-4 rounded-md">
                            <h3 class="bg-gray-400 mb-2 p-2 rounded-md"><?php the_title(); ?></h3>

                            <?php if(has_post_thumbnail()): ?>
                                <div class="post-thumbnail mb-2">
                                    <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded']); ?>
                                </div>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="read-more text-red-700 bg-gray-400 p-2 flex mt-2 rounded-md">Devamını Oku...</a>
                        </article>
                    <?php endwhile; 
                    wp_reset_postdata(); 
                else : ?>
                    <p>Bu kategoride henüz içerik bulunmuyor.</p>
                <?php endif; ?>
            </div>
            <button id="scroll-right-blog" class="bg-gray-400 p-2 rounded-md mx-2 hidden">
                &#8594;
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featuredPostContainer = document.getElementById('post-container-featured');
        const scrollLeftBtnFeatured = document.getElementById('scroll-left-featured');
        const scrollRightBtnFeatured = document.getElementById('scroll-right-featured');

        const blogPostContainer = document.getElementById('post-container-blog');
        const scrollLeftBtnBlog = document.getElementById('scroll-left-blog');
        const scrollRightBtnBlog = document.getElementById('scroll-right-blog');

        function updateScrollButtons(container, btnLeft, btnRight) {
            if (container.scrollWidth > container.clientWidth) {
                btnRight.classList.remove('hidden');
            } else {
                btnRight.classList.add('hidden');
            }

            if (container.scrollLeft > 0) {
                btnLeft.classList.remove('hidden');
            } else {
                btnLeft.classList.add('hidden');
            }
        }

        scrollLeftBtnFeatured.addEventListener('click', function() {
            featuredPostContainer.scrollBy({
                left: -600,
                behavior: 'smooth'
            });
        });

        scrollRightBtnFeatured.addEventListener('click', function() {
            featuredPostContainer.scrollBy({
                left: 600,
                behavior: 'smooth'
            });
        });

        scrollLeftBtnBlog.addEventListener('click', function() {
            blogPostContainer.scrollBy({
                left: -600,
                behavior: 'smooth'
            });
        });

        scrollRightBtnBlog.addEventListener('click', function() {
            blogPostContainer.scrollBy({
                left: 600,
                behavior: 'smooth'
            });
        });

        featuredPostContainer.addEventListener('scroll', function() {
            updateScrollButtons(featuredPostContainer, scrollLeftBtnFeatured, scrollRightBtnFeatured);
        });

        blogPostContainer.addEventListener('scroll', function() {
            updateScrollButtons(blogPostContainer, scrollLeftBtnBlog, scrollRightBtnBlog);
        });

        window.addEventListener('resize', function() {
            updateScrollButtons(featuredPostContainer, scrollLeftBtnFeatured, scrollRightBtnFeatured);
            updateScrollButtons(blogPostContainer, scrollLeftBtnBlog, scrollRightBtnBlog);
        });

        // Initial button state
        updateScrollButtons(featuredPostContainer, scrollLeftBtnFeatured, scrollRightBtnFeatured);
        updateScrollButtons(blogPostContainer, scrollLeftBtnBlog, scrollRightBtnBlog);
    });
</script>

<?php if (have_posts()) : while (have_posts()) : the_post() ?>
    <?php the_content(); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
