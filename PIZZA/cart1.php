<?php
$insert=false;
if(isset($_POST['name'])){
$con=mysqli_connect('localhost','root','');
if(!$con){
die("connection failed".mysqli_connect_error());
}

$submit=true;
$item_name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$custom = $_POST['custom'];

$sql="INSERT INTO `details`.`data` ( `item_name`, `email`, `phone`, `custom`) VALUES ('$item_name', '$email', '$phone', '$custom');";
//echo $sql;

if($con->query($sql)==true){
   //.. echo "success";
   $insert=true;
}
else{
    echo "error: $sql <break> $con->error";

}
$con->close();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaHouse</title>
	<link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/81c2c05f29.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="nav">
        <div class="logo"><img class="logo-img" src="logo.png" height="55px" width="55px"><p>PizzaHouse</p></div>
        <ul class="nav-links">
            <li class="links" id="#home"><a href="index.html#home">Home</a></li>
        </ul>
    </nav>
    
  <?php

  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'details');

 if($con){
      echo "connection";
  }
  else {
      echo "no connection";
  }
  $query="SELECT * FROM menu WHERE ID = 1 ";
  $queryfire=mysqli_query($con,$query);
  $num=mysqli_num_rows($queryfire);
  if($num>0){
      while($product=mysqli_fetch_array($queryfire)){
          ?>
  

    <section class=" sec cart-grid" id="home">
        <h1 class="heading">Cart</h1>
        <div class="cart">
            <div class="box1">
                <div class="product">
                    <div class="content1">
                        <img src="1.jpg" alt="pizza" height="250px" width="250px">
                        <div class="info">
                            <h1 >Origial pizza</h1>
                            <p>Tomato sauce, mozzarella & oregano</p>
                            <p>price: &#8377 100</p>
                        </div>
    
                    </div>
                    <div class="content2">
                        <button class="order">Order Now</button>

                    </div>
                </div>
                
            </div>
            <div class="box2">
                <form class="form" action="form.php" method="post">
                    <label for="item_name">item name:</label>
                    <input class="input" type="text" id="item_name" name="item_name" value="<?php echo
                     $product['item_name'];?>" readonly>
                    <label for="price">price per piece:</label>
                    <input class="input" type="text" id="price" name="price" value="<?php echo
                     $product['price'];?>" readonly>
                    <label for="name">Name:</label>
                    <input class="input" type="text" name="name" id="name" placeholder="enter your name">
                    <label for="email">Email:</label>
                    <input class="input" type="email" name="email" id="email" placeholder="enter your email">
                    <label for="phone">Phone Number:</label>
                    <input class="input" type="phone" name="phone" id="phone" placeholder="enter your phone number">
                    <label for="address">Addressr:</label>
                    <input class="input" type="address" name="address" id="address" placeholder="enter your address">
                    <label for="custom">Any customizations:</label>
                    <select class="input" name="custom" id="custom" placeholder="any customizations">
                        <option value="None">None</option>
                        <option value="Extra Cheese">Extra Cheese</option>
                        <option value="Extra Chilli Flakes">Extra Chilli Flakes</option>
                        <option value=">Extra Veggies">Extra Veggies</option>
                    </select>
                    <label for="quantity">Quantity:</label>
<input class="input" type="number" id="quantity" name="quantity" min="1" max="100">
                    <button class="btn btn-success">Submit</button>         
                </form>
            </div>
        </div>
    </section>

    <footer class="footer" id="footer"> 
        <div class="f-1">
            <div class="flogo">
                <img class="logo-img" src="logo.png" height="55px" width="55px"><p>PizzaHouse</p></div>
            </div>

        <div class="f-2">
            <p class="fhead"><b>Explore</b></p>
            <p class="fsub"><a href="#home">Home</a></p>
            <p class="fsub"><a href="#menu">Menu</a></p>
            <p class="fsub"><a href="#about">About US</a></p>
        </div>

        <div class="f-3">
            <p class="fhead"><b>Visit</b></p>
            <p class="fsub">beside Aptronix</p>
            <p class="fsub">Dr.A.S.Rao Nagar main road</p>
            <p class="fsub">Hyderbad,TS</p>
        </div>

        <div class="f-4">
            <p class="fhead"><b>Follow</b></p>
            <p class="fsub">Instagram</p>
            <p class="fsub">Twitter</p>
            <p class="fsub">Facebook</p>
        </div>

        <div class="f-5">
            <p class="fhead"><b>Legal</b></p>
            <p class="fsub">terms</p>
            <p class="fsub">privacy</p>
        </div>

    </footer>
    <?php
      }

    }
      ?>

    <script src="index.js"></script>
</body>
</html>