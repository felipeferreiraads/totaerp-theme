<?php
$terms = get_terms('cat_modulo', [
    'hide_empty' => true
]);

get_header(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1><?php echo get_the_title(187); ?></h1>
            <p><?php the_field('subtitulo', 187); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content">
        <div class="container">
        <?php
            foreach($terms as $term):
                $modules = new WP_Query([
                    'post_type' => 'modulo',
                    'tax_query' => [
                        [
                            'taxonomy' => 'cat_modulo',
                            'field' => 'slug',
                            'terms' => $term->slug
                        ]
                    ]
                ]); ?>
                <h2 class="ui-title"><?php echo $term->name; ?></h2>
                <div class="grid-modules">
                <?php while($modules->have_posts()): $modules->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="card-module">
                        <h3><?php echo get_the_title(); ?></h3>
                        <p><?php the_field('resumo_do_card'); ?></p>
                        <div class="bottom">
                            <span class="text">Saiba mais</span>
                            <img src="<?php the_field('icone'); ?>" alt="<?php get_the_title(); ?>">
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
                </div><?php
            endforeach;
        ?>
        </div>
    </section>

<?php wp_reset_postdata(); get_footer(); ?>