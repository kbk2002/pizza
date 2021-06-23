<?php
$insert=false;
if(isset($_POST['name'])){
$con=mysqli_connect('localhost','root','');
if(!$con){
die("connection failed".mysqli_connect_error());
}

$submit=true;

$item_name = $_POST['item_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address=$_POST['address'];
$custom = $_POST['custom'];

$sql="INSERT INTO `details`.`data1` ( `item_name`, `price`, `quantity`,`name`, `email`, `phone`, `address`, `custom`) VALUES ('$item_name', '$price', '$quantity','$name', '$email', '$phone','$address', '$custom');";
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
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PizzaHouse</title>
	<link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="fstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/81c2c05f29.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
<?php 
       if($insert==true){
        

        echo '<script>alert("Your Order Has Been Placed")</script>';
        }
?>

    <div class="backtohome">
        <a href="index.html"><i class="fas fa-chevron-left"></i> Back To Home</a>
    </div>
    <div class="content">
        <img class="img" src="ship.png" alt="shipping" class="delivery">
        <p class="content1"><i class="fas fa-check-circle"></i>Your order has been placed and will soon be delivered.</p>
    </div>
</body>
</html>