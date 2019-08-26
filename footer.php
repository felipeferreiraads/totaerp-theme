    <section class="contact">
        <div class="container">
            <div class="grid">
                <div class="enterprise-info">
                    <h2 class="ui-title white">Entre em contato</h2>
                    <div class="item">
                        <span class="icon icon-phone"></span>
                        <span class="text">(41) 3503 1002</span>
                    </div>
                    <div class="item">
                        <span class="icon icon-headset"></span>
                        <span class="text">(41) 3503 1004</span>
                    </div>
                    <div class="item">
                        <span class="icon icon-whatsapp"></span>
                        <span class="text">(41) 99870.5557</span>
                    </div>
                    <div class="item">
                        <span class="icon icon-mail"></span>
                        <span class="text">contato@totalerp.com.br</span>
                    </div>
                    <div class="item">
                        <span class="icon icon-location"></span>
                        <span class="text">Avenida Visconde de Guarapuava, 2764 Cj.1001<br>Curitiba - PR - 80030-070</span>
                    </div>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="190" title="Formulário de contato" html_class="ui-form" html_id="formContatoRodape"]'); ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="grid">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-footer.svg" alt="TotalERP">
                </a>
                <div class="social">
                    <a href="http://facebook.com/totalerp/" target="_blank" aria-label="Facebook" rel="noopener">
                        <span class="icon-facebook" aria-label="Facebook"></span>
                    </a>
                    <a href="https://www.linkedin.com/company/totalerp-sistema-de-gestao-empresarial-online/" target="_blank"  aria-label="LinkedIn" rel="noopener">
                        <span class="icon-linkedin" aria-label="LinkedIn"></span>
                    </a>
                    <a href="https://twitter.com/Total_ERP" target="_blank" aria-label="Twitter" rel="noopener">
                        <span class="icon-twitter" aria-label="Twitter"></span>
                    </a>
                    <a href="https://instagram.com/totalerp/" target="_blank" aria-label="Instagram" rel="noopener">
                        <span class="icon-instagram" aria-label="Instagram"></span>
                    </a>
                    <a href="https://www.youtube.com/c/TotalERPMWork" target="_blank" aria-label="YouTube" rel="noopener">
                        <span class="icon-youtube" aria-label="YouTube"></span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <div class="pop-up try-it-pop-up">
        <button class="pop-up-close">
            <span class="icon-close"></span>
        </button>
        <div class="pop-up-content">
            <?php echo do_shortcode('[contact-form-7 id="192" title="Formulário Teste Grátis" html_class="ui-form try-it-pop-up-form" html_id="formTesteGratisModal"]'); ?>
        </div>
    </div>

    <?php
        if(is_page('home')):
            $banner = get_field('imagem_promo', 42);
            $link = get_field('link_promo', 42);
            if(!empty($banner) and !empty($link)): ?>
                <div class="pop-up open">
                    <button class="pop-up-close">
                        <span class="icon-close"></span>
                    </button>
                    <div class="pop-up-content">
                        <a href="<?php echo $link; ?>">
                            <img src="<?php echo $banner; ?>" alt="Promoção">
                        </a>
                    </div>
                </div><?php
            endif;
        endif;
    ?>

    <?php wp_footer(); ?>
    <script>
        var TEMPLATE_URL = '<?php echo get_template_directory_uri(); ?>';
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">var Tawk_API=Tawk_API||{},Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=!0;s1.src='https://embed.tawk.to/5b4757404af8e57442dc93b0/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0)})();</script>
    <!--End of Tawk.to Script-->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bundle.min.js"></script>
    <style>
        .grecaptcha-badge { display: none; }
    </style>
</body>

</html>