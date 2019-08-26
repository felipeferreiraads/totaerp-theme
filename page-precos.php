<?php
$packages = get_posts(['post_type' => 'pacote', 'order' => 'ASC']);
$keys = [];
$fields = get_field_objects($packages[0]->ID);
$fields = array_sort($fields, 'menu_order', SORT_ASC);

$exclude = [
    'descricao',
    'valor_mensal',
    'valor_fidelidade',
    'vantagens_e_beneficios',
    'modulos',
    'icone',
    'titulo_header',
    'subtitulo_header',
    'banner_header',
    'titulo',
    'subtitulo',
    'itens_inclusos',
    'preco',
    'informacao_acima_do_preco',
    'informacao_abaixo_do_preco',
    'tooltip_plano_fidelidade',
    'informacao_plano_fidelidade',
    'titulo_conheca_mais_pacotes',
    'subtitulo_conheca_mais_pacotes',
    'mais_vendido'
];

get_header(); the_post();
?>

    <section class="banner-internal">
        <div class="container">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php the_field('subtitulo'); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content pricing">
        <div class="container scroll-table">
            <div class="grid-switch">
                <span>Fidelidade <i>(economize 10%)</i>&nbsp;<i class="fa fa-question-circle tooltip" title="<?php the_field('tooltip_plano_fidelidade'); ?>"></i></span>
                <label class="switch">
                    <input type="checkbox" class="change-plan">
                    <span class="slider round"></span>
                </label>
                <span>Mensal</span>
            </div>
            <table class="pricing-table">
                <thead>
                    <tr>
                        <td class="empty"></td>
                        <?php foreach($packages as $package): ?>
                        <td>
                            <div class="head-cell">
                                <img src="<?php the_field('icone', $package->ID); ?>" alt="<?php echo get_the_title($package->ID); ?>">
                                <h3><?php echo get_the_title($package->ID); ?></h3>
                                <span class="price mensal-plan"><i>R$ </i> <?php echo get_field('valor_mensal', $package->ID); ?></span>
                                <span class="price fidelity-plan"><i>R$ </i> <?php echo get_field('valor_fidelidade', $package->ID); ?></span>
                                <span class="type mensal-plan">Plano mensal</span>
                                <span class="type fidelity-plan">Plano fidelidade</span>
                                <button class="ui-button small try-it">Quero testar</button>
                                <a href="<?php echo get_the_permalink($package->ID); ?>" class="link">Saiba mais</a>
                            </div>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($fields as $k => $field): ?>
                    <?php if(!in_array($k, $exclude)): ?>
                        <tr>
                            <td>
                                <div class="label-box">
                                    <span><?php echo $field['label']; ?></span>
                                    <span class="fa fa-question-circle tooltip" title="<?php echo $field['instructions']; ?>"></span>
                                </div>
                            </td>
                            <?php
                            foreach($packages as $package):
                                $field = get_field($k, $package->ID);
                                if(is_string($field)):
                                    echo '<td>'.$field.'</td>';
                                elseif($field == 0):
                                    echo '<td><span class="fa fa-times"></span></td>';
                                else:
                                    echo '<td><span class="fa fa-check"></span></td>';
                                endif;
                            endforeach;
                            ?>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="empty"></td>
                        <?php foreach($packages as $package): ?>
                            <td>
                                <div class="head-cell">
                                    <button class="ui-button small try-it">Quero testar</button>
                                    <a href="<?php echo get_the_permalink($package->ID); ?>" class="link">Saiba mais</a>
                                </div>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tfoot>
            </table>
            <p class="fidelity-text"><?php the_field('informacao_plano_fidelidade'); ?></p>
        </div>
    </section>

<?php  wp_reset_postdata(); get_footer(); ?>