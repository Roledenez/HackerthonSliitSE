

<?php require_once("inc/config.php"); ?>
<?php

$sql = "SELECT `address`, count(`eid`) as `users` FROM `employee` group by `address` order by `eid` desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "location : " . $row["location"]. " - users: " . $row["users"]. "<br>";
   		// $data[] = "'location':$row['location'],'users':$row['users']";
   		$data[] = $row['users'];
   		$categories[] = $row['address'];
    }

} else {
    echo "0 results";
}
 ?>
 <!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Employee residence</title>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Employee residence'
        },
        subtitle: {
            text: 'by Adress'
        },
        xAxis: {
            categories: [<?php echo "'".join($categories, '\',\'')."'"; ?>],
            <?php
        //     echo "categories: [";
        //     foreach($data as $d) {
        //     echo $data->categories.",";
        // }
        // echo "],";
            ?>
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of employees'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} p</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
        	name: 'employees',
         	data: [<?php echo join($data, ',') ?>]
      }]
    });
});
		</script>
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

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
