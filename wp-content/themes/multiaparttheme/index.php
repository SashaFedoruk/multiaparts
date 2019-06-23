<?php get_header(); ?>
    <div class="wrap">
        <div class="picture">
            <h1>Апартаменты в аренду</h1>
            <img src="<?php bloginfo('template_directory'); ?>/img/1.jpg" alt="Header image">
        </div>
        <div class="online-info-block">
            <h2>Оплата онлайн</h2>
            <p>Принимается оплата онлайн при резервации недвижимости посредством заявки от клиента и предоставления платёжных реквизитов. При регистрации онлайн скидка 10%.</p>
            </div>
    </div>

    <div class="content">
       
        <div class="content-title">
            <h2>Апартаменты</h2>
            </div>

        <div class="money-change money-exchange">
            <div class="money-block">
                <p>Валюта</p>
                <select class="notranslate">
                    <option value="USD">$</option>
                    <option value="EUR">€</option>
                    <option value="RUB">rub</option>
                    <option value="PLN" selected>zł</option>
                </select>
            </div>
        </div>
        <?php 
        
        
        $posts = get_posts(array('category_name' => 'Без категории', 'post_type' => 'post'));
        foreach($posts as $post){
                setup_postdata($post);
                get_template_part( 'post' );
        }
        wp_reset_postdata();
        $postsVillage = get_posts(array('category_name' => 'Виллы', 'post_type' => 'post'));
        if(count($postsVillage) > 0){
            ?>
            <div class="content-title villa">
                <h2>Виллы</h2></div>
            <?php
            foreach($postsVillage as $post){
                setup_postdata($post);
                get_template_part( 'post' );
            }
             wp_reset_postdata();
        }
        get_footer();
        ?>