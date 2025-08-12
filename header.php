<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <header>
        <a class="logo"><?php echo get_bloginfo('name'); ?></a>
        <nav>
            <a href="mailto:<?php echo get_theme_mod('email', 'ninoespe01@gmail.com'); ?>"><?php echo get_theme_mod('email', 'ninoespe01@gmail.com'); ?></a>
        </nav>
    </header> 