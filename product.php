


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="product_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
</head>
<body>
	
<?php

  $con=  mysqli_connect("localhost","root","","sword_store") or die("Sorry!!!!Cannot Connect");
  $sql="SELECT * FROM product";
  $result= mysqli_query($con, $sql);
  echo"<div class='row'>";
  while($row = mysqli_fetch_array($result))
        {
			for($i=0;$i<5;$i++){
			echo "<div class='card col-lg-3 shadow-sm p-3 mb-5 bg-white rounded col-sm-6'>
				<a href='#'>
        <div class='card-image'><img src='image/$i.jpg'/></div>
			<div class='card-body'>
			<div class='card-date'>
				  <div class='name'> ".$row["name"]."</div> 
				  <div class='price'> &#8377; ".$row["price"].".00</div> 
			</div>        
			<div class='title'><h4>".$row["s_desc"]."</h4></div>  
			<div class='card-excerpt text-justify'><p> ".$row["l_desc"]."</p></div>
        </div> 
		</a>
	</div>";
			}
         }
		 echo"</div>";
  ?>





</body>
</html>