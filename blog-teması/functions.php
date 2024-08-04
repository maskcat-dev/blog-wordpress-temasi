<?php 

function load_stylesheets()
{
    wp_register_style('tailwindcss', 'https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css', array(), false, 'all');
    wp_enqueue_style('tailwindcss');
    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('stylesheet');
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
add_image_size('post-thumbnail', 300, 300, true);
add_image_size('large-thumbnail', 600, 400, true);
add_theme_support('menus');

function register_theme_menus() {
    register_nav_menus(
        array(
            'top-menu' => __('Top Menu', 'theme'),
            'footer-menu' => __('Footer Menu', 'theme'),
        )
    );
}

add_action('init', 'register_theme_menus');

add_filter('use_block_editor_for_post_type', '__return_false', 100);

// Özelleştirilmiş Yorum Şablonu
function my_comment_callback($comment, $args, $depth) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    ?>
    <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <div class="comment-body bg-white shadow-md p-4 rounded-lg mb-4">
        <div class="comment-author vcard bg-red-600 flex items-center mb-2">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'rounded-full mr-3')); ?>
            <cite class="fn font-bold"><?php echo get_comment_author_link(); ?></cite>
        </div>
        <div class="comment-meta commentmetadata text-sm text-red-600 mb-2">
            <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)'), '  ', ''); ?>
        </div>
        <div class="comment-text">
            <?php comment_text(); ?>
        </div>
        <div class="reply mt-2 bg-blue-700">
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'class' => 'text-blue-500 hover:text-blue-700 bg-blue-600'))); ?>
        </div>
    </div>
    <?php
}

?>
