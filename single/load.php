<?php
session_start();
$id = " ";

if (!isset($_SESSION['email'])) {
  header("location: login.php");
}
else {
    if (isset($_REQUEST["delete"])) {
        $num = $_POST['delete'];
        $conn =  mysqli_connect("localhost", "root", "", "sword_store") or die("Sorry!!!!Cannot Connect");
        $q = "DELETE FROM `cart` WHERE sr=$num";
        if (mysqli_query($conn, $q)) {
           // echo "<h1>Data deleted Successfully!!!!</h1>";
            //echo "<h1> $query1 </h1>";
            header("location: cart.php");
            
          } else {
          echo "<h1>Data Couldn't be deleted!!!!</h1>";
          echo mysqli_error($con);
        }
      }
  }
  

?>