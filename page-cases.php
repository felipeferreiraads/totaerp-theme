<?php
$args = [
    'post_type' => 'case',
    'posts_per_page' => 50,
];


if(get_query_var('cat_case') != '') {
    $args['tax_query'] = [
        [
            'taxonomy' => 'cat_case',
            'field' => 'term_id',
            'terms' =>  get_query_var('cat_case')
        ]
    ];
}

$cases = new WP_Query($args);

$clients = get_field('clientes', 44);

get_header(); the_post(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php the_field('subtitulo'); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content">
        <div class="container">
            <div class="grid-cases-sidebar">
                <div class="grid-cases">
                <?php while($cases->have_posts()): $cases->the_post(); global $post; ?>
                    <div class="card-case">
                        <figure>
                            <img src="<?php the_field('imagem'); ?>" alt="<?php the_field('empresa'); ?>">
                        </figure>
                        <div class="text">
                            <span class="fa fa-quote-left"></span>
                            <div>
                                <p><?php the_field('depoimento'); ?></p>
                                <div class="client">
                                    <span class="enterprise"><?php the_field('empresa'); ?></span>
                                    <span class="enterprise">Cliente desde <?php the_field('ano_de_entrada'); ?></span>
                                </div>
                                <?php if($post->post_content != ''): ?>
                                <a href="<?php the_permalink(); ?>" class="ui-button medium">Veja mais</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;  wp_reset_postdata(); ?>
                </div>
                <?php get_sidebar('cases'); ?>
            </div>
            <div class="clients">
                <h2 class="ui-title">Conheça nossos clientes</h2>
                <div class="grid owl-carousel">
                <?php foreach($clients as $client): ?>
                    <img src="<?php echo $client['imagem']; ?>" alt="<?php echo $client['nome']; ?>">
                <?php endforeach; ?>
                </div>
                <button class="prev-clients">
                    <span class="fa fa-angle-left"></span>
                </button>
                <button class="next-clients">
                    <span class="fa fa-angle-right"></span>
                </button>
            </div>
        </div>
    </section>

<?php get_footer(); ?>