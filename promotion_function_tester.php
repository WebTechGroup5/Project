<?php
	

// Test functions
include ("healthPromotion.php");
$prom = new healthPromotion();

//function update_promotion($idhealth_promotion, $date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks,
	//					 $month, $latitude, $longitude, $image, $idcho, $subdistrict_id)

//$prom->add_promotion("2014-02-02","ACCRA", "TV", "AIS", "TEENS", 100, "None", "June", 10.0, 15.0, "None", 1, 1);

//$prom->update_promotion(1, "2013-02-02","ACCRA", "TV", "AIS", "TEENS", 100, "None", "June", 10.0, 15.0, "None", 1, 1);		

$prom->retrieveAll_idcho();
$count = $prom->get_num_rows();
while($count!=0){
$count--;
print_r($prom->fetch());

?>
<html><br></html>

<?php
}
?>


<html>
<title>
HealthPromotionForm
</title>
<header>
Health Form
</header>
	<body>
	<form action="healthPromotionFORM.php" method="GET">
		<input type="hidden" name="inputID"><br>
		date: <input type="date" name="inputDATE"><br>
		venue: <input type="text" name="inputVENUE"><br>
		topic: <input type="text" name="inputTOPIC"><br>
		method: <input type="text" name="inputMETHOD"><br>
		target audience: <input type="text" name="inputTARGET_AUD"><br>
		number of audience: <input type="text" name="inputNO_AUD"><br>
		remarks: <input type="text" name="inputREMARKS"><br>
		month:
		<select name="inputMONTH">
		<option value="january">January</option>
		<option value="february">February</option>
		<option value="march">March</option>
		<option value="april">April</option>
		<option value="may">May</option>
		<option value="june">June</option>
		<option value="july">July</option>
		<option value="august">August</option>
		<option value="september">September</option>
		<option value="october">October</option>
		<option value="november">November</option>
		<option value="december">December</option>
	</select>

		<br>
		latitude: <input type="text" name="inputLATITUDE">
		longitude: <input type="text" name="inputLONGITUDE">
		image: <input type="text" name="inputIMAGE">
		idcho: <input type="text" name="inputIDCHO">
		subdistrict id: <input type="text" name="inputSUBDISTRICT_ID">
		<input type="submit" name ="submit" value="Submit">
	</form>
	
		


</body>
</html>