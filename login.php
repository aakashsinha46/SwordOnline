<?php

$error = "";

session_start();
if( $_POST){
    
    
    $password = $_POST['password'];
    $password = md5("AMV".$password);
    $email = $_POST['email'];
    
     $link = mysqli_connect("localhost" , "root" , "" , "sword_store");
    
    if( mysqli_connect_error())
        {
            echo "ERROR";
            die("Error in database Connection");
        }

    $query = "SELECT password,fname,id FROM login where email like '".$email."'";
    $result = mysqli_query($link , $query);
    if( mysqli_num_rows($result) > 0  )
    {
        $row = mysqli_fetch_array($result);
        if( $row[0] == $password )
        {
            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $row[1];
            $_SESSION['id'] = $row[2];
            
            header("location: index.php");
        }
        else
            $error ="Invalid username/Password.";
            
    }
    else{
        $error ="Invalid Username/password.";
        
    }
    
}





?>



<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css?family=Handlee|Kaushan+Script|Pacifico" rel="stylesheet">

        
        <title>Login</title>
        
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
              /*  background : rgba(0,0,0,0.9);*/
                  background : rgba(0,0,0,0.9);
                box-sizing: border-box;
                box-shadow: 0 20px 50px rgba(0,0,0,2);
            }
            
            
            
            .wrapper {
                text-align: center;
            }

            .button {
                position: absolute;
                top: 50%;
            }
            
            .signuparea{
                margin-top: 25px;
                 text-align: center;
            }
            
            #signupbutton{
             margin-top: 5px;   
            }
            
            .container .jumbotron input {
                background: transparent;
                border: none;
                border-bottom: 1px solid #52b3d9;
                outline: none;
                color: white;
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
            <legend>Login</legend>
             <form method="post">
              <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="email" class="form-control ip"placeholder="Email Address" name="email" required autocomplete="off">
                </div>
                </div>  
                  
                <div class="form-row"> 
                <div class="form-group col-md-12">
                  <input type="password" class="form-control ip"  placeholder="Password" name="password" required>
                </div>
                </div>
                 
                <div id="error"><?php
                 if($error)
                 {
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>' ;     
                 }
                 ?></div> 
                 
              
                <div class="wrapper"> 
                    <button type="submit" class="btn btn-outline-secondary" id="loginbutton" > Login</button> 
               </div>
        </form>
            
           <div class="signuparea">
            <div class="text-muted wrapper">New User? Signup here</div>    
            <div class="wrapper"> 
                <a class="btn btn-secondary" href="signup.php" role="button" style="margin-top:7px;">Signup</a>
            </div>  
           </div>
                </fieldset>  
            </div>    
        </div>
        
    
    
       
        
        
    
    
    
    
    
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
        
    </body>


</html>