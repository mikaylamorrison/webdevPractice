<?php include ('lab09login.php'); ?>

<head>
	<link rel="stylesheet" href="lab09.css">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">
</head>

<?php

	$query = "SELECT * FROM Pictures WHERE location='Ontario'";
	$result = mysqli_query($connect, $query);

	if(mysqli_num_rows($result) > 0){
		echo "<div style='display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; max-width: 1200px; margin: auto;'>";
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo "<div style='text-align:center; width:250px; height:auto; border:1px solid #ddd; border-radius:10px; 
					 padding:10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;'>";
			echo "<img src='" . $row['picture_url'] . "' alt='" . $row['subject'] . "' style='width:250px; height:200px; border-radius:10px; border:1px solid #2A628F;'>";
			echo "<p> Subject: ".$row['subject']."</p>";
			echo "<p> Location: ".$row['location']."</p>";
			echo "</div>";
		}
		echo "</div>";
	} else {
		echo "No photos found from Ontario.";
	}

	mysqli_free_result($result);
	mysqli_close($connect);
		
?>
