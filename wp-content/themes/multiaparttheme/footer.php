<p>
    <?php 
    $flag = false;
    ?>
</p>
<div class="footer-block">
    <div class="footer">
        <div class="logo"><a href="#">MultiAparts</a></div>
        <div class="panel">
            
        <div class="adres notranslate">
                <div class="adres"> <i>NIP:</i> 123-128-53-45
                    <br><i>REGON:</i> 147177144
<br><i>KRS:</i> 0000505038
                    <br><i>TEL:</i> +48 511 77 14 69
                    <br><i>WhatsApp:</i> +48 511 51 51 51
                    <br><i>EMAIL:</i> reception@multifrozen.pl</div>
            </div></div>
    </div>
    <div class="regulamin">
     <b class="notranslate">Multifrozen Sp. z o.o.
    ul.Zlota 61/100, 00-819 Warszawa</b>
		<i id="lang_tag1"><a href="http://multiaparts.com/wp-content/themes/multiaparttheme/files/Regulamin.pdf" target='_blank'>Regulamin</a></i>	
		
   </div>
</div>

<div id="openModal" class="modalDialog">
    <div class="modalBlock">
        <div class="content-title">
            <h2>Бронирование и оплата</h2></div>
        <a href="#close" title="Закрыть" class="close">X</a>

        <?php if($_POST['datein'] && !isset($_POST["p24_order_id"])){ 
            $datein = DateTime::createFromFormat("m/d/Y", $_POST['datein']); // or your date as well
            $dateout = DateTime::createFromFormat("m/d/Y", $_POST['dateout']);
            $datediff = $datein->diff($dateout);
            $days = $datediff->format("%r%a") + 1;
            $toPay = get_post_custom_values( 'price' )[0] * $days;
            $name = get_the_title();
            $flag = true;
            $desc = "Rezerwacja ".get_the_title()." ".$_POST['datein']." - ".$_POST['dateout'];
            iconv(mb_detect_encoding($desc, mb_detect_order(), true), "UTF-8", $desc);
            ?>

            <form method="GET" action="https://sklep.przelewy24.pl/zakup.php">
                <input type="hidden" name="z24_id_sprzedawcy" value="82798">
                <input type="hidden" name="z24_crc" value="6451accd794a875b">
                <input type="hidden" name="z24_kwota" value="<?php echo $toPay * 100; ?>">
                <input type="hidden" name="z24_return_url" value="<?php echo get_permalink(get_the_ID()); ?>">
                <input type="hidden" name="z24_language" value="pl">
                <input type="hidden" name="z24_nazwa" value="Oplata za rezerwacje.">
                <input type="hidden" name="z24_opis" value="<?php echo $desc; ?>">


                <input name="datein" value="<?php echo $_POST['datein']; ?>" hidden="hidden">
                <input name="dateout" value="<?php echo $_POST['dateout']; ?>" hidden="hidden">
                <input name="number" value="<?php echo $_POST['number']; ?>" hidden="hidden">
                <input name="amount" value="<?php echo $toPay; ?>" hidden="hidden">
                <input type="text" value="<?php echo $_POST['email'] ?>" hidden="hidden" name="email">
                <input type="text" value="<?php echo $_POST['email'] ?>" hidden="hidden" name="k24_email">
                <input type="text" value="<?php the_ID(); ?>" hidden="hidden" name="id">

                <label class="styled-label" for="firstname">
                    <span class="field-name">Имя</span>
                    <input class="input-field" name="firstname" placeholder="Имя" autocomplete="off" required>
                    <div class="invalid-bottom-bar"></div>
                </label>
                <label class="styled-label" for="lastname">
                    <span class="field-name">Фамилия</span>
                    <input class="input-field" name="lastname" placeholder="Фамилия" autocomplete="off" required>
                    <div class="invalid-bottom-bar"></div>
                </label>
                 <label class="styled-label" for="adresslive">
                    <span class="field-name">Адрес проживания</span>
                    <input class="input-field" name="adresslive" placeholder="Адрес проживания" autocomplete="off" required>
                    <div class="invalid-bottom-bar"></div>
                </label>
                <label class="styled-label" for="amount">
                    <span class="field-name">Сумма</span>
                    <input class="input-field" name="amount" placeholder="Фамилия" autocomplete="off" value="<?php echo $toPay." zł " ?>" disabled>
                    <div class="invalid-bottom-bar"></div>
                </label>


                <div id="dropin-container">
                </div>
                <div class="btn-block">
                    <input type="submit" id="pay-btn" value="Перейти к оплате">
                </div>
            </form>



            <?php 
} else if(isset($_GET["result"])){
     
    $flag = true;
//    if($result->success === true){
//        $wpdb->insert( 
//            'reservations', 
//            array( 
//                'userinfo' => $_POST['firstname'].' '.$_POST['lastname'], 
//                'email' => $_POST['email'], 
//                'phone' => $_POST['number'], 
//                'datein' => $_POST['datein'], 
//                'dateout' => $_POST['dateout'],
//                'postid' => get_the_ID()
//            ), 
//            array( 
//                '%s',
//                '%s',
//                '%s',
//                '%s',
//                '%s',
//                '%d'
//            ) 
//        );
        $message = "Резервация: <br>";
        $message .= "Номер резервации: ".$_POST['p24_order_id'];
        $message .= "<br>";
        $message .= "Имя и Фамилия: ".$_POST['firstname'].' '.$_POST['lastname'];
        $message .= "<br>";
        $message .= "Email: ".$_POST['email'];
        $message .= "<br>";
        $message .= "Телефон: ".$_POST['number'];
        $message .= "<br>";
        $message .= "Дата вьезда - выезда: ".$_POST['datein']." - ".$_POST['dateout'];
        $message .= "<br>";
        $message .= "Статус: Оплачено ( ".$_POST['amount']." PLN )";
        $message .= "<br>";
        $message .= "Ссылка на обьект: ".get_permalink();
        $message .= "<br>";
        $userMessageSubject = "Резервация '".get_the_title()."'";
        $userMessage = "Ваша ".$message;
        $messageSubject = "Новая Резервация '".get_the_title()."'";
//        wp_mail($_POST['email'], $userMessageSubject, $userMessage);
//        wp_mail("multiaparts@gmail.com", $messageSubject, $message);
        echo '<div class="info-message">Транзакция была успешно выполнена, подтверждения оплаты отправлено вам на указаный ранее email. </div>';
//    } else{
//        echo '<div class="info-message">Транзакция не была проведена, проверьте вводимые данные и попробуйте ещё раз!</div>';
//        die();
//    }
} else { 
//        $anvailableDates = $wpdb->get_results( 
//            "SELECT datein, dateout 
//            FROM reservations
//            WHERE postid = ".get_the_ID()
//        );
        $rez = "[";
        foreach ( $anvailableDates as $anvailableDate ) 
        {
            $datein = DateTime::createFromFormat("m/d/Y", $anvailableDate->datein); // or your date as well
            $dateout = DateTime::createFromFormat("m/d/Y", $anvailableDate->dateout);
            $period = new DatePeriod(
                 $datein,
                 new DateInterval('P1D'),
                 $dateout
            );
            foreach ($period as $key => $value) { 
                $rez .= "'".$value->format("m/d/Y")."', ";
                //echo $value->format('Y-m-d').' ';
            }
            $rez .= "'".$dateout->format("m/d/Y")."', ";
        }
        $rez = rtrim($rez,", ");
        $rez .= "]";
        echo '<script> var anvailableDates = '.$rez.'; </script>';
        ?>

                <form method="POST" action="<?php get_site_url(); ?>">
                    <input id="post-id" type="text" value="<?php the_ID(); ?>" hidden="hidden">

                    <label class="styled-label notranslate" for="datein">
                        <span class="field-name">Дата вьезда</span>
                        <input id="datein" class="input-field" name="datein" placeholder="Дата заезда" autocomplete="off" required>
                        <div class="invalid-bottom-bar"></div>
                    </label>
                    <label class="styled-label notranslate" for="dateout">
                        <span class="field-name">Дата отьезда</span>
                        <input id="dateout" class="input-field" name="dateout" placeholder="Дата отъезда" autocomplete="off" required>
                        <div class="invalid-bottom-bar"></div>
                    </label>
                    <label class="styled-label" for="email">
                        <span class="field-name">Email</span>
                        <input class="input-field" name="email" placeholder="email@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" autocomplete="off" required>
                        <div class="invalid-bottom-bar"></div>
                    </label>
                    <label class="styled-label" for="number">
                        <span class="field-name">Телефон</span>
                        <input class="input-field" name="number" placeholder="+48 123 456 789" autocomplete="off" required>
                        <div class="invalid-bottom-bar"></div>
                    </label>

                    <div class="check">
                        <input type="checkbox" name="useprivatedata" value="Bike" required>
                        <p><a id="lang_tag2" href="http://multiaparts.com/wp-content/themes/multiaparttheme/files/Regulamin.pdf" target="_blank"> Я принимаю правила</a></p>
                    </div>
                    <div class="btn-block">
                        <input type="submit" value="Перейти к оплате">
                    </div>
                </form>
                <?php } ?>
    </div>
</div>
</div>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/scripts.js"></script>
<?php
if($flag){
    echo '<script>
                    $(".close").attr("href", "'.get_site_url().'");
                </script>';
}

wp_footer(); 

?>
    </body>

    </html>