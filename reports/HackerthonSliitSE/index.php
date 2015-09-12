<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>reports</title>
</head>
<body style="background: gray">
<div>
	<h1 style="color:black">Zoo reports</h1>
</div>
<div>
    <style scoped>

        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }

        .button-warning {
            background: rgb(223, 117, 20); /* this is an orange */
        }

        .button-secondary {
            background: rgb(66, 184, 221); /* this is a light blue */
        }

    </style>

    <a href="index.php" class="button-success pure-button">Home</a>
    <a href="location.php" class="button-error pure-button">Locations of employee</a>
    <a href="role.php" class="button-warning pure-button">Role of employee</a>

    <a href="surgeries.php" class="button-success pure-button">surgeries</a>
    <a href="animalLocation.php" class="button-error pure-button">Animal Location</a>
    <a href="animalCount.php" class="button-warning pure-button">Animal Count</a>
    <!-- <a href="#" class="button-secondary pure-button">Secondary Button</a> -->
</div>

</body>
</html>