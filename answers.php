<?php
	
	
	include_once("adb.php");
	
	class answers extends adb{

		 function answers(){
			adb::adb();
		  }
	
	
		function add_answer($qid, $sid, $idcho, $answer){
	
			$query = "insert into answers(qid, sid, idcho, answer) values 
				('$qid', '$sid', '$idcho', '$answer')";
			print $query;
			return $this->query($query);
	
		}
		
		
		function delete_answer($cid){
		
			$query = "Delete * from answers where cid = '$cid'";
	
			return $this->query($query);
		}
		
		function get_answer($aid){
		
			$query ="select * from answers where aid= '$aid'";
			return $this->query($query);
			
		}
		
		function get_answer_str($qid){
		
			$query ="select * from answers where qid= '$qid'";
			return $this->query($query);
			
		}
		
		
		function getall_answer(){
			$query = "select * from answers";
			return $this->query($query);
		}

	}
?>