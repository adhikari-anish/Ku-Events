<?php
		$host="localhost";
		$user="root";
		$pass="";
		$database="main_list";
		$table="event_list";


		$conn=mysqli_connect("$host","$user","$pass");
		$sql="CREATE DATABASE IF NOT EXISTS $database";
		mysqli_query($conn,$sql);

		$con = mysqli_connect("$host","$user","$pass","$database");



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
		mysqli_query($con,$sql);


		$sql="CREATE VIEW priority_cake as 
		select * 
		from event_list 
		order by Hotcake desc";

		mysqli_query($con,$sql);

		$sql="SELECT Event_Title, Hotcake, Interested FROM priority_cake";
		$result=mysqli_query($con,$sql);
?>
<div class="container">
    
    <div class="row">
    					
						<div class="col-md-8">
							<div class="widget blank no-padding">
								<div class="panel panel-default work-progress-table">
									  <!-- Default panel contents -->
								
									  <!-- Table -->
									<table id="mytable" class="table">
										<thead>
										  <tr>
											
											<th>Events</th>
											<th align="
											center">Hotcake</th>
											<th align="center"> Total Interested </th>
										  </tr>
										</thead>
										<tbody>
										  <tr>
										
											<?php
												 while($row=mysqli_fetch_assoc($result)){

												 echo "<tr><td><a href='event1.php?title={$row['Event_Title']}'>{$row['Event_Title']}</a></td><td align='center'>{$row['Hotcake']}</td><td align='center'>{$row['Interested']}</td></tr>";} ?>
											
										  </tr>
									

</table>