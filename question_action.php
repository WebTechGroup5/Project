<?php
//Actions for questions
	include "gen.php";
	include "question.php";
	
	$cmd = get_datan("cmd");
	
	
	
	switch($cmd){
		
		case 1:
			//get question data
			$id = get_datan("id");
			retrieve_question($id);
			
			
			break;
		
		case 2:
			//delete promotion
			$id = get_datan("id");
			remove_question($id);
			
			break;
			
		case 3:
			//get all promotions 
			
			break;
			
			
		default:
			echo "{";
			echo jsonn("result", 1);
			echo ",";
			echo jsons("message", "not a recognised command");
			echo "}";

	}
	
	function retrieve_question($id){
		$q = new question();
		$p->retrieve_promotion($date, $venue);
		if ($p){
			$row = $p->fetch();
			echo "{";
			echo jsonn("result", 1);
			echo '"promotion":';
			echo "{";
			echo jsonn("question_id", $row["qid"]).",";
			echo jsonn("cid", $row["cid"]);
			echo jsonn("cho_id", $row["idcho"]);		
			echo jsons("question", $row["question"]);
			
			echo "}}";
			return;
		}
			
		echo "{";
		echo jsonn("result", 0).",";
		echo jsons("message","error, no question retrieved");
		echo "}";
		
			
	}
	
	
	
	function remove_question($id){
		$q = new question();
		$q->delete_question($id);
		if(!$q){
			echo "{";
			echo jsonn("result", 0).",";
			echo jsons("message","error, Could not delete question");
			echo "}";	
			
			}
		else {
			echo "{";
			echo jsonn("result", 1).",";
			echo jsons("message","Deleted Question");
			echo "}";	
			
		}
		
		
	}
	
	function getall_questions(){
		$q = new question();
		$q->getall_question();
		if($q){
			$row = $q->fetch();
			
			echo "{";
			echo jsonn("result", 1);
			echo '"promotion":';
			echo "[";
			
			while($row){
			
			echo "{";
			echo jsonn("question_id", $row["qid"]).",";
			echo jsonn("cid", $row["cid"]);
			echo jsonn("cho_id", $row["idcho"]);		
			echo jsons("question", $row["question"]);
			
			echo "}";
			
			$row = $q->fetch();
			if($row){
				echo ",";
				
			}
			
		
			
		}
		
	}

		}
?>