<?php require_once("inc/config.php"); ?>
<?php

$sql = "SELECT `role`, count(`eid`) as `count` FROM `employee` group by `role`  desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "location : " . $row["location"]. " - users: " . $row["users"]. "<br>";
   		// $data[] = "'location':$row['location'],'users':$row['users']";
   		$data[] = $row['count'];
   		$categories[] = $row['role'];
    }


} else {
    echo "0 results";
}
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Employee by Role</title>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Employee by role'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
      //    series: [{
      //   	name: <?php echo "'{$categories[0]}'"; ?>,
      //    	// data: [<?php echo "{name: '".join($categories, '\',\'')."',". join($data, ',')."}"; ?>]
      // }]

        series: [{
            name: "role",
            colorByPoint: true,
            data: [
            	<?php
            	for($i=0;$i<count($data);$i++){
            		// echo "{name: '".$categories[$i]."', y: ".$data[$i]." },";
            		$v = "";
            		$v .= "{name: '";
            		$v .= $categories[$i];
            		$v .= "', y: ";
            		$v .= $data[$i];
            		if($i==0){
            			$v .= ",sliced: true,";
            			$v .= "selected: true";
            		}
            		$v .= " },";
            		echo $v;
            	}
            	 ?>
           ]
        }]
    });
});
		</script>
	</head>
	<body style="background: gray">
	<div>
	<h1 style="color:black">Methmedi reports</h1>
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

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	</body>
</html>
