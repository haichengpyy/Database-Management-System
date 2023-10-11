<!-- Joshua 2030026117 deleteUser php -->
<?php

include 'connectDB.php';
        $mid = $_GET["new"];
		
        //delete the user from database and print the message
		$sql = "DELETE FROM user WHERE user_id='$mid'";
		$result = $conn->query($sql);
		
	    echo "Delete successfully $mid";
		echo "<div class = 'back'><a href='http://localhost/project/Homepage2.html'class='noLine'  >Back to HomePage</a></div> ";


$conn->close();

?>