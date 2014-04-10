<html>
<body>
<form title = Search>
			
		<?php
				$vname = "Search";
					if (isset($_GET["name"]))
					{$vname = $_GET["name"];  }
				
		?>	
			
		Vaccine ID:<input type = text name = id> <br>
		Vaccine Name:<input type = text name = name value = "<?php $vname ?>"> <br>
		<input type = submit name = search value = Search>
		
		</form></body>

</html>
<?php
	
	include ("vaccines.php");
	$obj = new vaccines();
	
	//start runing query
	$o = 0;
	$id = 1;
	$name = "";
	
	if(isset($_GET["o"])){
	
		$o= $_GET["o"];
	
	if($o = 1){
	$obj->get_all_vaccines();
	if (!$dataset){
		echo "Error";
		echo mysql_error();
		exit();
	}
	}
	}
	
	else if (!isset($_GET["o"])){
		
	if (!$obj->get_all_vaccines()){
		echo "Error";
		echo mysql_error();
		exit();
	}
	}
	
	if(isset($_GET["name"])){
		
		$name = $_GET["name"];
		echo $name. "<br>";	

		
		if(!$obj->get_all_vaccines()){
			echo "error";
			exit();
		
		}
	
	}
	

		
	

	
?>

<html>
	<table border = 1 style = border-collapse:collapse>
		 <tr>
			<th> ID </th>
			<th> Vaccine Name </th>
			<th> Schedule</th>

		<?php	
			
			$row = $obj->fetch();
		
			
			while($row){
				echo "<tr><td>";
				echo $row["vaccine_id"];
				echo "</td>";
				echo "<td><a href = connect.php?idnum=".$row["vaccine_id"].">" ;
				
				echo $row["vaccine_name"];
				echo "</a></td>";
				
				echo "<td>";
				echo $row["schedule"];
				echo "</td>";
				
				echo "<td>";
				echo "<a href = vaccine_edit.php?vid=".$row["vaccine_id"]." > edit </a> ";
				echo "";
				
				echo "</td><tr>";
				
				$row = $obj->fetch();
			}
		
		?>
		
		

</html>