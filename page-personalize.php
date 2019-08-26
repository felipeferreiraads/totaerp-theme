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
            <div class="box-form">
                <h2 class="ui-title small">Preencha os dados abaixo</h2>
                <?php echo do_shortcode('[contact-form-7 id="191" title="Formulário Personalize" html_id="formPersonalize"]'); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>