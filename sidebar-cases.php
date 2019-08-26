<aside class="sidebar">
    <div class="box">
        <h2 class="ui-title">Segmentos</h2>
        <nav>
        <?php
            $categories = get_terms([
                'taxonomy' => 'cat_case',
                'hide_empty' => false
            ]);

            foreach($categories as $cat):
                echo '<a href="'.home_url('/cases/').'?cat_case='.$cat->term_id.'">'.$cat->name.'</a>';
            endforeach;

            wp_reset_postdata();
        ?>
        </nav>
    </div>
</aside>