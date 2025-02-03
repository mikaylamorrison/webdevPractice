<?php include ('lab09login.php'); ?>

<?php

	// dropping table for the pictures
	$drop = "DROP TABLE Pictures";
	
	if (mysqli_query($connect, $drop)) {
	 echo "Picture Table have been Dropped.";
	} else {
	 echo "Error Dropping Table: " .mysqli_error($connect);
	}
	
	mysqli_close($connect);
?>
