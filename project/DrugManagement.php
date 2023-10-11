<html>
<head>
<link rel="stylesheet" type="text/css" href="hospital.css">
</head>
<body class="logbodycolor">
        <h1 id="loghosName"><img class ="logo" src="logo.png"  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL <br>Welcome to our HOSPITAL</h1>
        <h3 id="lognavigation">
		Navigation &nbsp &nbsp
				<a href="http://localhost/project/Homepage.html"class="noLine"  >Home Page</a>  &nbsp
				<a href="http://localhost/project/userlogin.html" class="noLine" >User login</a> &nbsp
                <a href="http://localhost/project/ManagerPage.html" class="noLine" >Manager login</a> &nbsp
                <a href="http://localhost/project/userRegister.html" class="noLine" >User Register</a>
				
        </h3>

<div class = "logPart">
<h1 class="mgtop">Drug Management Login Page</h1>

<form method="post">
			
			<input type="submit" name="submit" value="List All Details" >
			<input type="submit" name="submit" value="List Drug name, quantity and price" style="width:350px;"><br>
			<h3>Drug Name:</h3>
			<input type="text" name="drug">
			<h3>Pharmaceutical manufacturers:</h3>
			<input type="text" name="manufacturers">
			<h3>CustomerID:</h3>
			<input type="text" name="ID"><br>
			<p></p>
			<input type="submit" name="search" value="search">
		</form>
		<?php
			$DrugName=$_POST['DrugName'];
			$price=$_POST['price'];
			$quantity=$_POST['quantity'];
			$Manufacturers = $_POST['manufacturers'];
			$CustomerID = $_POST['ID'];
			$search=$_POST['search'];
			$ListType=$_POST['submit'];
			
			if ($search <> ""){
				$conn = connectdb();
				$sql = "select * from q030026023 where price ='".$price."' or manufacturers='".$Manufacturers."' or CustomerID ='".$CustomerID."'";
				if ($sql)
				{	
				//call function to list data
				ListData($conn,$sql);
				}

			}
			if( $ListType <> "") // List data only when submit button is clicked
			{	
				$conn= connectdb();	
				
				switch ($ListType){
	
					case "List All Details":
						$sql = "select * from q030026023";
						break;
						
					case "List Drug name, quantity and price":
						$sql = "select DrugName, quantity , price from q030026023";
					
						break;
					default:
						$sql="";
						break;
				}
				if ($sql)
				{	
					
					//call function to list data
					ListData($conn,$sql);
		
					
				}
			}
			
			function connectdb(){
				$servername="localhost";
				$username="2030026023";
				$password="2030026023";
				$db="test_db";
			
				//create connection
				$conn= new mysqli($servername,$username,$password,$db);
				
				//check connection
				if ($conn->connect_error){
					die("connection failed: ".$conn->connect_error);
				}
				echo "database server connected successfully<br>";
				return ($conn);
			}		
			
			function ListData($conn,$sql){
							
				//execute the SQL query			
				$result = mysqli_query($conn,$sql);
				
				
				

				// list data where search result is not 0
				if (mysqli_num_rows($result) > 0){
					
					echo "<table border='1'>";
					//print the heading of table
					echo "<tr>";
					//print each column name
					while ($property = mysqli_fetch_field($result)) {
						echo "<th>".$property->name."</th>";
					}
					echo "</tr>";
					
					//get number of columns
					$fields = mysqli_num_fields($result);
					
					//Get each row data
					while ($row=mysqli_fetch_array($result)){
						
						echo "<tr>";
						for ($f=0; $f < $fields; $f++) {
							
							echo "<td>".$row[$f]."</td>"; 
						}
						echo "</tr>";
					}
				
				
					echo "</table>";
					
				}else
					echo "0 results";
			
			
			}
			
		?>


</form>
</div>

	<footer class="footer">
		<div class="sub-foot">
                <ul>
					<li><a>articles of law</a></li>
					<li><a>privacy protection</a></li>
					<li><a>contact us</a></li>
					<li><a>FAQ</a></li>
				</ul>
				<p>copyright owner@dbms group</p>
           
        </div>
	</footer>

</body>
</html>