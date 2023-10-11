<!--Knight 2030026123 -->
<?php
include 'connectDB.php';

$user	= $_POST["username"];
$pwd	= $_POST["password"];
$flag = 0;

//set logo and link to other pages
echo "<link rel='stylesheet' type='text/css' href='http://localhost/project/hospital.css'><body class = 'logbodycolor'> 
<h1 id='loghosName'><img class ='logo' src='logo.png'  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL <br>Welcome to our HOSPITAL</h1>
<div class= 'navigation'>
<h3 id='lognavigation'>
		Navigation &nbsp &nbsp
                <a href='http://stuweb.uic.edu.cn/q030026182/project/Homepage2.html' class='noLine'  >Home Page</a>  &nbsp
				<a href='http://localhost/project/userlogin.html' class='noLine' >User login</a> &nbsp
                <a href='http://localhost/project/ManagerPage.html' class='noLine' >Manager login</a> &nbsp
                <a href='http://localhost/project/userRegister.html' class='noLine' >User Register</a>
				
        </h3>
</div><div class = 'logPart'><h2 class = 'hint' >";





$sql = "SELECT *FROM user";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	if($user == $row["user_name"]){
		$flag = 1;//set the flag equal to one
		if ($pwd == $row["password"]){// password from db record
			//if successfully then put out the sentence
			setcookie("userN", $user, time()+3600);
			setcookie("passwd", $pwd, time()+3600);
			echo "Login successfully(2 second return to homepage)";
			header("refresh:2;url=http://stuweb.uic.edu.cn/q030026182/project/Homepage2.html");
			break;
		} 
		else{
			echo "The Password is incorrect";
			break;
			
		}
		
	}
  }
} else {
	echo "0 results";//if the situatino is been up here, flag turn to 0
}
if($flag != 1){//the flag still 1,means the account does not exist
	echo "This account does not exist";
}

$conn->close();
echo "</h2> </div></body>";
?>