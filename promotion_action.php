<?php
//Actions for promotions
	include "gen.php";
	include "health_promotion.php";
	
	$cmd = get_datan("cmd");
	$id = get_data("id");
	$date = get_data("date");
	$venue = get_data("venue");
	
	switch($cmd){
		
		case 1:
			//get promotion data
			
			get_promotion($date, $venue);
			break;
		
		case 2:
			//delete promotion
			delete_promotion($id);
			break;
			
		case 3:
			//get all promotions 
			getall_promotion();
			break;
			
			
		default:
			echo "{";
			echo jsonn("result", 1);
			echo ",";
			echo jsons("message", "not a recognised command");
			echo "}";

	}
	
	function get_promotion($date, $venue){
		$p = new health_promotion();
		$p->retrieve_promotion($date, $venue);
		if ($p){
			$row = $p->fetch();
			echo "{";
			echo jsonn("result", 1);
			echo '"promotion":';
			echo "{";
			echo jsonn("promotion_id", $row["idhealth_promotion"]).",";
			echo jsons("date", $row["date"]);
			echo jsons("venue", $row["venue"]);		
			echo jsons("topic", $row["topic"]);
			echo jsons("method", $row["method"]);
			echo jsons("Target_audience", $row["target_audience"]);
			echo jsonn("Number_audience", $row["number_of_audience"]);
			echo jsons("remarks", $row["remarks"]);
			echo jsons("month", $row["month"]); 
			echo jsons("topic", $row["topic"]);
			echo jsons("latitude", $row["latitude"]);	
			echo jsons("longitude", $row["longitude"]);
			echo jsons("image", $row["image"]);
			echo jsonn("cho_id", $row["idcho"]);
			echo jsonn("subdistrict_id", $row["subdistrict_id"]);
			echo "}";
			return;
		}
			
		echo "{";
		echo jsonn("result", 0).",";
		echo jsons("message","error, no record retrieved");
		echo "}";
		
			
	}
	
	
	
	function delete_promotion($id){
		$p = new health_promotion();
		$p->delete_promotion($id);
		if(!$p){
			echo "{";
			echo jsonn("result", 0).",";
			echo jsons("message","error, Could not delete");
			echo "}";	
			
			}
		else {
			echo "{";
			echo jsonn("result", 1).",";
			echo jsons("message","Deleted");
			echo "}";	
			
		}
	}
	
	function getall_promotion(){
	$p = new health_promotion();
		$p->retrieve_promotion($date, $venue);
		
		if ($p){
			$row = $p->fetch();
			
			echo "{";
			echo jsonn("result", 1);
			echo '"promotion":';
			echo "[";
			
			while($row){
			echo "{";
			echo jsonn("promotion_id", $row["idhealth_promotion"]).",";
			echo jsons("date", $row["date"]);
			echo jsons("venue", $row["venue"]);		
			echo jsons("topic", $row["topic"]);
			echo jsons("method", $row["method"]);
			echo jsons("Target_audience", $row["target_audience"]);
			echo jsonn("Number_audience", $row["number_of_audience"]);
			echo jsons("remarks", $row["remarks"]);
			echo jsons("month", $row["month"]); 
			echo jsons("topic", $row["topic"]);
			echo jsons("latitude", $row["latitude"]);	
			echo jsons("longitude", $row["longitude"]);
			echo jsons("image", $row["image"]);
			echo jsonn("cho_id", $row["idcho"]);
			echo jsonn("subdistrict_id", $row["subdistrict_id"]);
			echo "}";
			
			$row = $p->fetch();
			if($row){
				echo ",";
			}
			
		}
		echo "]}";
			return;
	}
			
		echo "{";
		echo jsonn("result", 0).",";
		echo jsons("message","error, no record retrieved");
		echo "}";
		
			
	}


?>