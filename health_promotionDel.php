<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("adb.php");

class health_promotion extends adb {

    function healthPromotion() {
        adb::adb();
    }

    function add_promotion($date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks, $month, $latitude, $longitude, $image, $idcho, $subdistrict_id) {
        $query = "INSERT INTO health_promotion(
                                    date, venue, topic, method, target_audience,number_of_audience,
                                    remarks, month, latitude, longitude, image, idcho, subdistrict_id)
				VALUES( 
                                    '$date', '$venue', '$topic', '$method', '$target_audience',
                                    '$number_of_audience', '$remarks', '$month', '$latitude',
                                    '$longitude', '$image', '$idcho', '$subdistrict_id')";
        return $this->query($query);
    }

    function delete_promotion($idhealth_promotion) {
        $query = "Delete from health_Promotion
                    WHERE idhealth_promotion = '$idhealth_promotion'";
        return $this->query($query);
    }

    function update_promotion($idhealth_promotion, $date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks, $month, $latitude, $longitude, $image, $idcho, $subdistrict_id) {
        $query = "UPDATE health_Promotion
				SET date = '$date', venue = '$venue', topic = '$topic',
                                    method = '$method', target_audience = '$target_audience',
                                    number_of_audience = '$number_of_audience', remarks = '$remarks',
                                    month = '$month', latitude = '$latitude', longitude = '$longitude',
                                    image = '$image', idcho = '$idcho', subdistrict_id = '$subdistrict_id'
                                WHERE idhealth_promotion = '$idhealth_promotion'";
        return $this->query($query);
    }

    function retrieveAll_promotion() {
        $query = "SELECT * FROM health_Promotion";
        return $this->query($query);
    }

    function retrieve_promotion($date, $venue) {
        $query = "SELECT healthPromoID
                    FROM health_Promotion";
        return $this->query($query);
    }

    function filterByDate_promotion($date) {
        $query = "SELECT *
                    FROM healthPromotion
                    GROUP BY dateOfEntry
                    HAVING date = '$date'";
        return $this->query($query);
    }

    function filterByMonth($month) {
        $query = "SELECT *
                    FROM healthPromotion
                    GROUP BY month
                    HAVING month = '$month'";
        return $this->query($query);
    }

    function filterByVenue($venue) {
        $query = "SELECT *
                    FROM healthPromotion
                    GROUP BY venue
                    HAVING venue='$venue'";
        return $this->query($query);
    }

    function filterByTopic($topic) {
        $query = "SELECT *
                    FROM healthPromotion
                    GROUP BY topic
                    HAVING topic='$topic'";
        return $this->query($query);
    }

    function filterByMethod($method) {
        $query = "SELECT *
                    FROM healthPromotion
                    GROUP BY method
                    HAVING method='$method'";
        return $this->query($query);
    }

    function filterByTargetAud($targetAud) {
        $query = "SELECT *
				 FROM healthPromotion
				 GROUP BY targetAud
				 HAVING target_audience='$target_audience'";
        return $this->query($query);
    }

    function filterByNumOfAud($number_of_audience) {
        $query = "SELECT *
				 FROM healthPromotion
				 GROUP BY numAud
				 HAVING number_of_audience='$number_of_audience'";
        return $this->query($query);
    }

    function filterByRemarks($remarks) {
        $query = "SELECT *
				 FROM healthPromotion
				 GROUP BY remarks
				 HAVING remarks= '$remarks'";
        return $this->query($query);
    }

    function filterByLatitude($latitude, $longitude) {
// might have to be the radius this point - if we don't have enough time,
//  we don't have to do it
        $query = "SELECT *
				 FROM healthPromotion
				 GROUP BY latitude, longitude
				 HAVING latitude='$latitude', longitude='$longitude'";
        return $this->query($query);
    }

    function filterByIDcho($idcho) {
        $query = "SELECT *
				 FROM healthPromotion
				 GROUP BY latitude, longitude
				 HAVING idcho='$idcho'";

        return $this->query($query);
    }

    function filterBySubdistrict($subdistrict_id) {
        $query = "SELECT *
				 FROM healthPromotion
				 GROUP BY subdistrict
				 HAVING subdistrict_id='$subdistrict_id'";
        return $this->query($query);
    }

    function retrieveAll_idcho() {
        $query = "Select * from cho";
        return $this->query($query);
    }

}
