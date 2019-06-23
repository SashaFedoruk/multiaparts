<?php get_header(); ?>
    <div class="contents">
        <div class="title">
            <div class="first">
                <h2><?php the_title(); ?></h2>
                <div class="money money-exchange">
                    <p>Валюта</p>
                    <select class="notranslate">
                        <option value="USD">$</option>
                        <option value="EUR">€</option>
                        <option value="RUB">rub</option>
                        <option value="PLN" selected>zł</option>
                    </select>
                </div>
            </div>
            <div class="second">
                <h3><span class="price notranslate" value="<?php echo get_post_custom_values( 'price' )[0]; ?>"><?php echo get_post_custom_values( 'price' )[0]; ?></span><span class="money rate notranslate"> zł</span>/сутки</h3>
                <div class="btn-block">
                    <a href="#openModal" data-id="<?php the_id(); ?>">Перейти к оплате</a>
                </div>
            </div>
        </div>
        <?php $images = get_attached_media( 'image', get_the_ID()); ?>


            <div class="image-block">
                <?php
                if ( has_post_thumbnail() ) {
                    ?>
                    <img src="<?php the_post_thumbnail_url();  ?>" alt="post-img">
                    <?php
                    
                } else{
                ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/no-img.png" alt="no-img">
                        <?php } ?>
            </div>

            <div class="all-image">
                <?php
            if ( has_post_thumbnail() ) {
                    ?>
                    <div class="image"><img src="<?php the_post_thumbnail_url();  ?>" alt="Image for post"></div>
                    <?php
                    
            }
            foreach($images as $image){ ?>
                        <div class="image"><img src="<?php echo $image->guid; ?>" alt="Image for post"></div>
                        <?php } ?>
            </div>

            <?php
                
                the_post();
                $content = get_the_content();
                $content = preg_replace("/<img[^>]+\>/i", " ", $content);          
                $content = apply_filters('the_content', $content);
                $content = str_replace(']]>', ']]>', $content);
                echo $content;
                ?>


                <div class="mapa-block">
                    <?php echo do_shortcode('[wpgmza id="1"]'); ?>


                </div>
                <!--            <?php echo do_shortcode('[wp_braintree_button item_name="tmp" item_amount="2" show_form="1"]'); ?>-->


    </div>


    <?php get_footer(); ?>