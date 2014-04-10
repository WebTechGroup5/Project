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
        print $query;
        return $this->query($query);
    }

    /**
     * updates the record identified by id 
     */
    function update_question($qid, $cid, $idcho, $question) {
        //write the SQL query and call $this->query()
        $query = "Update webtech.questions set cid = $cid"
                . "                         , idcho = $idcho"
                . "                         , question = '$question' where qid = $qid";
        print $query;
        return $this->query($query);
    }

    /**
     * deletes a question based on the id
     */
    function delete_question($qid) {
        $query = "Delete from webtech.questions where qid = $qid";
        print $query;
        return $this->query($query);
    }

    /**
     * Gets a question based on the qid
     */
    function get_question($qid) {
        $query = "Select qid, cid, idcho, question from questions where qid = $qid";
        return $this->query($query);
    }

    /**
     * Gets questions based on the idcho
     */
    function filter_by_idcho($idcho) {
        $query = "Select qid, cid, idcho, question from questions where idcho = $idcho";
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