<?php
session_start();
$id = " ";

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}
else {
    $id = $_SESSION['id'];
    //echo "<h1> $id </h1>";
  }
  

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>single product name</title>
</head>

<body>
  <?php
  $con =  mysqli_connect("localhost", "root", "", "sword_store") or die("Sorry!!!!Cannot Connect");
  $view = $_GET["result"];
  $sql = "SELECT * FROM product WHERE id = $view";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $name = $row["name"];
  $img = $row["img"];
  $s_desc = $row["s_desc"];
  $l_desc = $row["l_desc"];
  $price = $row["price"];
  $id = $row["id"];
  ?>
  <!--=======================================================================================-->

  <?php
  function msg()
  {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Item successfully added to the cart!!!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
  }
  ?>






  <div class="container pt-3">
    <div class="card md-12" style="max-width: 100%;">
      <div class="row no-gutters">
        <div class="col-md-6">
          <img src="image/<?php echo $img; ?>.jpg" class="card-img" alt="img of the product">
        </div>
        <div class="col-md-6">
          <div class="card-body">





            <h5 class="card-title text-muted" style="font-size:35px;"><?php echo "$name"; ?><br><br>
              <hr>
            </h5>
            <p class="card-text"><small class="text-muted">add review</small></p>


            <p class="card-text"><?php echo "$s_desc"; ?></p>
            <p class="card-text" style="font-size:30px; color:red;">&#x20b9; <?php echo "$price"; ?></p>
            <p class="card-text" style="padding-bottom:0; margin-bottom:0;"><small>QUANTITY</small></p>
            <form name="addtocard" method="post" action="SingleProduct.php?result=<?php echo "$id" ?>">
              <select name="q" class='form-control'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
              </select>

              <button type="submit" name="cart" class="btn btn-warning" style="margin-top:10px;" data-toggle='modal' data-target='#exampleModal1'>Add to cart</button>


              <button type="button" onclick="window.location.href='cart.php';" class="btn btn-success" style="margin-top:10px; ">Buy Now</button>
              <button type="button" onclick="window.location.href='../index.php';" class="btn btn-primary" style="margin-top:10px; ">Shop More</button>
            
            </form>
            <h1 style="color:red; margin-top:12px; text-transform:uppercase; font-size:20px;">Description</h1>
            <p><?php echo "$l_desc"; ?></p>
          </div>
        </div>
      </div>
    </div>


  </div>





  <!--===================================================================================-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST["cart"])) {

    $con1 =  mysqli_connect("localhost", "root", "", "sword_store") or die("Sorry!!!!Cannot Connect");
    $cust_id = $_SESSION["id"];
    $qty = $_POST["q"];


    $query1 = "INSERT INTO  cart (`cust_id`, `product_id`, `quantity`, `price`) VALUES ($cust_id,$id,$qty,$price)";
    if (mysqli_query($con1, $query1)) {
        //echo"<h1>Data Saved Successfully!!!!</h1>";
        //echo "<h1> $query1 </h1>";
        msg();
      } else {
      echo "<h1>Data Couldn't be Saved!!!!</h1>";
      echo mysqli_error($con);
    }
  }
?>