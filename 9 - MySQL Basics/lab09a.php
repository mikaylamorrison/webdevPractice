<?php include ('lab09login.php'); ?>

<?php

	// creating table for the pictures
	$table = "CREATE TABLE Pictures (
	picture_number INT(6) UNSIGNED PRIMARY KEY,
	subject VARCHAR(50) NOT NULL,
	location VARCHAR(50) NOT NULL,
	date_taken DATE, 
	picture_url VARCHAR(255) NOT NULL
	)";
	
	if (mysqli_query($connect, $table)) {
	 echo "<h3>Picture Table created successfully.<h3>";
	} else {
	 echo "Error: " . $table . "<br>" . mysqli_error($connect);
	}
	
	// populate table 
	$populateStatements = [
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (1,'Cute Laundry', 'Ontario', '2022-08-16', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/washingMachine.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (2,'Snoopy Plush', 'Ontario', '2024-10-26', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/snoopyPlush.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (3,'Snoopy Cake', 'New York', '2023-05-10', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/snoopyIcing.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (4,'Beep Sheep', 'Scotland', '2021-09-05', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/sheep.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (5,'Room', 'Ontario', '2020-03-19', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/room.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (6,'Great Fairy Fountain', 'San Diego', '2021-06-06', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/river.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (7,'Golden Wind', 'Naples', '2024-07-20', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/italy.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (8,'We\'re Friends Now', 'San Diego', '2022-08-27', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/friends.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (9,'Falling For Mew', 'New York', '2019-10-02', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/fallCats.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (10,'Street', 'Ontario', '2019-10-14', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/fall.jpg')",
    "INSERT INTO Pictures (picture_number, subject, location, date_taken, picture_url) 
     VALUES (11,'Crown Molding', 'Naples', '2024-07-21', 'https://webdev.cs.torontomu.ca/~msmorris/Lab09Pictures/details.jpg')"
	];

	foreach ($populateStatements as $populate) {
		if (mysqli_query($connect, $populate)) {
			echo "<p>Record added successfully.</p>";
		} else {
			echo "Error: " . $populate . "<br>" . mysqli_error($connect);
		}
	}
	
	mysqli_close($connect);
	
?>
