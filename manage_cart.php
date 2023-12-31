<?php
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['Add_To_Cart'])){
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
        }
        
        if(isset($_SESSION['cart'])){
            $myitems = array_column($_SESSION['cart'],'Item_Name');
            if(in_array($_POST['Item_Name'],$myitems)){
                echo"<script>
                alert('Product Already Added In The cart');

                 
                    window.location.href = '$_SERVER[HTTP_REFERER]';
                </script>";
               
            }
            else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('Item_Name' =>$_POST['Item_Name'],'Price' =>$_POST['Price'],'Quantity' =>1);
            echo"<script>
            alert('Product Added In The cart');
            window.location.href = '$_SERVER[HTTP_REFERER]';
            </script>";
            }
        }
        else{
          $_SESSION['cart'][0]=array('Item_Name' =>$_POST['Item_Name'],'Price' =>$_POST['Price'],'Quantity' =>1);
          print_r($_SESSION['cart']);
          echo"<script>
          alert('Product Added In The cart');
          window.location.href = '$_SERVER[HTTP_REFERER]';
          </script>";
        }
    }

    if(isset($_POST['Remove_Item'])){
        foreach($_SESSION['cart'] as $key =>$value){
            if($value['Item_Name']==$_POST['Item_Name']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"
                <script>
                alert('Product Removed From The cart');
                window.location.href='mycart.php';
                </script>
                ";
            }
        }
    }

    if(isset($_POST['Mod_Quantity'])){

        foreach($_SESSION['cart'] as $key =>$value){
            if($value['Item_Name']==$_POST['Item_Name']){
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
              
                echo"
                <script>
              
                window.location.href='mycart.php';
                </script>
                ";
            }
        }

    }
}



?>