<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_action('init', 'custom_post_types');

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-css' );
}

register_nav_menus([
    'menu-header' => esc_html__( 'Header', 'totalerp' ),
]);

function custom_post_types() {
    $labels = [
        'name' => _x('Pacotes', 'Pacotes'),
        'singular_name' => _x('Pacote', 'Pacote'),
        'add_new' => _x('Adicionar Pacote', 'Novo pacote'),
        'add_new_item' => __('Novo Pacote'),
        'edit_item' => __('Editar Pacote'),
        'new_item' => __('Novo Pacote'),
        'view_item' => __('Ver Pacote'),
        'search_items' => __('Procurar Pacotes'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'Pacotes'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-cart',
        'taxonomies' => ['category'],
        'supports' => ['title', 'category'],
        'rewrite' => ['slug'=>'pacotes']
    ];

    register_post_type('pacote', $args);

    $labels = [
        'name' => _x('Módulos', 'Módulos'),
        'singular_name' => _x('Módulo', 'Módulo'),
        'add_new' => _x('Adicionar Módulo', 'Novo módulo'),
        'add_new_item' => __('Novo Módulo'),
        'edit_item' => __('Editar Módulo'),
        'new_item' => __('Novo Módulo'),
        'view_item' => __('Ver Módulo'),
        'search_items' => __('Procurar Módulos'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'Módulos'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-laptop',
        'taxonomies' => ['cat_modulo'],
        'supports' => ['title'],
        'rewrite' => ['slug'=>'modulos']
    ];

    register_post_type('modulo', $args);

    register_taxonomy(
        'cat_modulo',
        'modulo',
        array(
            'hierarchical' => true,
            'label' => 'Categorias do Módulo',
            'query_var' => true
        )
    );

    $labels = [
        'name' => _x('Perguntas', 'Perguntas'),
        'singular_name' => _x('Pergunta', 'Pergunta'),
        'add_new' => _x('Adicionar Pergunta', 'Novo pergunta'),
        'add_new_item' => __('Novo Pergunta'),
        'edit_item' => __('Editar Pergunta'),
        'new_item' => __('Novo Pergunta'),
        'view_item' => __('Ver Pergunta'),
        'search_items' => __('Procurar Perguntas'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'FAQ'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-editor-help',
        'taxonomies' => ['cat_faq', 'post_tag'],
        'supports' => ['title'],
        'rewrite' => ['slug'=> 'faq']
    ];

    register_post_type('pergunta', $args);

    register_taxonomy(
        'cat_faq',
        'pergunta',
        array(
            'hierarchical' => true,
            'label' => 'Categorias do FAQ',
            'query_var' => true
        )
    );

    $labels = [
        'name' => _x('Cases', 'Cases'),
        'singular_name' => _x('Case', 'Case'),
        'add_new' => _x('Adicionar Case', 'Novo case'),
        'add_new_item' => __('Novo Case'),
        'edit_item' => __('Editar Case'),
        'new_item' => __('Novo Case'),
        'view_item' => __('Ver Case'),
        'search_items' => __('Procurar Cases'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'Cases'
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => true,
        'menu_icon' => 'dashicons-admin-home',
        'taxonomies' => ['cat_case', 'cat_case'],
        'supports' => ['title', 'editor']
    ];

    register_post_type('case', $args);

    register_taxonomy(
        'cat_case',
        'case',
        array(
            'hierarchical' => true,
            'label' => 'Segmento',
            'query_var' => true
        )
    );
}

function count_post_visits() {
    if(is_single()):
        global $post;
        $views = get_post_meta( $post->ID, 'my_post_viewed', true );
        if($views == ''):
            update_post_meta( $post->ID, 'my_post_viewed', '1' );
        else:
            $views_no = intval( $views );
            update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
        endif;
    endif;
}

add_action( 'wp_head', 'count_post_visits' );

add_action('init','add_faq_vars');
function add_faq_vars() {
    global $wp;
    $wp->add_query_var('faq');
}

function footer_enqueue_scripts() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action('after_setup_theme', 'footer_enqueue_scripts');


function lower_wpseo_priority( $html ) {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'lower_wpseo_priority' );


function array_sort($array, $on, $order=SORT_ASC){
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function cf7_add_post_title(){
    if(is_post_type_archive('pergunta')):
        return 'FAQ';
    elseif(is_post_type_archive('modulo')):
        return 'Módulos';
    else:
        global $post;
        return $post->post_title;
    endif;
}

add_shortcode('CF7_ADD_POST_TITLE', 'cf7_add_post_title');