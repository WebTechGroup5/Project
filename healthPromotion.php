<?php
	include_once("adb.php");
	
	class healthPromotion extends adb{
		function healthPromotion(){
			adb::adb();
		}
		
		function add_promotion($date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks,
						 $month, $latitude, $longitude, $image, $idcho, $subdistrict_id){
		$query= "INSERT INTO health_Promotion
						( date,venue,
						topic,method, target_audience,
						number_of_audience,remarks,
						month, latitude, longitude,
						image, idcho, subdistrict_id )
				VALUES ( '$date' ,'$venue' , '$topic', '$method', '$target_audience', '$number_of_audience', '$remarks',
						 '$month', '$latitude', '$longitude', '$image', '$idcho', '$subdistrict_id')";
		return $this->query($query);
		}
		
		function delete_promotion($idhealth_promotion){
		$query = "Delete from health_Promotion where idhealth_promotion = '$idhealth_promotion'";
		return $this->query($query);
		}
		
		function update_promotion($idhealth_promotion, $date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks,
						 $month, $latitude, $longitude, $image, $idcho, $subdistrict_id){
		$query= "UPDATE health_Promotion
				SET  date='$date', venue='$venue' , topic='$topic',
					method='$method', target_audience='$target_audience' , number_of_audience='$number_of_audience', 
					remarks= '$remarks', month='$month', latitude='$latitude', longitude='$longitude',image='$image',
					idcho ='$idcho', subdistrict_id='$subdistrict_id' where idhealth_promotion='$idhealth_promotion'";
		return $this->query($query);
		}
		
		function retrieveAll_promotion(){
		$query="SELECT *
				FROM health_Promotion";
		return $this->query($query);
		

}
		function retrieve_promotion($date, $venue){
		$query= "SELECT healthPromoID
				 FROM health_Promotion";
		return $this->query($query);
		}
		
		
		
		function filterBy_promotion($date, $month, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks,
						 $idcho, $subdistrict_id){
		$query= "SELECT *
				FROM healthPromotion
				WHERE date like %'$date'% 
				AND month like %'$month'%
				AND venue like %'$venue'$
				AND topic like %'$topic'%
				AND method like %'$method'%
				AND target_audience like %'$target_audience'%
				AND number_of_audience like %'$number_of_audience'%
				AND remarks like %'remarks'%
				AND idcho like %'idcho'% 
				AND subdistrict_id like %'$subdistrict_id'%
				
				 ";
		return $this->query($query);
		}
		
		function retrieveAll_idcho(){
			$query = "Select * from cho";
			return $this->query($query);
		
		}

	}
?>