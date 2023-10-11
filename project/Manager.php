<!--Knight 2030026123 -->
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/project/hospital.css">
</head>
<body class="logbodycolor">
        
        <h1 id="loghosName"><img class ="logo" src="logo.png"  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL <br>Welcome to our HOSPITAL</h1>
        <h3 id="lognavigation">
		Navigation &nbsp &nbsp
                <a href="http://localhost/project/ManagerOperation.html"  class="noLine"  >System Start Page</a>  &nbsp 
				<a href="http://localhost/project/UserinforManager.html"  class="noLine"  >User infor Manager</a>  &nbsp 
				<a href="http://localhost/project/Homepage2.html"  class="noLine"  >Quit</a>   
				
        </h3>


<?php
	include 'connectDB.php';
	//connect to the database
	//post the value from the html
	
	$username 	= $_POST["username"];
	$psd	= $_POST["mpsd"];
	


	$sql1 = "SELECT *FROM user WHERE user_name='$username'";
	$result1 = $conn->query($sql1);
	//this is to test whether the manager's name is right or not
	if($result1->num_rows > 0){
		//this is to test whether the password is right or not
		$sql2 = "SELECT *FROM user WHERE password='$psd' and identity='Manager'";
		$result2 = $conn->query($sql2);
		//if the password is right, then print the welcome saying and the customer value
		if($result2->num_rows > 0){
		   echo "<h3 class='divmg'>Manager: $username database server connected successfully. <p>Here is all the users' data.</p> <p><a href='http://localhost/project/Homepage2.html'class='noLine'  >Back to HomePage</a></p> </h3>
		   ";
	       $sql = "select * from user where identity='User' ";
	       ListData($conn,$sql);
		} else {
			echo "Password is wrong";
		}
	}
	//If his/her name is wrong, then print "not have this manager"
    else {
		echo "Not have this manager.";
	}
	
	//function to list the customer data
	function ListData($conn,$sql){

	$result = $conn->query($sql);
		//test if the database has value or not
		if($result->num_rows > 0){
			echo "<table class='mgtable'> <tr>  <th class='mgt1'>ID</th> <th class='mgt1'>UserName</th> <th class='mgt1'>Name</th> <th class='mgt1'>Idcard</th> <th class='mgt1'>Password</th> <th class='mgt1'>Gender</th> <th class='mgt1'>Age</th> <th class='mgt1'>Data_Of_Birth</th> <th class='mgt1'>Delete</th></tr> ";
		}
		
		//print the customer table(using the while loop and array)
		while($row = mysqli_fetch_assoc($result)) {
			$var = $row["user_id"];
			echo "<tr> <td name='id' class='mgt2'>" . $row["user_id"]."</td><td class='mgt2'>".$row["user_name"]."</td> <td class='mgt2'>" . $row["name"]."</td><td class='mgt2'>" . $row["idcard_number"]."</td><td class='mgt2'>". $row["password"]."</td><td class='mgt2'>".$row["gender"]."</td><td class='mgt2'>".$row["age"]."</td><td class='mgt2'>".$row["date_of_birth"]."</td><td class='mgt2'><a href='deleteUser.php?new=$var' > delete</a></td></tr>";

			//use the link to pass value to another php and delete the user
		}

	echo "</table>";
	$conn->close();
	}
	
?>
</body>
</html>