<?php
session_start();
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

            $conn=mysqli_connect("$host","$user","$pass","$base");

            $email_address=mysqli_real_escape_string($conn, $_POST['emailadd']);
            $pass_login=mysqli_real_escape_string($conn, $_POST['pass']);

            
            $sql="select * from $TABLE where $column4='$email_address' and $column5='$pass_login'"
                    or die("Failed to query database " . mysqli_error($conn));
            $result=mysqli_query($conn,$sql);
            
            $row=mysqli_fetch_array($result);

             if($row['Email']==$email_address && $row['Pass']==$pass_login && $row['Access']=='1')
             {
                //echo"login successful! Welcome &nbsp;".$row['First_Name'];
                $_SESSION["name"] = $row['First_Name'];
                $_SESSION['email']= $row['Email'];
                header("location: view.php");          // can also be done in this way: include 'login.php';
                exit();
             }      
            else
            {
              header("location:login.php");
              exit();
            }
             
          mysqli_close($conn);
session_write_close();
?>