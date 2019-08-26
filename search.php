<?php
$posts = new WP_Query([
    'post_type' => 'post',
    's' => get_query_var('s')
]);

get_header(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1>Resultados para <?php echo get_query_var('s'); ?></h1>
            <p><?php the_field('subtitulo', 48); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content">
        <div class="container">
            <div class="grid-blog">
                <div class="posts">
                    <h2 class="ui-title">Últimos artigos</h2>
                    <div class="grid-posts">
                    <?php while($posts->have_posts()): $posts->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="card-blog">
                            <figure>
                                <?php the_post_thumbnail(); ?>
                            </figure>
                            <div class="info">
                                <h3><?php echo get_the_title(); ?></h3>
                                <div class="link">
                                    <span class="text">Leia mais</span>
                                    <span class="icon icon-angle-right"></span>
                                </div>
                            </div>
                        </a>
                    <?php endwhile;  wp_reset_postdata(); ?>
                    </div>
                    <?php
                        the_posts_pagination([
                            'mid_size'  => 2,
                            'prev_text' => '<span class="icon-angle-left"></span>',
                            'next_text' => '<span class="icon-angle-right"></span>',
                            'screen_reader_text' => ''
                        ]);
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>