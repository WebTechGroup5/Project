<?php
include_once("adb.php");

	class answer extends adb {

		function answerTable() {
			adb::adb();
		}
	
			//add
		function add_answer(){
		$query= INSERT INTO answerTable($aid, $qid, $sid, $answer)
				VALUES ('$aid', '$qid', '$sid', '$answer');
		return $this->query($query);
    }

			//delete()
		function delete_answer($aid) {
        $query = "Delete from aid
                  WHERE aid = '$aid'";
        return $this->query($query);
    }
			//update()
		function update_promotion($aid, $qid, $sid, $answer) {
        $query = "UPDATE answerTable
				  SET  qid='$qid', sid='sid', answer= 'answer'
                  WHERE aid = '$aid'";
        return $this->query($query);
    }

			//retrieveAll()
		function retrieveAll(){
		$query = "SELECT * FROM answerTable";
        return $this->query($query);
		
}
			//retrieve(answer) 
		function retrieve($answer) {
        $query = "SELECT answer
                  FROM answerTable";
        return $this->query($query);
    }
	}
?>