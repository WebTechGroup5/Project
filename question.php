<?php

	include_once("adb.php");
	
	//constructor
	function question(){
		adb::adb();
	}
	
	
	//add
	function add_question($community_member_id, $idcho, $question){
		$query = "Insert into question 
					(cid, idcho, question) values
					('$community_member_id', '$idcho', '$question')";
		return $this->query($query);
	
	}
	
	
	//delete
	function delete_question($qid){
		$query = "delete from question
					where qid = '$qid'";
		return $this->query($query);
	}
	
	
	//update
	function update_question($qid, $community_member_id, $idcho, $question){
		$query = "update question 
					set cid = '$community_member_id', idcho = '$idcho',
					question = '$question' where qid = '$qid'";
				return $this->query($query);
	}
	
	
	//getall
	function getall_question(){
		$query = "select * question";
		return $this->query($query);
	}
	
	//get
	function get_question($qid){
		$query = "select * question where qid = '$qid'";
	return $this->query($query);
	}
	
	
	

	



?>