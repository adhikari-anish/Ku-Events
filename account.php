<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign-Up/Login Form</title>
  <?php include('config/css.php'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
      
      <?php include('config/js.php'); ?>
</head>


<body style="padding-top:50px; background: #000000">
    <header class="navbar-fixed-top">
      <nav id="header" class="navbar navbar-fixed-top">
                <div id="header-container" class="container navbar-container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="main.php"><img src="images/logo5.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-family: 'Amatic SC', cursive; font-size: 200%">
                      <ul class="nav navbar-nav">
                        <li class="active"><a href="main.php" class="hvrcenter">Home<span class="sr-only"></span></a></li>
                        <li><a href="news.php" class="hvrcenter">News<span class="sr-only"></span></a></li>
                      </ul>
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="about.php" class="hvrcenter">About</a></li>
                         <li><a href="account.php" class="hvrcenter"><i class="fa fa-user" aria-hidden="true"></i> Account</a></li>
                         <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="hvrcenter">Contact Us <span class="caret"></span></a>
                          <ul class="dropdown-menu" style="font-family: 'Josefin Sans', sans-serif;">
                            <li><a href="#"><i class="fa fa-envelope"></i>info@gmail.com</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="fa fa-phone"></i> +977-01-256256256</a></li>
                          </ul>
                        </li>
                      </ul>
                      </div>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
      </header>


  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="account.php" method="POST">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="Fname" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="Lname" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email" />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" />
          </div>
          
           <input type="submit" name="submit" value="Get Started" > 

          </form>
          
          <?php

              $host= "localhost";
              $user= "root";
              $pass= "";
              $base="login";
              $TABLE="valid_users";
              $column1="ID";
              $column2="First_Name";
              $column3="Last_Name";
              $column4="Email";
              $column5="Pass";
              $column6="Access";

              $con=mysqli_connect("$host","$user","$pass");
              $sql="CREATE DATABASE IF NOT EXISTS $base";
              mysqli_query($con,$sql);
     

              $conn=mysqli_connect("$host","$user","$pass","$base");
              $sql="CREATE TABLE IF NOT EXISTS $TABLE(
                    $column1 int(5) unsigned AUTO_INCREMENT primary key,
                    $column2 text(50) not null,
                    $column3 text(50) not null,
                    $column4 varchar(500) not null,
                    $column5 varchar(500) not null,
                    $column6 int(2)
                    )";
              mysqli_query($conn,$sql);

              if(isset($_POST['submit']))
              {
                  $fname=mysqli_real_escape_string($conn,$_POST['Fname']);
                    $lname=mysqli_real_escape_string($conn,$_POST['Lname']);
                    $mail=mysqli_real_escape_string($conn,$_POST['email']);
                    $password_login=mysqli_real_escape_string($conn,$_POST['password']);
                  $sql="INSERT INTO $TABLE($column2, $column3, $column4, $column5, $column6) VALUES ('$fname','$lname','$mail','$password_login','0')";
                  $a=mysqli_query($conn,$sql);

                  //Checking if the record is added to table
      if ($a === TRUE)                         //mysqli_query(connection, insert values)
      {
        echo "<br/>Record Added";
      }
      else 
      {
        echo "ERROR" .$sql. "<br/>" .mysqli_connect_error();
      }
  }
              

          ?>
        

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="process.php" method="POST">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="emailadd" id="emailadd"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass" id="pass"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <input type="submit" class="button button-block" name="submit" value="Log In"/>

       <?php
             

             /*if(isset($_post['submit'])){

              $email_address=mysqli_real_escape_string($conn, $_POST['emailadd']);
             $pass_login=mysqli_real_escape_string($conn, $_POST['pass']);


             $sql="select * from $TABLE where $column4='$email_address' and $column5='$pass_login'"
                    or die("Failed to query database " . mysqli_error($conn));
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result,MYSQLI_NUM);

             if($row['emailadd']==$email_address && $row['pass']==$password)
             {
                echo"login successful! Welcome".$row['username'];
             }      
            else
            {
              echo "login failed";
            }
             }
          mysqli_close($conn);

        */

          ?> 
          
          </form>
            

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

<footer class="footer">
  <div class="container">
    
        <div class="col-md-12">
          <div class="col-md-4 copy">
              <p class="copy">Copyright &copy; 2017 <span class="link"><a href="#">KUEVENTS</a></span></p>
            </div>
            <div class="col-md-4">
                <ul class="f-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Feedback</a></li>
                </ul>
            </div>
            <div class="col-md-4 s-icons">
              <ul class="pull-right social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
            </div>
            
        </div>
    </div>
 </footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
