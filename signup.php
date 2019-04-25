<?php

$error = "";
$success = "";



if( $_POST)
{
    
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    
    if( $password == $passwordconfirm)
    {
         $link = mysqli_connect("localhost" , "root" , "" , "sword_store");
    
        if( mysqli_connect_error())
        {
            echo "ERROR";
            die("Error in database Connection");
        }

        $email = $_POST['email'];
        $query = "SELECT * FROM login where email like '".$email."'";
        $result = mysqli_query($link , $query);
        if( mysqli_num_rows($result) > 0 )
        {
            $error = "That email already exists.Try another.";
        }
        else
        {                        
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $mobile = $_POST['mobile'];
            $dob = $_POST['dob'];
            $password = md5("AMV".$password);

            $query = "INSERT INTO login (fname,lname,gender,mobile,dob,email,password)  VALUES ('".$fname."','".$lname."','".$gender."','".$mobile."','".$dob."','".$email."','".$password."')" ;

            if( mysqli_query($link , $query) )
                $success="You are signed up successfully ";
            else
                $error = "Error Occured. Please try again later. ";

        }
    }
    else
        $error = "Password didn't match. Try again ";   
}

?>



<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css?family=Handlee|Kaushan+Script|Pacifico" rel="stylesheet">
        
        <script type="text/javascript" src="jquery.min.js" ></script>
        
        <title>Sign up here!</title>
        
        <style type="text/css">
        
            body{
                 padding: 0;
                margin: 0;
                 background: url(fighter.jpg) no-repeat center fixed;
                -webkit-background-size:cover;
                -moz-background-size:cover;
                -o-background-size:cover;
                font-family: 'Pacifico', cursive;
                font-family: 'Kaushan Script', cursive;
                font-family: 'Handlee', cursive;
                
            }
            
            
            .jumbotron{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50% , -50%);
                width: 400px;
                border-radius: 10px;
                opacity: 0.9;
                background : rgba(0,0,0,0.9);
                box-sizing: border-box;
                box-shadow: 0 20px 50px rgba(0,0,0,2);
                
            }
            
          
            
            #success{
                margin-top: 20px;
                text-align: center;
            }
            
            .wrapper {
                      margin-top: 25px;
                 text-align: center;
            }
            
            .signup{
                 text-align: center;
            }
            
            .container .jumbotron input,
             .container .jumbotron select{
                background: transparent;
                border: none;
                border-bottom: 1px solid #52b3d9;
                outline: none;
                color: white;
            }
            
            select{
                background: transparent;
                border: none;
                border-bottom: 1px solid #52b3d9;
                outline: none;
                color: white;
            }
            
            option{
                opacity: .8;
                color: black;
                background: transparent;
            }
            
            legend{
                color: aliceblue;
                font-size: 40px;
                text-align: center;
            }

        </style>    
    </head>

    <body>
    
        
            
        <div class="container">
            <div class="jumbotron">
            <fieldset>
                <legend>Signup</legend>
            
             <form method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
                </div>
              </div>
                 
               <div class="form-row">   
                <div class="form-group col-md-6">
                  <select id="inputState" class="form-control" name="gender" required>
                    <option selected hidden>Gender</option>
                        <option value="Male">Male</option>
                        <option value="female">Female</option>
                        <option value="Other">Other</option>
                  </select>
                </div>
                   
                    <div class="form-group col-md-6">
                  <input type="tel" class="form-control" id="mobile" placeholder="Mobile Number" name="mobile"  min="10" max="12" required>
                </div>
                   
             </div>    
                 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input placeholder="Date" name="dob" class="form-control textbox-n" type="text" onfocus="(this.type='date')"  id="date">
                  
                </div>
            </div>     
                 
                 
            <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="email" class="form-control" id="emailaddress" placeholder="Email Address" name="email" required>
                </div>
            </div>
                 
            <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                </div>
                <div class="form-group col-md-6">
                  <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="passwordconfirm" required>
                </div>
              </div> 
                 
             <div id="error"><?php
                 if($error)
                 {
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>' ;     
                 }
                 ?></div>
                
        <div class="wrapper"> <button type="submit" class="btn btn-outline-secondary" id="signup"> Create Account </button> </div>
        </form>
              
                
                 <div id="success"><?php
                 if($success)
                 {
                    echo '<div class="alert alert-success" role="alert">'.$success.'<a href="login.php" class="alert-link">Login Here!</a></div>' ;     
                 }
                 ?></div>

                </fieldset>
            </div>    
        </div>
                

        
        
        
        
        
        
        
        
        
        
    
    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
        
    </body>


</html>