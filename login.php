

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css">

<link href="css/font-awesome.css" rel="stylesheet" type="text/css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.js"></script>

<?php include('config/css.php'); ?>

<?php include('config/js.php'); ?>

    <title>homepage</title>
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

<div class="clearfix"></div><br><br><br>


<div class="container">
        <form action="" method="post">
        <div class="col-md-12">
        	<div class="col-md-4">
                <label style="font color: black">Event title:</label>
                <input type="text" placeholder="Event title" class="form-control" name="title" value="" required><br>
            </div>
        </div>
        <div class="col-md-12">
        	<div class="col-md-4">        
                <label>Venue:</label>
                <input type="text" placeholder="Venue" class="form-control" name="Venue" value="" required><br>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-4">   
                <label>Date:</label>
                 <input type="datetime" id="datepicker" placeholder="Date" class="form-control" name="time" value="" required><br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">   
                <label>Organized by:</label>
                <input placeholder="Organized by" type="text" class="form-control" name="organizer" value="" required><br>
            </div>
        </div>


        

        <div class="col-md-12">
        	<div class="col-md-4">       
                <label>Event description:</label>
                <textarea name="Description" class="form-control" rows="10"></textarea>
        	</div>
        </div>

        <div class="clearfix"></div><br>

        <div class="col-md-12">
            <div class="col-md-4">   
                <label>Images for event:</label>
                <input placeholder="Images" type="file" accept="image/jpeg, image/png"  name="filename" value="" required><br>
            </div>
        </div>

   

        <div class="col-md-12">
            <div class="col-md-4">
                <button type="submit" class="btn btn-success" value="" name="submit">SUBMIT</button>    
             </div>
                   
        </div>
                
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


</body>
</html>
