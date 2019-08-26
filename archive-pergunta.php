<?php
$faqs = new WP_Query(['post_type' => 'pergunta', 's' => get_query_var('faq')]);

get_header(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1><?php echo get_the_title(348); ?></h1>
            <p><?php the_field('subtitulo', 348); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content section-faq">
        <div class="container">
            <h2 class="ui-title">O que você precisa?</h2>
            <form action="<?php echo home_url('/faq/'); ?>" class="searchform">
                <input type="text" name="faq" placeholder="Digite aqui a sua dúvida">
                <button>
                    <span class="icon-search"></span>
                </button>
            </form>
            <div class="faq">
                <?php if($faqs->have_posts()) :?>
                    <h3 class="ui-title">Respostas relacionadas</h2>
                    <?php while($faqs->have_posts()): $faqs->the_post(); ?>
                    <details>
                        <summary>
                            <span class="text"><?php the_field('pergunta'); ?></span>
                            <span class="icon icon-chevron-down"></span>
                        </summary>
                        <div class="info">
                            <?php the_field('resposta'); ?>
                        </div>
                    </details>
                    <?php endwhile;  wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>Nenhuma resposta encontrada.</p>
                <?php endif; ?>
            </div>
            <div class="support">
                <h3 class="ui-title">Não encontrou o que procurava?</h3>
                <p>Nosso time de suporte poderá te ajudar através do chat ou canais de contato abaixo:</p>
            </div>
        </div>
    </section>

<?php wp_reset_postdata(); get_footer(); ?>