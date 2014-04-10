<?php
	//connect using function
	include ("healthPromotion.php");
	$prom = new healthPromotion();
	
	$prom->retrieveAll_promotion();

?>
<html>
	<title>Search/Filter Promotions</title>
	
	<form action promotion_filter.php method = GET>
		<div>
			District:<input type = text name = district>
		</div>
		<div>
			Venue:<select name = venue>
				<option 
		</div>
		<div>
			<input type = submit = name submit value = Filter>
		</div>
	</form>

	<div>
	<table width = 700>	

</html>

<?php 
	echo "<tr><th>ID</th> <th>Date</th> <th>Venue</th> <th>Topic</th> <th>Method</th> <th>Target Audience</th> <th>Number of Audience</th> <th>Month</th> <th>CHO ID</th></tr>";
	
	$row = $prom->fetch();
	while ($row){
		echo "<tr align=center><td>".$row["idhealth_promotion"]."</td>
			<td>".$row["date"]."</td> <td>".$row["venue"]."</td> <td>".$row["topic"]."</td> <td>".$row["method"]."</td> <td>".$row["target_audience"]."</td> <td>".$row["number_of_audience"]."</td> <td>".$row["month"]."</td> <td>".$row["idcho"]."</td></tr>";
	
		$row = $prom->fetch();
	}
	
	
	echo "</table>";

	

?>