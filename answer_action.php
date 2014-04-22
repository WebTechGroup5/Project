<?php
//Actions for answers
	include "gen.php";
	include "answers.php";
	
	$cmd = get_datan("cmd");
	$id = get_data("id");
	
	
	switch($cmd){
		
		case 1:
			//get answer data
			get_answer();
			
			break;
		
		case 2:
			//delete answer
			delete_answer();
			
			break;
			
		case 3:
			//get all answers 
//getall_answer();
			break;
			
		case 4:
			// add
			add_answer();
			
			break;
			
		case 5:
			get_all_answers_str();
		break;
		default:
			echo "{";
			echo jsonn("result", 0);
			echo ",";
			echo jsons("message", "not a recognised command");
			echo "}";

	}
	function get_answer(){
	$id=get_datan("id");
		$a = new answers();
		$a->get_answer_str($id);
		$row=$a->fetch();
		if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","data not found");
			echo "}";
			return;
		}
		
		echo "{";
			echo jsonn("result",1) .",";
			echo '"answer":{';
			//echo jsonn("id",$row['id']). ",";
			echo jsons("qid",$row['qid']). ",";
			echo jsonn("aid",$row['aid']). ",";
			echo jsons("answer",$row['answer']);
			echo "}";
		echo "}";
		
		
	}
		
		//
		function delete_answer(){
			$var=get_datan('aid');
						
			if(!$var){
				//return error message
				echo '{"result":0,"message":"id not correct"}';
			return;
			}
			
			$qwerty= new answers();
			if(!$qwerty->delete_answer($var)){
			echo'{"result":0,"message":"unable to delete"}';
			}
			else{
			echo '{"result":1,"message":"delete successful"}';
			
			}
		
	}
	/*
	function getall_answers(){
		$a = new answers();
		$a->getall_answer();
		//print "----------------------------";
		$row = $a->fetch();
		//print "----------------------------";
		//print_r($row);
		if (!$row){
		
		echo "{";
		echo jsonn("result", 0).",";
		echo jsons("message","error, no record retrieved");
		echo "}";
		return;
		}
			
			echo "{";
			echo jsonn("result", 3).",";
			echo '"answers":';
			echo "[";
			
		while($row){
			echo "{";
			echo jsonn("qid",$row["qid"]).",";
			echo jsonn("aid",$row["aid"]).",";
			echo jsons("answer",$row["answer"]);
			echo "}";
						
			$row=$a->fetch();
			if ($row)
			echo ",";
			}
			echo "]";
		    echo  "}";
			}
		*/
		
		function add_answer(){
			$qid = get_datan("id");
			$answer = get_data("answer");
			
			
			$var = new answers();
							
			
			if(!$var->add_answer($qid, $answer)){
				echo'{"result":0,"message":"unable to add"}';
			}
			else{
				echo '{"result":1,"message":"adding successful"}';
			
			
			}
			
		}
			
		function get_all_answers_str(){
		$id=get_datan("id");
		$var = new answers();
		$var->get_answer_str($id);
		$row=$var->fetch();
		if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","data not found");
			echo "}";
			return;
		}
		//echo "{";
		//echo jsonn("result", 0).",";
		//echo jsons("message","record retrieved");
		//echo "}";
		
		
			
			echo "{";
			echo jsonn("result", 1).",";
			echo '"answers":';
			echo "[";
			
		while($row){
			echo "{";
			echo jsonn("qid",$row["qid"]).",";
			echo jsonn("aid",$row["aid"]).",";
			echo jsons("answer",$row["answer"]);
			echo "}";
						
			$row=$var->fetch();
			if ($row){
			echo ",";
			}
			
		    
			
		}
		
		echo "]";
		echo  "}";	
	}

	
	
?>