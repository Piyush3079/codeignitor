<?php
	session_start();
	$userData = $_SESSION['userData'];
	print_r($userData); 
	echo "Piyush Vijay";
	echo '<br>Logout from <a href="../login/logout.php">Facebook</a><br>';
	echo 'Logout from <a href="../login/gplogout.php">Google</a>';
?>