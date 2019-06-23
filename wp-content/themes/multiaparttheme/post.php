<div class="apart">
    <div class="flat">
        <div class="info-block">
            <div class="image">
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
            <div class="text">
                <div class="text-block">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                      
                        <?php 
                         //the_post();
                         the_excerpt(); 
                        
                        
                        ?>
                    
                </div>
                <div class="text2-block">
                    <h4>Спальных мест: <span class="notranslate"><?php echo get_post_custom_values( 'sleepingPlace' )[0]; ?></span></h4>
                    <h4>Количество комнат: <span class="notranslate"><?php echo get_post_custom_values( 'rooms' )[0]; ?></span></h4>
                </div>
            </div>
        </div>
        <div class="panel-block">
            <div class="price-block">
                <h3><span class="price notranslate" value="<?php echo get_post_custom_values( 'price' )[0]; ?>"><?php echo get_post_custom_values( 'price' )[0]; ?> </span><span class="rate notranslate">zł</span>/сутки</h3>
            </div>
            <div class="btn-block">
                <a href="<?php the_permalink() ?>">Смотреть</a>
                <a href="<?php the_permalink() ?>/#openModal" data-id="<?php the_id(); ?>">Оплатить</a>
            </div>
        </div>
    </div>
</div>