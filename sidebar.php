<aside class="sidebar">
    <div class="box">
        <h2 class="ui-title">Artigos mais lidos</h2>
        <nav>
        <?php
            $most_viewed = new WP_Query([
                'posts_per_page' => 3,
                'meta_key' => 'my_post_viewed',
                'orderby' => 'meta_value_num',
                'order'=> 'DESC'
            ]);

            while($most_viewed->have_posts()): $most_viewed->the_post();
                echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
            endwhile;

            wp_reset_postdata();
        ?>
        </nav>
    </div>
    <div class="box">
        <h2 class="ui-title">Categorias</h2>
        <nav>
        <?php
            $categories = get_categories();
            foreach($categories as $cat):
                $posts = new WP_Query([
                    'post_type' => 'post',
                    'cat' => $cat->term_id
                ]);

                echo '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.' ('.$posts->found_posts.')</a>';
            endforeach;

            wp_reset_postdata();
        ?>
        </nav>
    </div>
    <div class="box">
        <form action="/" class="searchform">
            <input type="text" name="s" placeholder="Pesquisar">
            <button>
                <span class="icon-search"></span>
            </button>
        </form>
    </div>
</aside>