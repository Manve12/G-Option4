<?php
	include("../classes/_DBConnection.php");
	
	$arrayOfRows = array();
	
	$db = new DBConnection();
	$conn = $db->connect();
	
	if ($conn){ // check if connected to db
		if ($result = mysqli_query($conn,"SELECT * FROM pets")){
			//loop through the table
			while ($row = mysqli_fetch_array($result)){
				array_push($arrayOfRows,$row);
			}
		}
		echo json_encode($arrayOfRows);
	}
?>