

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>KUEVENTS</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
</head>

<body style="padding-top:80px;">
<header class="navbar-fixed-top">

    <div class="col-md-12 top-header">
    
		<div class="col-md-2 mail">
        	<a href="#"><i class="fa fa-envelope"></i> info@gmail.com</a>
        </div>
        <div class="col-md-2">
        	<i class="fa fa-phone"></i> +977-01-256256256
        </div>
        
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        
        <div class="col-md-4 pull-right">
        	<div class="col-md-12">
            	<a href="account.php"><button class="btn btn-primary pull-right">Account</button></a>
           	</div>
        </div>       
    </div>
    
    <nav class="col-md-12 nav navbar-default">
            	<div class="container">             
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo"></a>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" title="menu" data-target="#navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse text-center">
                              <ul class="nav navbar-nav navbar-right menus">
                                <li><a href="index.php" class="hvrcenter">Home</a></li>
                                <li><a href="news.php" class="hvrcenter">News</a></li>
                                <li><a href="about.php" class="hvrcenter">About</a></li>
                                <li><a href="feedback.php" class="hvrcenter">Feedback</a></li>
                               </ul>
                   </div>
               </div>
            </nav>
    
</header>

<div class="clearfix"></div><br>

<div class="col-md-12 feedback" style="border-top:1px solid black">
	<h1 class="text-center">FEEDBACK</h1>
    <div class="col-md-12">
        <form action="feedback.php" method="POST">
        <div class="col-md-12">
        	<div class="col-md-4">
                <label>Name:<span class="asterisk"> * </span></label>
                <input type="text" placeholder="Enter Your Name" class="form-control" name="name" value="" required><br>
            </div>
        </div>
        <div class="col-md-12">
        	<div class="col-md-4">        
                <label>Email Address:<span class="asterisk"> * </span></label>
                <input type="email" placeholder="Enter Your Email" class="form-control" name="email" value="" required><br>
            </div>
        </div>
        <div class="col-md-12">
        	<div class="col-md-4">   
                <label>Subject:<span class="asterisk"> * </span></label>
                <input placeholder="Enter Subject" type="text" class="form-control" name="subject" value="" required><br>
        	</div>
        </div>
        <div class="col-md-12">
        	<div class="col-md-4">       
                <label>Message:<span class="asterisk"> * </span></label>
                <textarea name="message" class="form-control" rows="10"></textarea>
        	</div>
        </div>
        <div class="clearfix"></div><br>
        <button type="submit" class="btn btn-success" value="Submit" name="submit">SUBMIT</button>    
                
         </form>
    </div>
</div>



<div class="clearfix"></div><br>
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






<a href="#" class="scrollup" title="Goto Top" data-placement="top"></a>


<script type="text/javascript">

	$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	
});
	
</script>

<script src="js/bootstrap.min.js" type="text/javascript"></script>


<?php
    
    $host= "localhost";
    $user= "root";
    $pass= "";
    $database="Feedback";
    $database_table="Feeds";

    $feed_column1="ID";
    $feed_column2="Name";
    $feed_column3="Email";
    $feed_column4="Subject";
    $feed_column5="Message";


    $con=mysqli_connect("$host","$user","$pass");

    $sql="CREATE DATABASE IF NOT EXISTS $database";
    mysqli_query($con,$sql);

    $feed_con=mysqli_connect("$host","$user","$pass","$database");

    $sql="CREATE TABLE IF NOT EXISTS $database_table(
            $feed_column1 int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            $feed_column2 varchar(100) NOT NULL,
            $feed_column3 varchar(100) NOT NULL,
            $feed_column4 varchar(100) NOT NULL,
            $feed_column5 varchar(1000) NOT NULL)";
    mysqli_query($feed_con,$sql);

    if(isset($_POST['submit']))
    {

            $name= mysqli_real_escape_string($feed_con, $_POST['name']);
            $email= mysqli_real_escape_string($feed_con, $_POST['email']);
            $subject= mysqli_real_escape_string($feed_con, $_POST['subject']);
            $message= mysqli_real_escape_string($feed_con, $_POST['message']);

            $sql="INSERT INTO $database_table($feed_column2,$feed_column3,$feed_column4,$feed_column5) VALUES ('$name','$email','$subject','$message')";
            mysqli_query($feed_con,$sql);

    }
    mysqli_close($feed_con);
?>

</body>
</html>

