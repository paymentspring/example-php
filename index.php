<?php
if($_POST && $_POST['token']) {

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://test_25e414a1213973ea81a7ceaec9:@api.paymentspring.com/api/v1/charge");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, true);

   $data = array(
       'token' => $_POST['token'],
       'amount' => "20000"
   );

   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
   $response = curl_exec($ch);
   $info = curl_getinfo($ch);
   curl_close($ch);

   $response = json_decode($response);

   if(isset($response->errors)) {
       $errors = $response->errors;
       require('views/payment_form.php');
   } else {
       require('views/success.php');
   }
} else {
   require('views/payment_form.php');
}

?>
