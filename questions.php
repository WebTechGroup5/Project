<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("adb.php");

class questions extends adb {

    function questions() {
        adb::adb();
    }

    /**
     * query all questions in the table and store the dataset in $this->result	
     * @return if successful true else false
     */
    function get_all_questions() {

        $query = "select qid, cid, idcho, question from questions";
        $res = $this->query($query);
        return $res;
    }

    function add_question($cid, $idcho, $question) {
        //write the SQL query and call $this->query()
        $query = "Insert into questions(cid, idcho, question) values ('$cid', '$idcho', '$question');";
        
        return $this->query($query);
    }

    /**
     * updates the record identified by id 
     */
    function update_question($qid, $cid, $idcho, $question) {
        //write the SQL query and call $this->query()
        $query = "Update webtech.questions set cid = $cid"
                . "                         , idcho = $idcho"
                . "                         , question = '$question' where qid = '$qid'";
   
        return $this->query($query);
    }

    /**
     * deletes a question based on the id
     */
    function delete_question($qid) {
        $query = "Delete from webtech.questions where qid = $qid";
        
        return $this->query($query);
    }

    /**
     * Gets a question based on the qid
     */
    function get_question($qid) {
        $query = "Select qid, cid, idcho, question from questions where qid = '$qid'";
		$result = $this->query($query);
		//print_r($result);
        return $result;
    }

    /**
     * Gets questions based on the idcho
     */
    function filter_by_idcho($idcho) {
        $query = "Select qid, cid, idcho, question from questions where idcho = $idcho";
        return $this->query($query);
    }
	
	
	function count_answers($id){
		$query = "select count(*) as c from answers where answers.qid = '$id' ";	
		 $this->query($query);
		 $row = $this->fetch();
		 return $row["c"];
	}
	
	function get_question_search($text){
		$query = "Select * from questions where question like '%".$text."%'";
		
		return $this->query($query);
	}

}



//call methods here to test

//$obj = new vaccines();
//
//if (!$obj->get_all_vaccines()) {
//    print "error";
//}
//
//$row = $obj->fetch();
//while ($row) {
//    print_r($row);
//    $row = $obj->fetch();
//}