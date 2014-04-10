<?php
	include_once("adb.php");
	
	class vaccines extends adb{
		function vaccines(){
			adb::adb();
		}
		/**
		*query all vaccines in the table and store the dataset in $this->result	
		*@return if successful true else false
		*/
		
		function get_all_vaccines(){
			$query="select * from vaccines";
			return $this->query($query);
		}
		
		function add_vaccine($vaccine_name,$schedule){
			$query = "insert into vaccines (vaccine_name, schedule) values ($vaccine_name. '$schedule')";
			return $this->query($query);
			//write the SQL query and call $this->query()
		}
		/**
		*updates the record identified by id 
		*/
		function update_vaccine($vaccine_id,$vaccine_name,$schedule,$url){
			$query = "update vaccines set vaccine_name = '$vaccine_id', schedule = '$schedule', URL = '$url' where vaccine_id = '$vaccine_id';";
			return $this->query($query);
			//write the SQL query and call $this->query()
		}
		
		function get_vaccine($id){
			$query = "select * from vaccines where vaccine_id = '$id'";
			return $this->query($query);
		}
		
		
	}
	

	
	
	
?>