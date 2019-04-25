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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="jquery.min.js"></script>

    <title>Checkout</title>

    <style type="text/css">
        .clear {
            clear: both;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pt-1">
                <a class="btn btn-primary text-center btn-lg btn-block" href="#" disabled>CHECKOUT</a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <p class="text-center display-4 border-bottom  pb-2">Delivery Details</p>
                <form>
                    <div class="form-group">
                        <label>House No.</label>
                        <input type="email" class="form-control">
                        <label>Landmark</label>
                        <input type="email" class="form-control">
                        <label>Street</label>
                        <input type="email" class="form-control">
                        <label>City</label>
                        <input type="email" class="form-control">
                        <label>State</label>
                        <input type="email" class="form-control">
                    </div>
                </form>
            </div>
            <?php
            $con =  mysqli_connect("localhost", "root", "", "sword_store") or die("Sorry!!!!Cannot Connect");
            $sql = "SELECT * FROM cart WHERE cust_id=$id";
            $result = mysqli_query($con, $sql);
            $sum = 0;
            while ($row = mysqli_fetch_array($result)) {
                $p_id= $row['product_id'];
                $sql1 = "SELECT * FROM product where  id =$p_id";
                $result1 = mysqli_query($con, $sql1);
                $product = mysqli_fetch_array($result1);
                $sum = $sum + $product['price'] * $row['quantity'];
            }

            // echo $sum;
            ?>
            <div class="col-md-6">
                <p class="text-center display-4 border-bottom pb-2">Billing Information</p>
                <p class="display-4 text-center pt-4" style="color:#f00;">Total Amount : <?php echo $sum ?></p>
                <div class="">
                    <a class="btn btn-success text-center btn-block " href="cart.php" disabled>Go to Cart</a>
                    <a class="btn btn-warning text-center btn-block " href="../index.php" disabled>Shop More</a>
                    <a class="btn btn-danger btn-lg text-center btn-block " href="https://paytm.com/" disabled>Proceed to pay <?php echo "$sum " ?>&#8377; >>> </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="page-footer font-small bg-dark text-white pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mx-auto">

                    <!-- Content -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Footer Content</h5>
                    <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none">

                <!-- Grid column -->
                <div class="col-md-2 mx-auto">

                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <hr>

        

        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
            <li class="list-inline-item">
                <a class="btn-floating btn-fb mx-1">
                    <i class="fab fa-facebook-f"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-tw mx-1">
                    <i class="fab fa-twitter"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-gplus mx-1">
                    <i class="fab fa-google-plus-g"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-li mx-1">
                    <i class="fab fa-linkedin-in"> </i>
                </a>
            </li>
            <li class="list-inline-item">
                <a class="btn-floating btn-dribbble mx-1">
                    <i class="fab fa-dribbble"> </i>
                </a>
            </li>
        </ul>
        <!-- Social buttons -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright: This site is developed by AVM Software solutions!
            
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>


</html>