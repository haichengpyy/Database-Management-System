
<html>
<head>
<link rel="stylesheet" type="text/css" href="bank.css">
</head>
<body class="mgbgcolor">
<?php 
	include 'connectDB.php';
	
	//post the data from the html
	$username 	= $_POST["username"];
	$name 	= $_POST["name"];
	$psd	= $_POST["psd"];
	$idcard = $_POST["idcard"];
	$gender = $_POST["gender"];
	$age = $_POST["age"];
	$birth = $_POST["birth"];
	$id = rand(70000,100000);
	$sql = "INSERT INTO user (user_id , user_name, password, name, gender, idcard_number,identity,age,date_of_birth) VALUES ('$id', '$username', '$psd', '$name', '$gender', '$idcard', 'User', '$age', '$birth')";
	
	//insert to the database
	mysqli_query($conn, $sql);
	echo "<h2 class='mgtop'>Dear $username $name,<p> Regist successfully!</p></h2>";
	
	
	$conn->close();
	
	echo "<div class = 'back'><a href='http://localhost/project/Homepage.html' class='noLine'  >Back to HomePage</a></div> ";
?>
</body>
</html>