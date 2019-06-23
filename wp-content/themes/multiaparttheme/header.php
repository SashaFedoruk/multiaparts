<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css">

    <title>
        <?php bloginfo('name'); ?>
    </title>
    <?php wp_head(); ?>

        <body>
            <div class="header-block">
                <div class="header">
                    <div class="logo notranslate"><a href="<?php echo home_url(); ?>">MultiAparts</a></div>
                    <div class="panel">
                        <div class="language">
							<?php echo do_shortcode('[google-translator]'); ?>

							<?php
							// Блин, чувак! Сделай по нормальному! Выводи языки которые выбраны в плагине переводчика! Да, сделай нормально, а то непонятно никому!
							// 
							/*
                            <ul>
                                <li>
                                    <a title="Russian" class="notranslate flag ru Russian" data-lang="Russian">
										<img src="<?php bloginfo('template_directory'); ?>/img/rus.png" alt="Русский">
									</a>
                                </li>
                                <li>
                                    <a title="Polish" class="notranslate flag pl Polish" data-lang="Polish">
                                        <img src="<?php bloginfo('template_directory'); ?>/img/pl.png" alt="Польский">
                                    </a>
                                </li>
                                <li>
                                    <a title="English" class="notranslate flag en united-states" data-lang="English">
                                        <img src="<?php bloginfo('template_directory'); ?>/img/en.png" alt="Английский">
                                    </a>
                                </li>
                            </ul>*/ ?>
                        </div>
                        <div class="adres" id="control_lang">
                            00-819, Варшава, ul.Zlota 61/100, Польша
                        </div>
                    </div>
                </div>
            </div>