<?php

// Problem 1
$timeOfDay = (int)date("H");
$greeting = "";
$background = "";

if ($timeOfDay >= 5 && $timeOfDay < 12) {
    $greeting = "Good Morning";
    $background = "morning.jpg";
} elseif ($timeOfDay >= 12 && $timeOfDay < 18) {
    $greeting = "Good Afternoon";
    $background = "afternoon.gif";
} elseif ($timeOfDay >= 18 && $timeOfDay < 21) {
    $greeting = "Good Evening";
    $background = "evening.jpg";
} else {
    $greeting = "Good Night";
    $background = "night.gif";
}

// Problem 2
$allNumbers = array();
$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rows'], $_POST['columns'])) {
    $rows = intval($_POST['rows']);
    $columns = intval($_POST['columns']);
    
    if ($rows >= 3 && $rows <= 12 && $columns >= 3 && $columns <= 12) {
        for ($r = 1; $r <= $rows; $r++) {
            for ($c = 1; $c <= $columns; $c++) {
                $allNumbers[] = $r * $c;
            }
        }
    } else {
        $message = "Row and Column values must be between 3 and 12.";
    }
}

// Problem 3
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['favImage'])) {
    $favImage = $_POST['favImage'];
    setcookie('favImage', $favImage, time() + 86400);  
    $imageFileName = basename($favImage);  
} elseif (isset($_COOKIE['favImage'])) {
    $favImage = $_COOKIE['favImage'];
    $imageFileName = basename($favImage);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="lab08.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <title>CPS530: Lab 8 (Mikayla M.)</title>
    <style>
        .q1div {
            background: url('<?php echo $background; ?>') no-repeat center center;
            background-size: cover;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
<div>
    <header>
        <h1>
            Lab 8: PHP
        </h1>
    </header>

    <main>
        <section>
            <h3>Problem 1: Time of Day</h3>
            <div class="q1div">
                <h3><?php echo $greeting; ?></h3>
            </div>
        </section>
        <hr>

        <section>
            <h3>Problem 2: Multiplication Form</h3>
            <form method="POST" id="multiplication-form">
                <label>Number of Rows</label>
                <br>
                <input class="field" type="text" name="rows" required>
                <br>
                <label>Number of Columns</label>
                <br>
                <input class="field" type="text" name="columns" required>
                <br><br>
                <input type="submit" value="Display Multiplication Table">
                <br>
            </form>
            <div id="message-container"></div>
            <div id="table-container"></div>

            <script>
                const numbers = <?php echo json_encode($allNumbers); ?>;
                const rows = <?php echo $rows; ?>;
                const columns = <?php echo $columns; ?>;
                const message = "<?php echo $message; ?>";
                
                const messageContainer = document.getElementById('message-container');
                const tableContainer = document.getElementById('table-container');

                if (message) {
                    messageContainer.innerHTML = `<h3 class="error">${message}</h3>`;
                }

                else {
                    const table = document.createElement('table');
                    let index = 0;

                    for (let r = 1; r <= rows; r++) {
                        const row = document.createElement('tr');
                        for (let c = 1; c <= columns; c++) {
                            const cell = document.createElement('td');
                            cell.textContent = numbers[index++];
                            row.appendChild(cell);
                        }
                        table.appendChild(row);
                    }
                    tableContainer.appendChild(table);
                }
            </script>
        </section>
        <hr>

       <section>
            <h3>Problem 3: Favourite Image</h3>

            <form method="POST">
                 <?php if ($favImage): ?>
                <div class="favContainer">
                    <img src="<?php echo $favImage; ?>" alt="Selected Image">
                </div>
                <h2>Current image: <?php echo $imageFileName; ?></h2>
				<?php else: ?>
					<h4>Please select your favourite image.<h4>
				<?php endif; ?>
				
				<label>
                    <input type="radio" name="favImage" value="cornucopia.gif" <?php echo ($favImage === 'cornucopia.gif' ? 'checked' : ''); ?>> Cornucopia
                </label>
                <br>
                <label>
                    <input type="radio" name="favImage" value="basket.gif" <?php echo ($favImage === 'basket.gif' ? 'checked' : ''); ?>> Basket
                </label>
                <br>
                <label>
                    <input type="radio" name="favImage" value="wreath.gif" <?php echo ($favImage === 'wreath.gif' ? 'checked' : ''); ?>> Wreath
                </label>
                <br>
                <label>
                    <input type="radio" name="favImage" value="fancyTurkey.gif" <?php echo ($favImage === 'fancyTurkey.gif' ? 'checked' : ''); ?>> Fancy Turkey
                </label>
                <br>
                <label>
                    <input type="radio" name="favImage" value="cuteTurkey.gif" <?php echo ($favImage === 'cuteTurkey.gif' ? 'checked' : ''); ?>> Cute Turkey
                </label>
                <br><br>
                <input type="submit" value="Select Image">
            </form>

        </section>
        <hr>

    </main>
</div>
<footer>
    <p>Author: Mikayla Morrison</p>
    <p>Student Number: 501182358</p>
    <p><a href="mailto:m1morrison@torontomu.ca">Email: m1morrison@torontomu.ca</a></p>
    <p>Class: CPS530</p>
    <p>Section: 7</p>
</footer>
</body>
</html>

