<?php

//Actions for promotions
include "gen.php";
include "health_promotion.php";

$cmd = get_datan("cmd");
$id = get_data("id");
$date = get_data("date");
$venue = get_data("venue");

switch ($cmd) {

    case 1:
        //get promotion based on idhealth promotion
        get_promotion();
        break;

    case 2:
        //get all promotions 
        get_all_promotions();
        break;

    case 3:
        //delete promotion
        delete_promotion();
        break;

    case 4:
        //update promotion
        update_promotion();
        break;

    case 5:
        //add a promotion
        add_promotion();
        break;

    case 6;
        // get one promotion
        get_promotion_by_date_venue();
        break;
    
    case 7;
        // get idcho from health promotion
        get_cho_by_promo_json();
        break;
    
    
    case 8;
        // search by method, date and topic
        search_by_method_date_topic();
        break;

    default:
        echo "{";
        echo jsonn("result", 1);
        echo ",";
        echo jsons("message", "not a recognised command");
        echo "}";
}

function search_by_method_date_topic(){
//    $idhp = get_datan('idhp');
    $search = get_data('search');
    
    $p = new health_promotion();
    $p->search_by_method_date_topic($search);
    $row = $p->fetch();
    if (!$row) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "No health promo found");
        echo "}";
        return;
    }
       

        echo "{";
        echo jsonn("result", 8);
        echo ',"found_promotions":';
        echo "[";

        while ($row) {
            echo "{";
            echo jsonn("promotion_id", $row["idhealth_promotion"]) . ",";
            echo jsons("date", $row["date"]) . ",";
            echo jsons("venue", $row["venue"]) . ",";
            echo jsons("topic", $row["topic"]) . ",";
            echo jsons("method", $row["method"]) . ",";
            echo jsons("target_audience", $row["target_audience"]) . ",";
            echo jsonn("number_of_audience", $row["number_of_audience"]) . ",";
            echo jsons("remarks", $row["remarks"]) . ",";
            echo jsons("month", $row["month"]) . ",";
            echo jsons("topic", $row["topic"]) . ",";
            echo jsonn("latitude", $row["latitude"]) . ",";
            echo jsonn("longitude", $row["longitude"]) . ",";
            echo jsons("image", $row["image"]) . ",";
            echo jsonn("cho_id", $row["idcho"]) . ",";
            echo jsonn("subdistrict_id", $row["subdistrict_id"]);
            echo "}";

            $row = $p->fetch();
            if ($row) {
                echo ",";
            }
        }
        echo "]}";
    
   
}

function get_cho_by_promo_json(){
    
}

function add_promotion(){
//    $idhp = get_datan('idhp');
    $date = get_data('date');
    $venue = get_data('ven');
    $topic = get_data('top');
    $method = get_data('meth');
    $target_aud = get_datan('tar');
    $num_of_aud = get_datan('num_aud');
    $month = get_data('month');
    $lat = get_datan('lat');
    $lon = get_datan('lon');
    $image = get_data('img');
    $sub_id = get_datan('sub_id');
    $idcho = get_datan('idcho');
    $remarks = get_data('rmks');

    $p = new health_promotion();
    $row = $p->add_promotion($date, $venue, $topic, $method, $target_aud, $num_of_aud, $remarks, $month, $lat, $lon, $image, $idcho, $sub_id);
    if (!$row) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Not added");
        echo "}";
        return;
    }
//    echo $ro
    echo "{";
    echo jsonn("result", 5) . ",";
    echo '"health_promotion":{';
    
    print jsonn("id", $p->get_insert_id()) . ",";
    //name
    print jsons("topic", $topic) . ",";
    //schedule
    print jsons("method", $method) . ",";
    //url
    print jsons("date", $date);
    echo "}";
    echo "}";
}

function update_promotion() {
    $idhp = get_datan('idhp');
    
    if($idhp == 0){
        add_promotion();
        return;
    }
    
    $date = get_data('date');
    $venue = get_data('ven');
    $topic = get_data('top');
    $method = get_data('meth');
    $target_aud = get_datan('tar');
    $num_of_aud = get_datan('num_aud');
    $month = get_data('month');
    $lat = get_datan('lat');
    $lon = get_datan('lon');
    $image = get_data('img');
    $sub_id = get_datan('sub_id');
    $idcho = get_datan('idcho');
    $remarks = get_data('rmks');

    $p = new health_promotion();
    $row = $p->update_promotion($idhp, $date, $venue, $topic, $method, $target_aud, $num_of_aud, $remarks, $month, $lat, $lon, $image, $idcho, $sub_id);
    if (!$row) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Not saved");
        echo "}";
        return;
    }

    echo "{";
    echo jsonn("result", 4) . ",";
    echo '"health_promotion":{';
    echo jsonn("id", $idhp) . ",";
    //name
    print jsons("topic", $topic) . ",";
    //schedule
    print jsons("method", $method) . ",";
    //url
    print jsons("date", $date);
    echo "}";
    echo "}";
}

function get_promotion() {
    $idhp = get_datan('idhp');
    $p = new health_promotion();
    $p->retrieve_promo_by_id_promo($idhp);
    $row = $p->fetch();
    if ($row) {
//        $row = $p->fetch();
        echo "{";
        echo jsonn("result", 1);
        echo ',"promotion":';
        echo "{";
        echo jsonn("promotion_id", $row["idhealth_promotion"]) . ",";
        echo jsons("date", $row["date"]) . ",";
        echo jsons("venue", $row["venue"]) . ",";
        echo jsons("topic", $row["topic"]) . ",";
        echo jsons("method", $row["method"]) . ",";
        echo jsons("target_audience", $row["target_audience"]) . ",";
        echo jsonn("number_of_audience", $row["number_of_audience"]) . ",";
        echo jsons("remarks", $row["remarks"]) . ",";
        echo jsons("month", $row["month"]) . ",";
        echo jsons("topic", $row["topic"]) . ",";
        echo jsonn("latitude", $row["latitude"]) . ",";
        echo jsonn("longitude", $row["longitude"]) . ",";
        echo jsons("image", $row["image"]) . ",";
        echo jsonn("cho_id", $row["idcho"]) . ",";
        echo jsonn("subdistrict_id", $row["subdistrict_id"]);
        echo "}";
        print "}";
        return;
    }

    echo "{";
    echo jsonn("result", 0) . ",";
    echo jsons("message", "error, no record retrieved");
    echo "}";
}

function get_promotion_by_date_venue() {

    $p = new health_promotion();
    $p->retrieve_promotion($date, $venue);
    if ($p) {
        $row = $p->fetch();
        echo "{";
        echo jsonn("result", 6);
        echo ',"promotion":';
        echo "{";
        echo jsonn("promotion_id", $row["idhealth_promotion"]) . ",";
        echo jsons("date", $row["date"]) . ",";
        echo jsons("venue", $row["venue"]) . ",";
        echo jsons("topic", $row["topic"]) . ",";
        echo jsons("method", $row["method"]) . ",";
        echo jsons("target_audience", $row["target_audience"]) . ",";
        echo jsonn("number_of_audience", $row["number_of_audience"]) . ",";
        echo jsons("remarks", $row["remarks"]) . ",";
        echo jsons("month", $row["month"]) . ",";
        echo jsons("topic", $row["topic"]) . ",";
        echo jsonn("latitude", $row["latitude"]) . ",";
        echo jsonn("longitude", $row["longitude"]) . ",";
        echo jsons("image", $row["image"]) . ",";
        echo jsonn("cho_id", $row["idcho"]) . ",";
        echo jsonn("subdistrict_id", $row["subdistrict_id"]);
        echo "}";
        print "}";
        return;
    }

    echo "{";
    echo jsonn("result", 0) . ",";
    echo jsons("message", "error, no record retrieved");
    echo "}";
}

//aid qid sid idcho answer
function delete_promotion() {

    $idhp = get_datan('idhp');
    $p = new health_promotion();
    
    // get what you are deleting first
    $p->retrieve_promo_by_id_promo($idhp);
    $row = $p->fetch();
    
    $deleted = $p->delete_promotion($idhp);
    
//    echo ($deleted);
    if (!$deleted) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "Error: Could not delete");
        echo "}";
    } else {
        echo "{";
        echo jsonn("result", 3) . ",";
        echo jsons("message", "Deleted") . ",";
        echo jsons("topic", $row['topic']);
        echo "}";
    }
}

function get_all_promotions() {
    $p = new health_promotion();
    $p->retrieveAll_promotion();

    if ($p) {
        $row = $p->fetch();

        echo "{";
        echo jsonn("result", 2);
        echo ',"all_promotions":';
        echo "[";

        while ($row) {
            echo "{";
            echo jsonn("promotion_id", $row["idhealth_promotion"]) . ",";
            echo jsons("date", $row["date"]) . ",";
            echo jsons("venue", $row["venue"]) . ",";
            echo jsons("topic", $row["topic"]) . ",";
            echo jsons("method", $row["method"]) . ",";
            echo jsons("target_audience", $row["target_audience"]) . ",";
            echo jsonn("number_of_audience", $row["number_of_audience"]) . ",";
            echo jsons("remarks", $row["remarks"]) . ",";
            echo jsons("month", $row["month"]) . ",";
            echo jsons("topic", $row["topic"]) . ",";
            echo jsonn("latitude", $row["latitude"]) . ",";
            echo jsonn("longitude", $row["longitude"]) . ",";
            echo jsons("image", $row["image"]) . ",";
            echo jsonn("cho_id", $row["idcho"]) . ",";
            echo jsonn("subdistrict_id", $row["subdistrict_id"]);
            echo "}";

            $row = $p->fetch();
            if ($row) {
                echo ",";
            }
        }
        echo "]}";
        return;
    }

    echo "{";
    echo jsonn("result", 0) . ",";
    echo jsons("message", "error, no record retrieved");
    echo "}";
}
