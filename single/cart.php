<?php
session_start();
$id = "";

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}
else {
    $id = $_SESSION['id'];
   // echo "<h1> $id </h1>";
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
  <link rel="stylesheet" href="style.css">
  <title>cart</title>
</head>

<body>
  <!--header with main navbar---------------------start --------------------->


  <!-------------------CART START -------------------------------------->
  <div class="container">
    <table id="cart" class="table">
      <thead>
        <tr>
          <th scope="col" style="width:50%">Product</th>
          <th scope="col" style="width:10%">Price</th>
          <th scope="col" style="width:8%">Quantity</th>
          <th scope="col" style="width:22%" class="text-center">Subtotal</th>
          <th scope="col" style="width:10%"></th>
        </tr>
      </thead>
      <?php
     // $cust_id = $_SESSION["id"];
      $con =  mysqli_connect("localhost", "root", "", "sword_store") or die("Sorry!!!!Cannot Connect");
      $sql = "SELECT * FROM cart WHERE cust_id=$id";
      $result = mysqli_query($con, $sql);
      if( mysqli_num_rows($result) == 0  )
      {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
       <strong>Cart is Empty!!</strong> There is no item in your cart!!!
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
       </button>
     </div>";
      }
      $sum = 0;
      while ($row = mysqli_fetch_array($result)) {
        $p_id= $row['product_id'];
          $sql1 = "SELECT * FROM product where  id =$p_id";
          $result1 = mysqli_query($con, $sql1);
          $product = mysqli_fetch_array($result1);

          echo "<tbody>
    <tr>
      <td data-th='product'>
        <div class='row'>
          <div class='col-sm-2  id='ImgAdjust'><img class='img-fluid d-block mx-auto img-thumbnail' src='image/" . $row['product_id'] . ".jpg' alt=img of the product'/>
          </div>
          <div class='col-sm-10'>
            <h4 class='nomargin'>" . $product['name'] . "</h4>
            <P> " . $product['s_desc'] . " </P>
          </div>
        </div>
      </td>

      <td data-th='Price'>" . $product['price'] . "</td>

      <td data-th='Quantity'>
        <input type='number' class='form-control text-center ' disabled value='" . $row['quantity'] . "'>
      </td>

      <td data-th='Subtotal' class='text-center'>" . $product['price'] * $row['quantity'] . "</td>
      <td class='action' data-th=''>
      <form action='load.php' method='post'>
        <button name='delete' value='" . $row['sr'] . "' class='btn btn-warning btn-sm'> Delete</button>








        </form>
      </td>
    </tr>
  </tbody>";
          $sum = $sum + $product['price'] * $row['quantity'];
         
        }
      ?>
      <tfoot>

        <tr>
          <td><a href="../index.php" class="btn btn-warning">&lt;Continue Shopping</a>
          </td>
          <td colspan="2" class="hidden-xs"></td>
          <td class="hidden-xs text-center"> <strong> Total : <?php echo $sum ?></strong></td>
          <td><a href="checkout.php" class="btn btn-success btn-block">Checkout&gt;</a></td>
        </tr>
      </tfoot>

    </table>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php

?>