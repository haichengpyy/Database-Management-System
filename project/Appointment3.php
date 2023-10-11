<html>
<title> Appointment Registration</title>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/project/hospital.css">
</head>
<body class="logbodycolor">
	<h1 id="loghosName"><img class ="logo" src="logo.png"  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL <br>Wishing you a speedy recovery</h1>
	<h3 id="lognavigation">
		Navigation &nbsp &nbsp
        <a href="http://localhost/project/Homepage2.php"class="noLine"  >Home Page</a>  &nbsp
		<a href="http://localhost/project/userlogin.html" class="noLine" >User login</a> &nbsp
        <a href="http://localhost/project/ManagerPage.html" class="noLine" >Manager login</a> &nbsp
        <a href="http://localhost/project/userRegister.html" class="noLine" >User Register</a>
				
    </h3>
	<h1 class="mgtop">You can make an appointment here</h1>
	<form name="app3" action="http://localhost/project/Homepage2.html" onsubmit="return inputAllInfo()" method="post">
	<h3 id="loghosName">These times are avaliable, please select one:
	<?php 
		include 'connectDB.php';
		//post the data from the html
		$dcName 	= $_POST["dcnm"];
		$sql = "SELECT timetable FROM doctor WHERE doc_name='$dcName'";
		$result = mysqli_query($conn, $sql);
		$array=array();
		while($row=mysqli_fetch_array($result)){
			$array[]=$row['timetable'];
		}
		$pieces = explode ( "/" , $array[0]);
	?>
	<select id="selectBox" name = "dcTime">
		<option></option>
		<?php
			for($i=0; $i<count($pieces); $i++){
		?>
		<option> 
		<?php echo $pieces[$i] ?>
		</option>
		<?php 
			}
		?>
	</select><br><br>
	<input class="s" type="submit" name="login" value="submit" ></h3>
	
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
<script>
function inputAllInfo(){
   //tell the exact blank that manager need input
   var time = document.getElementById("selectBox").value;

   //using the if condition statement to test which the blank is null
   if(time==""){
	 window.alert("You must choose your time first");
	 return false;
   }else{
		window.alert("successful appointment!\nThanks for choosing our hospital, wish you a good life!")
		return true;
   }
}
</script>
</html>