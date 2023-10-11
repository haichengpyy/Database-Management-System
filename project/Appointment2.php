<html>
<title> Appointment Registration</title>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/project/hospital.css">
</head>
<body class="logbodycolor">
	<h1 id="loghosName"><img class ="logo" src="logo.png"  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL <br>Wishing you a speedy recovery</h1>
	<h3 id="lognavigation">
		Navigation &nbsp &nbsp
        <a href="http://localhost/project/Homepage2.html"class="noLine"  >Home Page</a>  &nbsp
		<a href="http://localhost/project/userlogin.html" class="noLine" >User login</a> &nbsp
		<a href="http://localhost/project/ManagerPage.html" class="noLine" >Manager login</a> &nbsp
		<a href="http://localhost/project/userRegister.html" class="noLine" >User Register</a>
				
    </h3>
	<h1 class="mgtop">You can make an appointment here</h1>
	<form name="app2" action="http://localhost/project/Appointment3.php" onsubmit="return inputAllInfo()" method="post">
	<h3 id="loghosName">Please select the doctor here:
	<?php 
		include 'connectDB.php';
		
		//post the data from the html
		$dpName 	= $_POST["department"];
		$sql = "SELECT doc_name FROM doctor WHERE department_name='$dpName'";
		$result = mysqli_query($conn, $sql);
		$array=array();
		while($row=mysqli_fetch_array($result)){
			$array[]=$row['doc_name'];
		}
	?>
	<select id="selectBox" name = "dcnm">
		<option></option>
		<?php
			for($i=0; $i<count($array); $i++){
		?>
		<option> 
		<?php echo $array[$i] ?>
		</option>
		<?php 
			}
		?>
	</select><br><br>
	
	<input class="s" type="submit" name="login" value="next"></h3>
	
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
   var dc = document.getElementById("selectBox").value;

   //using the if condition statement to test which the blank is null
   if(dc==""){
	 window.alert("You must choose your doctor first");
	 return false;
   }else{
     return true;
   }
}
</script>
</html>