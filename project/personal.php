<!-- Rita 2030026023 Personal information Page-->
<html>
<head>
<link rel="stylesheet" type="text/css" href="hospital.css">
</head>
<body class="logbodycolor">
        <h1 id="loghosName"><img class ="logo" src="logo.png"  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL 
		<br>Welcome to our HOSPITAL</h1>
        <h3 id="lognavigation">
		Navigation &nbsp &nbsp
                <a href="http://localhost/project/Homepage2.html"class="noLine"  >Home Page</a>  &nbsp
				<a href="http://localhost/project/userlogin.html" class="noLine" >User login</a> &nbsp
                <a href="http://localhost/project/ManagerPage.html" class="noLine" >Manager login</a> &nbsp
                <a href="http://localhost/project/userRegister.html" class="noLine" >User Register</a>
        </h3>


<h1 class="mgtop">Personal Center</h1>

<?php

$user	= $_POST["usr"];
$opwd	= $_POST["pwd"];//The password user inpu
$oBirth = $row["birthday"];
$oage = $row["age"];
$ogender = $row["gender"];
$balance = $row["balance"];
if($ogender == 'Male')//the first one that displayed is the gender from the database
	$another_gender = 'Female';
else
	$another_gender = 'Male';
$sql = "SELECT *FROM membership";

$option = false;//The option shows if the user's name exists.(The initial value means the user's name does not exist)

			echo //Display the main page. 
				//The page include the information of user.(Username/Balance/Birthday/Gender)
				//And user can do some change.
				"
				<div class = 'hint'>
				<h2>Hello!Dear $user </h2>
				<form action='Update_Operation.php' method='POST'>
					<h2>Your Information:</h2>
					
					<h3>
					<label for='usr'>Username:</label><br>
					<input class='infor' type='text' id='user' name='user' value='$user' readonly='readonly'><br>
					
					<label for='npwd'>Account balance:</label><br>
					<p>".$balance."</p>
					
					<label for='nbirth'>Birthday:</label><br>
					<input class='infor' type='date' id='nbirth' name='nbirth' value='$oBirth'><br>
					
					<p>Gender:</p>
					<select name='ngender' id='sel1'>
						<option>".$ogender."</option>
						<option>".$another_gender."</option>
					</select><br>
	
					<p></p>
					<input class='infor' style='width:100px' type='submit' value='Submit'>
					<input class='infor' style='width:100px' type='submit' value='Submit'>
					</h3>
				</form> 
				<div>
				";

$conn->close();

?>


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