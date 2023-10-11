<html>
<title> Appointment Registration</title>
<head>
<link rel="stylesheet" type="text/css" href="http://localhost/project/hospital.css">
</head>
<body class="logbodycolor">
	<h1 id="loghosName"><img class ="logo" src="logo.png"  >&nbsp&nbsp&nbsp&nbspUIC &nbsp HOSPITAL </h1>
	<h3 id="lognavigation">
		Navigation &nbsp &nbsp
        <a href="http://localhost/project/Homepage2.html"class="noLine"  >Home Page</a>  &nbsp
		<a href="http://localhost/project/userlogin.html" class="noLine" >User login</a> &nbsp
		<a href="http://localhost/project/ManagerPage.html" class="noLine" >Manager login</a> &nbsp
		<a href="http://localhost/project/userRegister.html" class="noLine" >User Register</a>
				
    </h3>
	<h1 class="mgtop">You can print the most recent nucleic acid result by yourself</h1>
	
	<form name="acid" action="http://localhost/project/Homepage.html" method="post">
	<div id="acidBox">
		<h2 id="loghosName">Latest nucleic acid test records</h2>
		<?php 
			include 'connectDB.php';
			$uName = $_COOKIE["userN"];
			$sql = "SELECT * FROM nucleic_acid_testing, patient WHERE user_name='$uName' and nucleic_acid_testing.user_id=patient.user_id";
			$res = mysqli_query($conn, $sql);
			$arr1=array();
			$arr2=array();
			while($row=mysqli_fetch_array($res)){
				$arr1[]=$row['testing_date'];
				$arr2[]=$row['result'];
			}
			
			$sql2 = "SELECT vaccination_records FROM patient WHERE user_name='$uName'";
			$res2 = mysqli_query($conn, $sql2);
			$arr3=array();
			while($row3=mysqli_fetch_array($res2)){
				$arr3[]=$row3['vaccination_records'];
			}
		?>
		<h3 id="text">Name: <?php echo $uName ?></h3>
		<h3 id="text">Sampling time: <?php if($arr1[0]!=''){echo $arr1[0];}else{echo "\nYou haven't had a nucleic acid test yet";} ?></h3>
		<h3 id="text">Testing organization: UIC Hospital</h3>
		<h3 id="text">Testing result: <?php if($arr2[0]!=''){echo $arr2[0];}else{echo "unknown";} ?></h3>
		
		<h3 id="text">Health status: <?php if($arr2[0]=="Negative"){ echo "low risk";} elseif($arr2[0]=="Positive"){echo "high risk";} else{echo "unknown";} ?></h3>
		<h3 id="text">COVID-19 vaccination records:
		<?php if($arr3[0]>"0"){ echo "You have received ".$arr3[0]." shots of vaccine successfully";} else{echo "You haven't received any vaccine";} ?></h3>
		
		
		<img class ="QR" src="QR.png" >
		<p id="text">Thanks for choosing our hospital, wish you a good life!</p>
	</div>
	<input id="print" type="submit" name="login" value="print the result" onclick="prSucc()"></h3>
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
function prSucc(){
	window.alert("The result is printing!\nThanks for choosing our hospital, wish you a good life!")
}
</script>
</html>