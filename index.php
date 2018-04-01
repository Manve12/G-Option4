<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- include jquery library -->
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>
	
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		
		<script>$( function() {
				var availableTags = [
				"Dog","Cat","Male","Female","Golden Retriever","Domestic Shorthair",
				"Black","White","Rat","Chipmunk","Rabbit","Dead","Bird",
				"Australian Shepherd Mix","Dachshund Mix",
				"Labrador Retriever Mix","Pit Bull Mix",
				"Rat Terrier Mix","Domestic Longhair Mix",
				"Manx Mix","Australian Cattle Dog Mix","Chihuahua Shorthair Mix"
				];
				
				$( "#searchField" ).autocomplete({
				source: availableTags
				});
			} );</script>
	<body>
		<div class="ui-widget">
			<label for="searchField">Search: </label>
			<input type="text" name="Search Field" id="searchField"/>
		</div>
		<button id="searchButton">search</button>
		<button id="loadAllButton">Load All Pets</button>
		
		<div class="container">
			<div class="col-sm-1" id="petID">ID</div>
			<div class="col-sm-1" id="petName">Name</div>
			<div class="col-sm-2" id="petType">Type</div>
			<div class="col-sm-2" id="petGender">Gender</div>
			<div class="col-sm-2" id="petBreed">Breed</div>
			<div class="col-sm-2" id="petColour">Colour</div>
			<div class="col-sm-2" id="petAddress">Address</div>
		</div>
		
		<div class="container" id="petTable">
		<script>
			$(document).ready(function(){
				loadAllPets();
			});
		
			$("#searchButton").click(function(){
				$.ajax({
					method: "POST",
					url: "handlers/searchHandler.php",
					data:{
						"searchText":$("#searchField").val(),
					},
					success:function(res){
						petDisplay(res);
					},
				});
			});
			
			$("#loadAllButton").click(function(){
				loadAllPets();
			});
			
			function loadAllPets(){
				$.ajax({
					url:"handlers/loadHandler.php",
					success:function(res){
						petDisplay(res);
					},
				});
			}
			
			function petDisplay(res)
			{
				var obj = $.parseJSON(res);	
				$("#petTable").html("");
				
				for (i = 0; i < obj.length; i++){
					$("#petTable").html($("#petTable").html() +
						'<div class="row">' +
						'<div class="col-sm-1" >'+obj[i].Animal_ID+'</div>' +
						'<div class="col-sm-1" >'+obj[i].Anima_Name+'</div>' +
						'<div class="col-sm-2" >'+obj[i].animal_type+'</div>' +
						'<div class="col-sm-2" >'+obj[i].Animal_Gender+'</div>' +
						'<div class="col-sm-2" >'+obj[i].Animal_Breed+'</div>' +
						'<div class="col-sm-2" >'+obj[i].Animal_Color+'</div>' +
						'<div class="col-sm-2" >'+obj[i].Address+'</div>' +
						'</div>'
					);
				};
			}
			</script>
		</div>
	</body>
</html>