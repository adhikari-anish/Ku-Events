
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css">

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

<div class="clearfix"></div><br>
<div class="col-md-12 back-image">
    <div class="container">
        <div class="col-md-9">
            <h1 class="text-center" style="color:#FFF;">
            <?php 
                    $host="localhost";
                    $user="root";
                    $pass="";
                    $database="main_list";
                    $table="event_list";

                    $con = mysqli_connect("$host","$user","$pass","$database");

                    $title_variable=$_GET['title'];
                        
                    $sql="SELECT * FROM $table";

                    $result=mysqli_query($con,$sql);

                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($title_variable==$row['Event_Title']){
                        echo $row['Event_Title'];
                        $sql="SELECT * from $table where Event_Title= '" . mysqli_escape_string($con,$title_variable) . "'";
                        }
                    }
                   $result=mysqli_query($con,$sql);
            ?></h1>
        </div>	
        <hr>
        <div class="col-md-9" style="color:#FFF;">
            <h3 class="text-center">About The Event</h3>
            <p class="text-justify">
            <?php 
                        $row=mysqli_fetch_assoc($result);
                        echo $row['Event_description'];

                ?>
                
            </p>
            <br><br>
            
            <h4><strong>Venue:</strong> 

            <?php 
                           // $sql="SELECT Venue from $table where id=1";
                            //$result=mysqli_query($con,$sql);
                                 
                                echo $row['Venue'];
                            
                                 /* if(isset($row['Venue']))
                                echo "Yes";
                                else
                                    echo "No";*/
            ?></h4>
            <h4><strong>Date & Time:</strong>  <?php 
                                echo $row['Event_time'];
            ?>
             </h4>
            <h4><strong>Organized By: </strong><?php 
                                echo $row['Organizer'];
            ?>
             </h4>
        </div>
        
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">
                        <span class="glyphicon glyphicon-eye-open"></span> For Furthur Information
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                    <ul class="contact">
                        <li><span class="fa fa-male"></span> &nbsp;Anish Adhikari<br></li>
                        <li><i class="fa fa-phone"></i> +977-9852132564</li>
                        <li><i class="fa fa-envelope"></i> info@gmail.com</li>
                    </ul>  
                </p>
                </div>
            </div>
            
            <p class="text-center">

           <form action="event1.php?title=<?php echo $_GET['title'];?>" method="POST">  
            Going:<input type=radio name="poll" value="going" > &nbsp; 
            Not going:<input type=radio name="poll" value="not_going" > &nbsp;
            <input type="submit" name="submit" value="Submit">
            
             <?php
            //polling calculation script
            //info needed for connection 
    $db1= "polling";
    $table1=$title_variable;
    $column1="ID";
    $column2="Interest";
    $column3="Reg_date";



    //creating a database
    $conn=mysqli_connect("$host","$user","$pass");
    $sql="CREATE DATABASE IF NOT EXISTS $db1";              //CREATE DATABASE IF NOT EXISTS _databasename_ ;
    mysqli_query($conn,$sql);
            
    //end of creating database

    //connecting to the database
    $con = mysqli_connect("$host","$user","$pass","$db1");          //mysqli_connect(host,user,password,database_name)

    //creating a table inside the database db1
            $sql="CREATE TABLE IF NOT EXISTS $table1(
                    $column1 int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    $column2 varchar (10) NOT NULL,
                    $column3 timestamp
                    )";
        mysqli_query($con,$sql);        //creates a table
    //end of table creating

    //checking if the submit button is hit
    if (isset($_POST['submit']))      // alternative way: if($_POST["submit"]=="Submit")
    {
                                     
    $event_poll= mysqli_real_escape_string($con, $_POST['poll']);  /* without using the escape $event_poll=$_POST['poll']; it escapes special characters in a string for use in an SQL statement.*/

    $sql="INSERT INTO $table1 ($column2, $column3) VALUES ('$event_poll', NOW())";   //insert into table_name(column) VALUES (value) '".$event_poll."' 
    mysqli_query($con, $sql);
    }

    //OUTPUT SECTION
    $display= "SELECT $column2 FROM $table1";
    $result=mysqli_query($con,$display);

    /*if($result===FALSE)
    {
        echo "here";
        die(mysqli_error());
    } */
    $going=0;
    $not_going=0;
    if(mysqli_num_rows($result)>0)                                          //looping until all rows are taken
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $status=mysqli_real_escape_string($con,$row["$column2"]);
            if($status=="going")
            {
                $going=$going+1;
            }
            else
            {
                $not_going=$not_going+1;
            }
        }
    }

    echo "<br/> Going:", $going;
    echo "<br/> Not Going:", $not_going;

    $total=$going+$not_going;
    echo  "<br/>Total interested:",$total;

    if($total!=0){
        $going_percent=($going/$total)*100;
        $not_going_percent=($not_going/$total)*100;
    }
    
    else                                //Condition for when total is zero and to avoid mathematical error while dividing
    {
        $total=1;
        $going_percent=($going/$total)*100;
        $not_going_percent=($not_going/$total)*100;

    }

    echo "<br/>",round($going_percent,2),"% are going";
    
    $database="main_list";
    $inserting_table="event_list";


    $poll_insert_con= mysqli_connect("$host","$user","$pass","$database");


    $sql="UPDATE $inserting_table SET Hotcake=round($going_percent,2), Interested=$total where Event_Title='$title_variable'";

    $a=mysqli_query($poll_insert_con,$sql);

    //Checking if the record is added to table
           /* if ($a=== TRUE)                         //mysqli_query(connection, insert values)
            {
                echo "<br/>Record Added";
            }
            else 
            {
                echo "ERROR" .$sql. "<br/>" .mysqli_connect_error();
            } */

    mysqli_close($con);
    mysqli_close($poll_insert_con);                 // closing connection
    
?>


            </form>
            </p>

   


        </div>
        
        
    </div>
</div>
<

<div class="clearfix"></div>
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
