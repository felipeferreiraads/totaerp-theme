<?php get_header(); the_post(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php the_field('subtitulo'); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content support">
        <div class="container">
            <h2 class="ui-title"><?php the_field('titulo_notas'); ?></h2>
            <p><?php the_field('subtitulo_secao_notas'); ?></p>
            <div class="nf-links">
            <?php while(have_rows('links_notas')): the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>" target="_blank">
                    <span class="icon-angle-right"></span>
                    <span class="text"><?php the_sub_field('nome'); ?></span>
                </a>
            <?php endwhile; ?>
            </div>
            <div class="grid-support">
            <?php while(have_rows('links_suporte')): the_row(); ?>
                <a href="<?php the_sub_field('link'); ?>" class="card-support">
                    <?php the_sub_field('icone'); ?>
                    <h3 class="ui-title small"><?php the_sub_field('titulo'); ?></h3>
                    <p><?php the_sub_field('descricao'); ?></p>
                </a>
            <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php  wp_reset_postdata(); get_footer(); ?>