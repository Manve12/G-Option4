<?php
	include("../classes/_DBConnection.php");
	
	$t = $_POST['searchText'];
	
	$arrayOfRows = array();
	
	$db = new DBConnection();
	$conn = $db->connect();
	
	if ($conn){ // check if connected to db
		//break the search text apart
		$words = explode(" ", $t);
		//retrieve whole of the table data
		if ($result = mysqli_query($conn,"SELECT * FROM pets")){
		//loop through the words and search for the in the database
		while ($row = mysqli_fetch_array($result)){
			foreach ($words as $word){
				$fieldAmount = mysqli_num_fields($result) - 1;
				for ($counter = 0; $counter <= $fieldAmount; $counter++){
					$rowWords = explode(" ", trim(strtolower($row[$counter])));
					if (count($rowWords) == 1){
						$retValue = oneWord($row,$counter,$word);
						if ($retValue != null){
							array_push($arrayOfRows, $retValue);
						}
					} else {
						$retValue = multiWord($row,$counter,$word);
						if ($retValue != null){
							array_push($arrayOfRows, $retValue);
						}
					}
				}
			}
		}
		}
		echo json_encode( $arrayOfRows );
	}
	
	function oneWord($row, $counter, $word){
		if (trim(strtolower($row[$counter])) == trim(strtolower($word))){
			return $row;
		}
	}
	
	function multiWord($row, $counter, $word){
		for ($c = 0; $c <= count($row); $c++){
			if ($c == $counter){
				$t = explode(" ", $row[$c]);
				foreach($t as $val){
					if (trim(strtolower($val)) == trim(strtolower($word))){
						return $row;
					}
				}
			}
		}
	}
?>