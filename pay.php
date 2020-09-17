<?php
    $product_name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    include './instamojo/instamojo.php';
    // $authType = "app/user"; /**Depend on app or user based authentication**/
    // $api = Instamojo\Instamojo::init($authType,[
    //     "client_id" =>  'test_edd5f76577b52c19eb08ebef02b',
    //     "client_secret" => 'test_df6e62fa8e4e1dc3bbdcf6eed80',
    //     "username" => 'FOO', /** In case of user based authentication**/
    //     "password" => 'XXXXXXXX' /** In case of user based authentication**/

    // ],true); /** true for sandbox enviorment**/
    $api = new Instamojo\Instamojo('test_edd5f76577b52c19eb08ebef02b','test_df6e62fa8e4e1dc3bbdcf6eed80','https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $product_name,
            "amount" => $price,
            "send_email" => true,
            "email" => "$email",
            "buyer_name" => "$name",
            "phone" => "$phone",
            "send_sms" => true,
            "allow_repeated_payments"=> false,
            "redirect_url" => "https://careprovider.000webhostapp.com/CarerSystem/CarerSystem/thankyou.php",
            //"webhook" => ""
            ));
      //  print_r($response);
      $pay_url =$response['longurl'];
      header("location: $pay_url");
    }
    catch (Exception $e) {
        print('Error: ' . $e->getMessage());
    }

?>