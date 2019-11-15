

<?php
		session_start(); 
		if(isset($_SESSION['email']))
		{
		include 'login.php';
		$host="localhost";
		$user="root";
		$pass="";
		$database="main_list";
		$table="event_list";

		$conn=mysqli_connect("$host","$user","$pass");
		$sql="CREATE DATABASE IF NOT EXISTS $database";
		mysqli_query($conn,$sql);

		$con=mysqli_connect("$host","$user","$pass","$database");

		$sql="CREATE TABLE IF NOT EXISTS $table (
				ID int(20) unsigned primary key auto_increment,
				Event_Title varchar(500) not null,
				Venue varchar(500) not null,
				Event_time varchar(500) not null,
				Organizer varchar(5000) not null,
				Event_description blob not null,
				Hotcake float(4),
				Interested int(255) unsigned,
				Publish int(2) 
			)";
		$a1=mysqli_query($con,$sql);
		//checking if table is made
			if($a1)
				echo "Table is made successfully. <br/>";
			else
				echo "Error creating table: " . mysqli_error($con);
		

		if (isset($_POST['submit'])) 
		{
			
			$event_title=$_POST['title'];
			$event_venue=$_POST['Venue'];
			$event_time=$_POST['time'];
			$event_organizer=$_POST['organizer'];
			$event_description=$_POST['Description'];

				$sql="INSERT INTO $table(Event_Title,Venue,Event_time,Organizer,Event_description,Hotcake,Interested,Publish) VALUES ('$event_title','$event_venue','$event_time','$event_organizer','$event_description','0','0','0')";


			mysqli_query($con,$sql);
			

			
		}

			mysqli_close($con);
		
		}//end of if the user is valid

		else{


		} 



session_write_close();
?>