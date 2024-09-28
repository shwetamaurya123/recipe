<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        header{
            background-color: <?php echo esc_attr(get_theme_mod('recipe_blog_primary_color', '#007bff')); ?>; /* Dynamic color */
        }
    </style>
</head>

<body <?php body_class(); ?>>
<header class="text-white p-3">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="<?php echo home_url(); ?>" class="text-white text-decoration-none mr-auto">
                <?php if (get_theme_mod('recipe_blog_logo')) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('recipe_blog_logo')); ?>" alt="<?php bloginfo('name'); ?>" style="max-height: 50px;">
                <?php else : ?>
                    <span><?php bloginfo('name'); ?></span>
                <?php endif; ?>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_class'     => 'navbar-nav ml-auto', // Align nav items to the right
                    'container'      => false,
                ));
                ?>
                <form class="form-inline my-2 my-lg-0 ml-3" action="<?php echo home_url('/'); ?>" method="get">
                    <input class="form-control mr-sm-2" type="search" name="s" placeholder="Search Recipes" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                
            </div>
        </div>
    </nav>
</header>
