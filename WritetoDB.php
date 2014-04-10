<?php//Senanu K. Fiam-Coblavie
	//check connection to your database
	$database="webtech";	//this database has to exist. 
	$username="root";		//the main admin user of mysql
	$password="naruto";			//use root password of mysql
	$server="localhost";	//name of the server
	
	$link=mysql_connect($server,$username,$password);
	//if result is false, the connection did not open
	if(!$link){	
		echo "Failed to connect to mysql.";
		//display error message from mysql
		echo mysql_error();	
		exit();		//end script
	}

	//select the database to work with using the open connection 
	if(!mysql_select_db($database,$link)){
		echo "Failed to select database.";
		//display error message from mysql
		echo mysql_error();	
		exit();	
	}

	
	//start runing query
	$o = 0;
	$id = 1;
	$name = "";
	$schedule = 0;
	$url = "";
	
	
	// if(isset($_GET["o"])){
	
		// $o= $_GET["o"];
	
	// if($o = 1){
	// $dataset = mysql_query("select * from webtech.vaccines order by vaccine_name desc", $link);
	// if (!$dataset){
		// echo "Error";
		// echo mysql_error();
		// exit();
	// }
	// }
	// }
	
	// else if (!isset($_GET["o"])){
	
	// }
	
	
		
	if ((isset($_GET["name"]))&&(isset($_GET["schedule"]))){
		$name = $_GET["name"];
		$schedule = $_GET["schedule"];
		$url = $_GET["url"];
		echo $name. "<br>";	
		echo "insert into webtech.vaccines (vaccine_name, schedule) values ('$name', $schedule)<br>";
		$dataset1 = mysql_query("insert into webtech.vaccines (vaccine_name, schedule, URL) values ('$name', $schedule, '$url')", $link); 
		if (!$dataset1){
			echo "Error";
			echo mysql_error();
			exit();
		}
	}
	
	$dataset = mysql_query("select * from webtech.vaccines order by vaccine_name asc", $link);
	if (!$dataset){
		echo "Error";
		echo mysql_error();
		exit();
	}
	
	
	
	//ID SEARCH
	/*if(isset($_GET["id"])){
		
		$id = $_GET["id"];
		
		$dataset = mysql_query("select * from webtech.vaccines where vaccine_id  like ".$id, $link);
	if (!$dataset){
		echo "Error";
		echo mysql_error();
		exit();
	}
		
	}
	
	if(isset($_GET["name"])){
		
		$name = $_GET["name"];
		echo $name. "<br>";	
		echo "select * from webtech.vaccines where vaccine_name like '%$name%'<br>";
		$dataset = mysql_query("select * from webtech.vaccines where vaccine_name like '%$name%'" , $link);
	if (!$dataset){
		echo "Error";
		echo mysql_error();
		exit();
	}
		
	}
	*/

	
?>

<html>
	<table border = 1 style = border-collapse:collapse>
		 <tr>
			<th> ID </th>
			<th> Vaccine Name </th>
			<th> Schedule</th>

		<?php	
			
			$row = mysql_fetch_assoc($dataset);
		
			
			while($row){
				echo "<tr><td>";
				echo $row["vaccine_id"];
				echo "</td>";
				echo "<td><a href = connect.php?idnum=".$row["vaccine_id"].">" ;
				
				echo $row["vaccine_name"];
				echo "</a></td>";
				
				echo "<td>";
				echo $row["schedule"];
				echo "</td><tr>";
				
				$row = mysql_fetch_assoc($dataset);
			}
			mysql_close($link);
		?>
		
		<form title = Search>
			
		<!--Vaccine ID:<input type = text name = id> <br> -->
		Vaccine Name:<input type = text name = name> <br>
		Schedule:<input type = number name = schedule><br>
		URL:<input type = text name = url><br>
		<input type = submit name = insert value = Insert>
		
		</form>

</html>