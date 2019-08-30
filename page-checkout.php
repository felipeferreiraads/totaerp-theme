<?php get_header(); the_post(); ?>

    <section class="banner-internal">
        <div class="container">
            <h1>Finalize sua compra</h1>
            <p><?php the_field('subtitulo'); ?></p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
    </section>

    <section class="content">
        <div class="container">
            <div class="box-form">
                <form class="checkout-form step-one">
                    <div class="field full">
                        <label for="nome">Primeiro, informe seu CNPJ</label>
                        <input type="text" name="nome" class="cnpj" placeholder="Digite seu CNPJ"></span>
                    </div>
                    <div class="field full">
                        <button class="ui-button">Enviar</button>
                    </div>
                </form>
                <form class="checkout-form step-two">
                    <input type="hidden" name="produtos" value="<?php echo get_field('codigo_do_pacote'); ?>">
                    <input type="hidden" name="usuarioCad" value="0">
                    <input type="hidden" name="formaPag" value="B">
                    <input type="hidden" name="dataVencimento" value="05">
                    <div class="field">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" class="cnpj" placeholder="Digite seu CNPJ"></span>
                    </div>
                    <div class="field">
                        <label for="razao">Razão social</label>
                        <input type="text" name="razao" placeholder="Digite sua Razão Social"></span>
                    </div>
                    <div class="field">
                        <label for="logradouro">Endereço</label>
                        <input type="text" name="logradouro" placeholder="Digite seu endereço"></span>
                    </div>
                    <div class="field">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" placeholder="Digite seu número"></span>
                    </div>
                    <div class="field">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" placeholder="Digite seu complemento"></span>
                    </div>
                    <div class="field">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" placeholder="Digite seu CEP"></span>
                    </div>
                    <div class="field">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" placeholder="Digite seu bairro"></span>
                    </div>
                    <div class="field flex">
                        <div class="field">
                            <label for="estado">Estado</label>
                            <div class="select">
                                <select id="estado" name="estado">
                                    <option value="" selected disabled>Escolha o estado</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label for="municipio">Cidade</label>
                            <div class="select">
                                <select name="municipio" id="cidade">
                                    <option value="" selected hidden>Primeiro selecione o estado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label for="tel">Telefone</label>
                        <input type="text" name="tel" placeholder="Digite seu Telefone"></span>
                    </div>
                    <div class="field">
                        <label for="respNome">Nome do responsável</label>
                        <input type="text" name="respNome" placeholder="Digite seu CNPJ"></span>
                    </div>
                    <div class="field">
                        <label for="respCpf">CPF do responsável</label>
                        <input type="text" name="respCpf" class="cpf" placeholder="Digite seu CNPJ"></span>
                    </div>
                    <div class="field">
                        <label for="respEmail">E-mail do responsável</label>
                        <input type="text" name="respEmail" placeholder="Digite seu CNPJ"></span>
                    </div>
                    <div class="field full">
                        <button class="ui-button">Enviar</button>
                    </div>
                </form>
                <div class="checkout-message"></div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>