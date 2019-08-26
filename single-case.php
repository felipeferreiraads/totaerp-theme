<?php get_header(); the_post(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php the_field('subtitulo'); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content">
        <div class="container">
            <div class="breadcrumbs case">
                <a href="<?php echo home_url('/'); ?>">Início</a>
                <span class="fa fa-chevron-right"></span>
                <a href="<?php echo home_url('/cases/'); ?>">Cases</a>
                <span class="fa fa-chevron-right"></span>
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </div>
            <div class="grid-blog">
                <div class="text-internal case">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>