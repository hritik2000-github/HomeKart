<?php
session_start();
$con = mysqli_connect("localhost","root","","homekart");

if(mysqli_connect_error()){
    echo"
    <script>
  alert('can't connect to database');
    window.location.href='mycart.php';
    </script>
    ";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  
    if(isset($_POST['purchase'])){

      $query1 =  "INSERT INTO `order_manager`(`Full_Name`, `Phone_No`, `Email`, `Address`, `Pay_Mode`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[email]','$_POST[address]','$_POST[pay_mode]')";

      if(mysqli_query($con,$query1)){
     
        $Order_Id=mysqli_insert_id($con);
     $query2 = "INSERT INTO `user_orders`(`Order_id`, `Item_Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
     $stmt = mysqli_prepare($con,$query2);

     
      unset($_SESSION['cart']);
      $name = $_POST['full_name'];
      $email1 = $_POST['email'];
      $address = $_POST['address'];
      $pay_mode = $_POST['pay_mode'];
     
      $subject = "Hey $name,Your Order Has Been Placed!!";
      $body = "

      Woo hoo! Your order is on its way. Your order will be delivered within FIVE business days.
      
      PAYMENT METHOD: $pay_mode

      SHIPPING ADDRESS: $address


      Thank You for shopping with Us..
      
      ";
      $sender = "From:noreply.homekart@gmail.com";
      
      if (mail($email1, $subject, $body, $sender)) {
        $email2 = "ishiqwer@gmail.com";
        $subject2 = "Order Received !!";
        $body2 = "Hey, You received an order";
        mail($email2, $subject2, $body2,$sender);
          echo "Thank You For Shopping With Us";
         
      } else {
          echo "Email sending failed...";
      }

      echo"
      <script>
    
     window.location.href='thankyou.php';
      </script>
      ";
     }
     else{
        echo"
        <script>
      alert('SQL Query Prepare Error');
        window.location.href='mycart.php';
        </script>
        ";
     }
      }
      else{
        echo"
        <script>
      alert('SQL Error');
        window.location.href='mycart.php';
        </script>
        ";
      }
    }



?>