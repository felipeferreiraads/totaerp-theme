<?php
$packages = new WP_Query(['post_type' => 'pacote', 'post_per_page' => 3, 'order' => 'ASC']);
get_header(); the_post(); ?>

    <section class="banner-landing">
        <img src="<?php the_field('banner_do_header'); ?>" alt="<?php the_field('titulo_header'); ?>">
        <div class="overlay">
            <div class="container">
                <div class="left">
                    <h1><?php the_field('titulo_do_header'); ?></h1>
                    <p><?php the_field('subtitulo_do_header'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <div class="form-sticky">
        <?php echo do_shortcode('[contact-form-7 id="193" title="Formulário Teste Grátis LP" html_class="ui-form" html_id="formTesteGratisLP"]'); ?>
    </div>

    <section class="text-landing">
        <div class="container">
            <div class="grid">
                <h2 class="ui-title"><?php echo get_the_title(); ?></h2>
                <?php the_field('descricao'); ?>
                <form class="form-price mensal-plan">
                    <span class="price">
                        <strong>R$ <?php the_field('valor'); ?></strong>/mês
                    </span>
                    <!--button class="ui-button">Contratar</button-->
                </form>
            </div>
        </div>
    </section>

    <?php if(have_rows('vantagens_e_beneficios')) :?>
    <section class="benefits-landing">
        <div class="container">
            <div class="grid">
            <?php while(have_rows('vantagens_e_beneficios')): the_row(); ?>
                <div class="card-benefit-landing">
                    <span class="icon">
                        <?php the_sub_field('icone'); ?>
                    </span>
                    <h3 class="ui-title small"><?php the_sub_field('titulo'); ?></h3>
                    <p><?php the_sub_field('descricao'); ?></p>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="solutions internal">
        <div class="container">
            <h2 class="ui-title"><?php the_field('titulo_conheca_mais_pacotes'); ?></h2>
            <p><?php the_field('subtitulo_conheca_mais_pacotes') ;?></p>
            <div class="grid">
            <?php while($packages->have_posts()): $packages->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="card-solution">
                    <figure>
                        <img src="<?php the_field('icone'); ?>" alt="<?php echo get_the_title(); ?>">
                    </figure>
                    <div class="info">
                        <h3 class="ui-title small"><?php echo get_the_title(); ?></h3>
                        <p><?php the_field('subtitulo'); ?></p>
                        <ul>
                        <?php while(have_rows('itens_inclusos')): the_row(); ?>
                            <li>
                                <span class="icon icon-check"></span>
                                <span class="text"><?php the_sub_field('item'); ?></span>
                            </li>
                        <?php endwhile; ?>
                        </ul>
                        <div class="price-link">
                            <div class="price">
                            <?php
                                $top = get_field('informacao_acima_do_preco');
                                $bottom = get_field(' informacao_abaixo_do_preco');
                                if($top):
                                    echo '<span class="top">'.$top.'</span>';
                                endif;
                                echo '<span class="value">'.get_field('preco').'</span>';
                                if($bottom):
                                    echo '<span class="bottom">'.$bottom.'</span>';
                                endif;
                            ?>
                            </div>
                            <span class="ui-button small">Saiba mais</span>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>
                <a href="<?php echo home_url('/personalize/'); ?>" class="card-solution">
                    <figure>
                        <img src="<?php the_field('icone_card_personalizado', 42); ?>" alt="Personalizado">
                    </figure>
                    <div class="info no-space">
                        <h3 class="ui-title small"><?php the_field('titulo_card_personalizado', 42); ?></h3>
                        <p><?php the_field('texto_1_card_personalizado', 42); ?></p>
                        <ul>
                            <li>
                                <span class="text"><?php the_field('texto_2_card_personalizado', 42); ?></span>
                            </li>
                        </ul>
                        <div class="price-link">
                            <span class="ui-button small blue">Saiba mais</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <script>var IS_LANDING = true;</script>
<?php get_footer(); ?>