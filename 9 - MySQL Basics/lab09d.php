<?php include ('lab09login.php'); ?>

<head>
    <link rel="stylesheet" href="lab09.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">
</head>

<?php

    $locationQuery = "SELECT DISTINCT location FROM Pictures";
    $yearQuery = "SELECT DISTINCT YEAR(date_taken) AS year FROM Pictures";
    $locationResult = mysqli_query($connect, $locationQuery);
    $yearResult = mysqli_query($connect, $yearQuery);
   
    echo "<form method='post' action=''>";
    
    // Location
    echo "<label for='location'>Select Location:</label><br>";
    while ($row = mysqli_fetch_array($locationResult, MYSQLI_ASSOC)) {
        echo "<input type='radio' name='location' value='" . $row['location'] . "' id='location_" . $row['location'] . "'>";
        echo "<label for='location_" . $row['location'] . "'>" . $row['location'] . "</label><br>";
    }
    echo "<br>";

    // Year
    echo "<label for='year'>Select Year:</label><br>";
    while ($row = mysqli_fetch_array($yearResult, MYSQLI_ASSOC)) {
        echo "<input type='radio' name='year' value='" . $row['year'] . "' id='year_" . $row['year'] . "'>";
        echo "<label for='year_" . $row['year'] . "'>" . $row['year'] . "</label><br>";
    }
    echo "<br>";
    echo "<input type='submit' value='Find Pictures'>";
    echo "</form>";

    // Handle submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['location']) && isset($_POST['year'])) {
        $locationSelect = mysqli_real_escape_string($connect, $_POST['location']);
        $yearSelect = mysqli_real_escape_string($connect, $_POST['year']);

        $query = "SELECT * FROM Pictures WHERE location='$locationSelect' AND YEAR(date_taken)='$yearSelect'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<div style='display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; max-width: 1200px; margin: auto;'>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<div style='text-align:center; width:250px; height:auto; border:1px solid #ddd; border-radius:10px; 
					 padding:10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;'>";
				echo "<img src='" . $row['picture_url'] . "' alt='" . $row['subject'] . "' style='width:250px; height:200px; border-radius:10px; border:1px solid #2A628F;'>";
				echo "<p> Location: ".$row['location']."</p>";
				echo "<p> Date Taken: ".$row['date_taken']."</p>";
				echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p style='text-align:center; font-weight:bold;'>No pictures match your criteria.</p>";
        }

        mysqli_free_result($result);
    }
    mysqli_close($connect);
?>


