<?php get_header(); the_post(); ?>

    <section class="banner-internal">
        <div class="container">
            <span class="blog">Blog TotaERP</span>
            <h1><?php echo get_the_title(); ?></h1>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bg-stats.svg" alt="TotaERP">
        <div class="share-box white">
            <span class="title">Compartilhar</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="share-link">
                <span class="icon-facebook"></span>
            </a>
            <a href="http://twitter.com/share?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" class="share-link">
                <span class="icon-twitter"></span>
            </a>
            <a href=https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>" class="share-link">
                <span class="icon-linkedin"></span>
            </a>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="breadcrumbs">
                <a href="<?php echo home_url('/'); ?>">Início</a>
                <span class="fa fa-chevron-right"></span>
                <a href="<?php echo home_url('/blog/'); ?>">Blog</a>
                <span class="fa fa-chevron-right"></span>
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </div>
            <div class="grid-blog">
                <div class="text-internal">
                    <?php the_content(); ?>
                    <div class="share-box">
                        <span class="title">Compartilhar</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="share-link">
                            <span class="icon-facebook"></span>
                        </a>
                        <a href="http://twitter.com/share?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" class="share-link">
                            <span class="icon-twitter"></span>
                        </a>
                        <a href=https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>" class="share-link">
                            <span class="icon-linkedin"></span>
                        </a>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>