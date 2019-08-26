<?php
$testmonials = new WP_Query([
    'post_type' => 'case',
    'posts_per_page' => 5,
    'orderby' => 'rand'
]);

$packages = new WP_Query([
    'post_type' => 'pacote',
    'posts_per_page' => 3,
    'order' => 'ASC'
]);

get_header(); the_post(); ?>

    <section class="banner">
        <div id="particles-js"></div>
        <img src="<?php the_field('banner'); ?>" alt="<?php the_field('titulo_do_banner'); ?>">
        <div class="container">
            <div class="left">
                <h1><?php the_field('titulo_do_banner'); ?></h1>
                <p><?php the_field('subtitulo_do_banner'); ?></p>
                <form class="try-it" id="try-it-top">
                    <input type="text" name="email" placeholder="Digite o seu e-mail" required>
                    <button class="ui-button">Testar grátis</button>
                </form>
                <span class="message"><?php the_field('message_form'); ?></span>
            </div>
        </div>
    </section>

    <section class="benefits">
        <div class="grid">
            <div class="video">
                <div class="player">
                    <video src="<?php the_field('video_diferenciais'); ?>" loop autoplay muted></video>
                </div>
            </div>
            <div class="text">
                <h2 class="ui-title"><?php the_field('titulo_diferenciais'); ?></h2>
                <ul>
                <?php while(have_rows('diferenciais')): the_row(); ?>
                    <li>
                        <span class="icon icon-check"></span>
                        <span class="text"><?php the_sub_field('diferencial'); ?></span>
                    </li>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="grid">
            <div class="left">
            <?php while(have_rows('estatisticas')): the_row(); ?>
                <div class="card-stat">
                    <span class="value"><?php the_sub_field('caracter_antes_do_valor'); ?><i class="value-stat" value="<?php the_sub_field('valor_estatistica'); ?>">0</i><?php the_sub_field('caracter_depois_do_valor'); ?></span>
                    <span class="name"><?php the_sub_field('nome_da_estatistica'); ?></span>
                </div>
            <?php endwhile; ?>
            </div>
            <div class="testmonials">
                <div class="carousel-testmonials owl-carousel">
                <?php while($testmonials->have_posts()): $testmonials->the_post(); ?>
                    <div class="testmonial">
                        <figure>
                            <img src="<?php the_field('imagem'); ?>" alt="<?php the_field('nome'); ?>">
                        </figure>
                        <div class="text">
                            <p>“<?php the_field('depoimento'); ?>”</p>
                            <h3><?php echo get_field('empresa').' Cliente desde '.get_field('ano_de_entrada'); ?></h3>
                            <a href="<?php echo home_url('/cases/'); ?>" class="ui-button medium">Veja mais</a>
                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <button class="prev-testmonials">
                    <span class="fa fa-angle-left"></span>
                </button>
                <button class="next-testmonials">
                    <span class="fa fa-angle-right"></span>
                </button>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="Indicadores" class="background">
    </section>

    <section class="solutions">
        <div class="container">
            <h2 class="ui-title"><?php the_field('titulo_solucoes'); ?></h2>
            <p><?php the_field('subtitulo_solucoes'); ?></p>
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
                    <?php
                    $most_selled = get_field('mais_vendido');
                    if($most_selled == 1)
                        echo '<span class="is-popular">Mais popular</span>';
                    ?>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
                <a href="<?php echo home_url('/personalize/'); ?>" class="card-solution">
                    <figure>
                        <img src="<?php the_field('icone_card_personalizado'); ?>" alt="Personalizado">
                    </figure>
                    <div class="info no-space">
                        <h3 class="ui-title small"><?php the_field('titulo_card_personalizado'); ?></h3>
                        <p><?php the_field('texto_1_card_personalizado'); ?></p>
                        <ul>
                            <li>
                                <span class="text"><?php the_field('texto_2_card_personalizado'); ?></span>
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

    <section class="try-it-section">
        <div class="container">
            <div class="grid">
                <h2><?php the_field('titulo_experimente'); ?></h2>
                <p><?php the_field('subtitulo_experimente'); ?></p>
                <form class="try-it" id="try-it">
                    <input type="text" name="email" placeholder="Digite o seu e-mail" required>
                    <button class="ui-button">Testar grátis</button>
                </form>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="Indicadores">
    </section>

    <section class="blog-home">
        <div class="container">
            <h2 class="ui-title"><?php the_field('titulo_blog'); ?></h2>
            <p><?php the_field('subtitulo_blog'); ?></p>
            <div class="grid">
            <?php
            $posts = new WP_Query(['post_type' => 'post', 'posts_per_page' => 3]);
             while($posts->have_posts()): $posts->the_post(); ?>
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
            <a href="<?php echo home_url('/blog/'); ?>" class="ui-button big large">Leia mais</a>
        </div>
    </section>

<?php get_footer(); ?>