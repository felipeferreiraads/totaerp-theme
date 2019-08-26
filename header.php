<!DOCTYPE html>
<html>
<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/safari-pinned-tab.svg" color="#00a2dc">
    <meta name="msapplication-TileColor" content="#00a2dc">
    <meta name="theme-color" content="#00a2dc">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-vlOMx0hKjUCl4WzuhIhSNZSm2yQCaf0mOU1hEDK/iztH3gU4v5NMmJln9273A6Jz" crossorigin="anonymous">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css" rel="stylesheet" >
</head>

<body lang="pt-br">
    <header>
        <div class="container">
            <div class="grid">
                <a href="<?php echo home_url('/'); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="TotalERP">
                </a>
                <nav class="menu">
                <?php
                    $menu_header = wp_get_nav_menu_items(3);
                    $parent = 0;
                    foreach($menu_header as $k => $menu):
                        if($menu->menu_item_parent != $parent and $menu->menu_item_parent == 0):
                            echo '</nav>';
                            echo '</div>';
                        endif;

                        if($menu->classes[0] == 'submenu'):
                            echo '<div class="submenu">';
                            echo $menu->title;
                            echo '<nav>';
                        else:
                            echo '<a href="'.$menu->url.'">'.$menu->title.'</a>';
                        endif;

                        if($k == count($menu_header) - 1 and $menu->menu_item_parent != 0 and $parent != 0)
                            echo '</nav>';

                        if($k == count($menu_header) - 1)
                            echo '</nav>';

                        $parent = $menu->menu_item_parent;
                    endforeach;
                ?>
                </nav>
                <a href="#" class="ui-button try-it">Testar grátis</a>
                <button class="open-menu" aria-label="Abrir menu">
                    <span class="icon-menu" aria-label="Abrir menu"></span>
                </button>
            </div>
        </div>
    </header>

    <nav class="menu-mobile">
        <button class="close-menu" aria-label="Fechar menu">
            <span class="icon-close" aria-label="Fechar menu"></span>
        </button>
        <input type="checkbox">
        <ul>
        <?php
            $parent = 0;
            foreach($menu_header as $k => $menu):
                if($menu->menu_item_parent != $parent and $menu->menu_item_parent == 0):
                    echo '</ul>';
                    echo '</label>';
                    echo '</li>';
                endif;

                if($menu->classes[0] == 'submenu'):
                    echo '<li class="has-submenu">';
                    echo '<label>';
                    echo $menu->title;
                    echo '<span class="icon icon-chevron-down"></span>';
                    echo '<input type="checkbox">';
                    echo '<ul class="submenu">';
                else:
                    echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
                endif;

                if($k == count($menu_header) - 1 and $menu->menu_item_parent != 0 and $parent != 0)
                    echo '</ul>';

                if($k == count($menu_header) - 1)
                    echo '</ul>';

                $parent = $menu->menu_item_parent;
            endforeach;
        ?>
        </ul>
        <a href="#" class="ui-button medium try-it">Experimente grátis</a>
    </nav>

    <div class="overlay-menu"></div>