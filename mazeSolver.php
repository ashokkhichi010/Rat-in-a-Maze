<?php
	// function mazeSolver($maze){
	// 	pathFinder($maze, 0, 0);
	// }
	function pathFinder($maze, $row, $col){
		$mazeSize = count($maze);
		if ($col == $mazeSize) {
			return false;
		}
		if ($row == $mazeSize - 1 && $col == $mazeSize - 1) {
			$maze[$row][$col] = 'X';
			$_SESSION['maze'] = $maze;
			return true;
		}
		if ($maze[$row][$col] == 0) {
			$maze[$row][$col] = 'X';
			if(pathFinder($maze, $row, $col+1)){
				return true;
			}else{
				if(pathFinder($maze, $row+1, $col)){
					return true;
				}
			}
			$maze[$row][$col] = 0;
		}
		return false;
	}
?>