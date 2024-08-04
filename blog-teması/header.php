<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('flex flex-col h-screen w-[100%] bg-gray-800'); ?>>
<header class="header flex flex-row justify-between items-center  text-white p-4">
    <div class="site-logo">
        <?php if ( has_custom_logo() ) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <h1 class="text-2xl"><?php bloginfo( 'name' ); ?></h1>
        <?php endif; ?>
    </div>
    <?php wp_nav_menu(
        array(
            'theme_location' => 'top-menu',
            'menu_class' => 'navigation flex flex-row gap-3 mr-4'
        )
    ); ?>
</header>

