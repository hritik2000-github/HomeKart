<?php 

session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<title>Edible items</title>
<link rel="stylesheet" href="pstyle.css">
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
    
}

table{
    background: #fff;
}
.checkout{
    color: #000;
}
.checkout1{
    color: #000;
    text-align: right;
}

.form-group{
    color: #000;
}
</style>
</head>

<body>
 <div class="container">
        <div class="navbar">
        <a href="home.php"> <img src="logo.png" alt="HomeKart" class="logo"> </a>
    <nav>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="about.php">ABOUT US</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li> <a class="nav-link" href="#"> <img src="icon.png"> <?php echo "WELCOME ". $_SESSION['username']?></a></li>

                </ul>
    </nav>
    </div>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center my-5">
            <h1>My Cart</h1>
        </div>

<div class="col-lg-9">

<table class="table">
  <thead class="text-center">

    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Product name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class="text-center">
  <?php
   
      if(isset($_SESSION['cart'])){
      foreach($_SESSION['cart'] as $key => $value){
          $sr = $key + 1;
         
          echo"
          <tr>
          <td>$sr</td>
          <td>$value[Item_Name]</td>
          <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
          <form action='manage_cart.php' method='POST'>
          <td><input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
          <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
          </form>
          </td>
          <td class='itotal' ></td>
          <td>
          <form action='manage_cart.php' method='POST'>
          <button name='Remove_Item' class=btn btn-sm btn-outline-danger'>REMOVE</button>
          <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
          </form>
          </td>
          </tr>
          ";
      }
     
    }
   
      ?>
  
  </tbody>
</table>

</div>

<div class="col-lg-3">
    <div class="border bg-light rounded p-4">
    <h4 class="checkout">Grand Total:</h4>
    <h5 class="checkout1" id="gtotal"></h5>

    <?php 
      if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
      {
    ?>
    <form action="purchase.php" method="POST">
   
    <div class="form-group">
   
    <input type="text" name="full_name" placeholder="Full Name" class="form-control" required>
  </div>
<br>
  <div class="form-group">
    
    <input type="phone" name="phone_no" placeholder="Phone Number" class="form-control" required>
  </div>
<br>

<div class="form-group">
   
   <input type="text" name="email" placeholder="Email" class="form-control" required>
 </div>
 <br>

  <div class="form-group">
   
    <input type="text" name="address" placeholder="Address" class="form-control" required>
  </div>
  <br>
    <div class="checkout form-check1">
  <input class="form-check-input1" type="radio" name="pay_mode" value="COD" id="flexRadioDefault2" checked>
  <label class="form-check-label1" for="flexRadioDefault2">
    Cash On Delivery
  </label>
</div>

<div class="checkout form-check1">
  <input class="form-check-input1" type="radio" name="pay_mode" value="Debit Card" id="flexRadioDefault2" checked>
  <label class="form-check-label1" for="flexRadioDefault2">
    Debit Card
  </label>
</div>
        <button class="btn btn-primary btn-block" name="purchase">Place Order</button>
        
    </form>
    <?php
      }
      ?>
    </div>
</div>

    </div>
   
</div>

<script>
    var gt = 0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function subTotal(){
        gt = 0;
        for(i=0;i<iprice.length;i++){
          itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
          gt = gt + (iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText = gt;
    }
    subTotal();
</script>

</body>


</html>