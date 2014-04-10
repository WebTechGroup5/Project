<?php
	

		$vid =$_GET["vid"];
	
	include ("vaccines.php");
	
	$obj = new vaccines();

	
	//Editing
	if (isset($_GET["vac_name"])&&isset($_GET["schedule"])&&isset($_GET["url"])){
		$name = $_GET["vac_name"];
		$sched = $_GET["schedule"];
		$url = $_GET["url"];
		$obj->update_vaccine($vid, $name, $sched, $url);
		
	}
	
	
	
	$obj->get_vaccine($vid);
	
	if(!$obj){
		echo "Error: ";
		echo mysql_error($link);
		exit();
	}

	$row = $obj->fetch();
	print_r($row);
	
	
?>

<html>
<title>
Edit Vaccine
</title>
<body>
	<form action = vaccine_edit.php method = GET>
		
		
			<input type = hidden name = vid value = <?php echo $vid ?> >
		<div>
			Vaccine Name:<input type = text name = vac_name value = <?php echo $row['vaccine_name']  ?>>
		</div>
		<div>
			Schedule:<input type = text name = schedule value = <?php echo $row['schedule']  ?>>
		</div>
		<div>
			URL:<input type = text name = url value = <?php echo $row['URL'] ?>>
		</div>
		<div>
			<input type = submit name = save value = Save>
		</div>

</body>

</html>

