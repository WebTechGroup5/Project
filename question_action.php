<?php
//Actions for questions
	include "gen.php";
	include "questions.php";
	include "categories.php";
	
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
			//get all questionss 
			getall_question();
			break;
			
		case 4:
			//add
			
			$c = new categories();
			
			$cid = get_data("cid");
			$idcho = get_datan("idcho");
			$question = get_data("question");
			
			$result = $c->getid_categories($cid);
			
			save_question($result, $idcho, $question);
			break;
			
			
		default:
			echo "{";
			echo jsonn("result", 0);
			echo ",";
			echo jsons("message", "not a recognised command");
			echo "}";

	}
	
	function retrieve_question($id){
		$q = new questions();
		$q->get_question($id);
		if ($q){
			$row = $q->fetch();
			echo "{";
			echo jsonn("result", 1).",";
			echo '"promotion":';
			echo "{";
			echo jsonn("question_id", $row["qid"]).",";
			echo jsonn("cid", $row["cid"]).",";
			echo jsonn("cho_id", $row["idcho"]).",";		
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
		$q = new questions();
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
		$q = new questions();
		$q->getall_question();
		if($q){
			$row = $q->fetch();
			
			echo "{";
			echo jsonn("result", 1).",";
			echo '"promotion":';
			echo "[";
			
			while($row){
			
				echo "{";
				echo jsonn("question_id", $row["qid"]).",";
				echo jsonn("cid", $row["cid"]).",";
				echo jsonn("cho_id", $row["idcho"]).",";		
				echo jsons("question", $row["question"]);
				
				echo "}";
				
				$row = $q->fetch();
				if($row){
					echo ",";
				}
			}
			
		
			
		}
		
	
	}
		
		function save_question($cid, $idcho, $question){
			$q = new questions();
		
			
			if($q->add_question($cid, $idcho, $question)){
				echo "{";
				echo jsonn("result",1).",";
				echo jsons ("message", "Question added");
				echo "}";
				
			}
			else {
				echo "{";
				echo jsonn("result",0).",";
				echo jsons ("message", "Error. Question could not be added.");
				echo "}";
				
			}
			
		}
	
	
	
?>