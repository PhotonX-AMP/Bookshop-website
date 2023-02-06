<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="checkout-panel">
    <div class="panel-body">
      <h2 class="title">Checkout here!</h2>
        <div class="progress-bar">
        <div class="step active"></div>
        <div class="step active"></div>
        <div class="step"></div>
        <div class="step"></div>
      </div>
      
      <div class="payment-method">
        <label for="card" class="method card">
          <div class="card-logos">
            <img src="https://designmodo.com/demo/checkout-panel/img/visa_logo.png"/>
            <img src="https://designmodo.com/demo/checkout-panel/img/mastercard_logo.png"/>
          </div>
   
          <div class="radio-input">
            <input id="card" type="radio" name="payment">
            Pay AU$20.99 with credit card
          </div>
        </label>
   
        <label for="paypal" class="method paypal">
          <img src="https://designmodo.com/demo/checkout-panel/img/paypal_logo.png"/>
          <div class="radio-input">
            <input id="paypal" type="radio" name="payment">
            Pay AU$20.99 with PayPal
          </div>
        </label>
      </div>
   
      <div class="input-fields">
        <div class="column-1">
          <label for="cardholder">Name</label>
          <input type="text" id="cardholder" />
   
          <div class="small-inputs">
            <div>
              <label for="date">Valid date</label>
              <input type="text" id="date"/>
            </div>
   
            <div>
              <label for="verification">CVV / CVC *</label>
              <input type="password" id="verification"/>
            </div>
          </div>
   
        </div>
        <div class="column-2">
          <label for="cardnumber">Card Number</label>
          <input type="password" id="cardnumber"/>
   
          <span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
        </div>
      </div>
    </div>
   
    <div class="panel-footer">
      <button class="btn back-btn">Back</button>
      <button class="btn next-btn">Next Step</button>
    </div>
  </div>

  <script src="main.js"></script>
  </body>
  </html>
  