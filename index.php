<?php
	session_start();
	$n = 5;
	for ($row = 0; $row < $n; $row++) { 
		for ($col = 0; $col < $n; $col++) { 
			$maze[$row][$col] = 0;
		}
	}
	$maze[0][1] = 1;
	$maze[2][0] = 1;
	$maze[1][2] = 1;
	$maze[3][1] = 1;
	$maze[2][3] = 1;
	$maze[4][3] = 1;
	// $maze[2][2] = 1;
	// $maze[][] = 1;
	// $maze[][] = 1;
	include 'mazeSolver.php';
	pathFinder($maze, 0, 0);
	$maze = $_SESSION['maze'];
	echo '<pre>';
	print_r($maze);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rate in a Maze</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
		<div class="container">
		<?php 
			$size = (100/$n);
			for($row = 0; $row < $n; $row++){
				echo '<div class="row" style="height:'.$size.'%;">';
				for($col = 0; $col <$n; $col++){
					echo '<div id="'.$row.$col.'" class="col" onclick="fun(id)" style="width:'.$size.'%;"></div>';
				}
				echo '</div>';
			}
		?>
		</div>
	</center>
	<script type="text/javascript">
		<?php 
			for ($row = 0; $row < $n; $row++) { 
				for ($col = 0; $col < $n; $col++) { 
					if ($maze[$row][$col] == 1) {
						echo "document.getElementById('".$row.$col."').style.backgroundColor = 'black';";
					}if ($maze[$row][$col] == 'X') {
						echo "document.getElementById('".$row.$col."').style.backgroundColor = 'lightgreen';";
					}
				}
			}
		?>
	</script>
</body>
</html>