<?php
session_start();
$name = "";
$id=" ";

if (!isset($_SESSION['email'])) {
    header("location: login.php");
  } else {
    $name = $_SESSION['fname'];
    $id = $_SESSION['id'];
  }
  //echo "<h1> $name </h1>";
  //echo "<h1> $id </h1>";
  

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="product_style.css">
  <title>Sword Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" style="  background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SwordStore.com</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class=""><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Sword</a></li>
              <li><a href="#">Knife</a></li>
              <li><a href="#">Dagger</a></li>
              <li><a href="#">Weapon</a></li>
              <li><a href="#">Antique</a></li>
              <li><a href="#">Other</a></li>
            </ul>
          </li>
          <li><a href="https://www.swordsofmight.com/blog/">Blog</a></li>

          <li><a href="#">About US</a></li>
          <li><a href="#">Contact US</a></li>
          <li style="padding-top: 7px;padding-left: 30px;"><span class="form-group"><input type="text" class="form-control" placeholder="Search"></span></li>
          <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="single/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>
              <?php
              if (!isset($_SESSION['email']))
                echo "Login";
              else
                echo "Logout";
              ?>

            </a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h3>Welcome to this website...</h3>
    <?php

    $con =  mysqli_connect("localhost", "root", "", "sword_store") or die("Sorry!!!!Cannot Connect");
    $sql = "SELECT * FROM product";
    $result = mysqli_query($con, $sql);
    echo "<div class='row'>";
    while ($row = mysqli_fetch_array($result)) {
        for ($i = 1; $i < 5; $i++) {
          echo "<div class='card col-md-3 shadow-sm p-3 mb-5 bg-white rounded col-sm-6 col-xs-12 border'>
				<a href='single/SingleProduct.php?result=" . $row["id"] . "'>
        <div class='card-image'><img class='img-fluid' src='image/" . $i . ".jpg'/></div>	
			<div class='card-body'>
			<div class='card-date'>
				  <div class='name'> " . $row["name"] . "</div> 
				  <div class='price'> &#8377; " . $row["price"] . ".00</div> </a>
			</div>        
			<div class='title'><h4>" . $row["s_desc"] . "</h4></div>  
      <div class='card-excerpt text-justify' style='font-family:verdana';><p> " . $row["l_desc"] . "</p></div>
       
        </div> 
		</div>";
        }
      }
    echo "</div>";
    ?>

  </div>
 <br>
 <br>
 <br>
    <?php
    include 'footer.html';
    ?>

</body>

</html>
