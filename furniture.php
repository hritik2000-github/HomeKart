<?php 

session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeKart</title>
    <link rel="stylesheet" href="pstyle.css">
    <link rel="stylesheet" href="home1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
body {
 background:#000000;
 color: #FFFFFF;
}
ul{
    list-style: none;
    float: right;
    margin-top: 0px;
}
ul li
{
display: inline-flex;
}
ul li a{
    text-decoration: none;
    color:#fff;
    padding: 5px 20px;
    
    transition: 0.5s;
}
ul li a:hover{
    background: none;
    color:#000;

}
.cart {
    float: right;
width: 35px;
cursor: pointer;
margin-left: 40px;
}
.cart:hover{
    background: none;
    color: #000;
}
.logo{
    margin-top: 20px;
    width: 120px;
}

footer{
    position:static;
	left: 0;
	right:0;
    height: 35vh;
	 width: 100%;
    padding-left: 5%;
    padding-right: 5%;
    padding: 3px;
    background-color: #000;
    color: #fff;
    margin-bottom: 0px;
    align-items: center;
	font-size: 13px;
}
.contact{
    color: #fff;
    text-decoration: none;
    text-align: center;
    text-decoration: none;
    margin-left: 0px;
}

.social{
   padding-top: 0%;
   margin-left: 50px;
   cursor: pointer;
   margin-left: 30%;
   margin-right: 30%;
  
}
.social img{
    width: 25px;
    
 
</style>




</head>
<body >

    <div class="header">
        <div class="container">
            <div class="navbar">
            <a href="home.php"> <img src="logo.png" alt="HomeKart" class="logo"> </a>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li> <a class="nav-link" href="mycart.php"> <img src="icon.png"> <?php echo "WELCOME ". $_SESSION['username']?></a></li>
                    </ul>
                </nav>
                <a href="mycart.php">  <img src="cart.png" alt="CART" class="cart"></a>
                           
</div>



    <div class="small-container">
        <h2 class="title">FURNITURES</h2>
        <div class="row">

        <div class="col-4">
        <form action="manage_cart.php" method="POST">
                <img src="furnitures/furniture-1.jpg">
                <h4>White double sized bed</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>Rs.49999</p>
                <button type="submit"  name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                <input type="hidden" name="Item_Name" value="Double Sized Bed">
                <input type="hidden" name="Price" value="49999">
        </form>
            </div>           


<div class="col-4">
<form action="manage_cart.php" method="POST">

<?php

include 'config.php';

$sql = "SELECT * FROM products;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
   
        $img = mysqli_query($conn, "SELECT * FROM products");
        $check = "furniture";
       
        
     while ($row = mysqli_fetch_array($img)) {  
      
        if($row['ptype']==$check){
      	echo "<img src='furnitures/".$row['image']."' >"; 
          echo "$row[name]"; 
         echo "<br>";
         echo "<div class='rating'>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
     </div>";
         echo "Rs.$row[price]";
         echo "<br>";

         echo"
         <button type='submit'  name='Add_To_Cart' class='btn btn-info'>Add To Cart</button>
         <input type='hidden' name='Item_Name' value='$row[name]'>
         <input type='hidden' name='Price' value='$row[price]'>
";
       
    }
}
}
?>
</form>
</div>




        </div>


         

            <h2 class="title">HOME DECORATION</h2>
            <div class="row">

            
            <div class="col-4">
            <form action="manage_cart.php" method="POST">
                    <img src="home_decoration/5.jpg">
                    <h4>FLOWER POT</h4>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                    <p>Rs.499</p>
                    <button type="submit"  name="Add_To_Cart" class="btn btn-info">Add To Cart</button>
                <input type="hidden" name="Item_Name" value="flower Pot">
                <input type="hidden" name="Price" value="499">
            </form>
                </div>

                <div class="col-4">
                <form action="manage_cart.php" method="POST">

                <?php

include 'config.php';

$sql = "SELECT * FROM products;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
   
        $img = mysqli_query($conn, "SELECT * FROM products");
        $check = "home-decoration";
     while ($row = mysqli_fetch_array($img)) {  
        if($row['ptype']==$check){   
      	echo "<img src='images/".$row['image']."' >"; 
          echo "$row[name]"; 
         echo "<br>";
         echo "<div class='rating'>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
         <i class='fa fa-star'></i>
     </div>";
         echo "Rs.$row[price]";
         echo "<br>";
         echo"
         <button type='submit'  name='Add_To_Cart' class='btn btn-info'>Add To Cart</button>
         <input type='hidden' name='Item_Name' value='$row[name]'>
         <input type='hidden' name='Price' value='$row[price]'>
";


        }
    }
}

?>
                </form>
</div>
                
               


            <footer>
                <div class="contact">
                <p> Contact Us <br> 
                <a href="gmail.com">help@homekart.com </a><br>Ph no.- 986546546</p><br>
                <p> Privacy Policy</p><br>
                <p>Terms and Conditions</p>
                <div class="social">
                   <br> <img src="ig.png" alt="Instagram">
                    <img src="fb.png" alt="Facebook">
                    <img src="t.png" alt="Twitter">
            
                </div>
                <p><br><br><br> Designed by Team Code</p>
                
                </div>
            
            </footer>

</body>
</html>