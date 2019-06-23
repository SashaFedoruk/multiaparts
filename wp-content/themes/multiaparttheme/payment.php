<?php
/**
 * Template Name: Payment
 * This template will only display the content you entered in the page editor
 */

 require_once( dirname( __FILE__ ) . '/boot.php');



if(empty($_POST['payment_method_nonce'])){
    wp_redirect(home_url());
}

//var_dump($_POST);
    
$result = $gateway->transaction()->sale([
  'amount' => floatval($_POST['amount']),
  'paymentMethodNonce' => $_POST['payment_method_nonce'],
  'customer' => [
    'firstName' => $_POST['firstname'],
    'lastName' => $_POST['lastname'],
    'email' => $_POST['email']
  ], 
  'options' => [
    'submitForSettlement' => true
  ]
]);
if($result->success === true){
    echo "<br>OK!<br>";
} else{
    print_r($result->errors);
    die();
}
?>


<p>
    HELLO
</p>