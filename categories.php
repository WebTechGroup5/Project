<?php
	
	include_once ("./adb.php");

	class categories extends adb{
		function categories(){
			adb::adb();	
		}
		
		
		function getall_categories(){
			$query = "Select * from
						categories";
			return $this->query($query);
			
		}
		
		function getid_categories($name){
			$query = "Select cid from categories where name = '$name'";
			$this->query($query);		
			$id = $this->fetch();
			return $id["cid"];
			
		}

	}
?>