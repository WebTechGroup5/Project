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

    default:
        echo "{";
        echo jsonn("result", 1);
        echo ",";
        echo jsons("message", "not a recognised command");
        echo "}";
}

function update_promotion() {
    $idhp = get_datan('idhp');
    $date = get_datan('date');
    $venue = get_datan('ven');
    $topic = get_datan('top');
    $method = get_datan('meth');
    $target_aud = get_datan('tar');
    $num_of_aud = get_datan('num_aud');
    $month = get_datan('month');
    $lat = get_datan('lat');
    $lon = get_datan('lon');
    $image = get_datan('img');
    $sub_id = get_datan('sub_id');
    $idcho = get_datan('idcho');
    $remarks = get_datan('rmks');

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
    echo jsonn("result", 3) . ",";
    echo '"health_promotion":{';
    echo jsonn("id", $idhp) . ",";
    //name
    print jsons("topic", $topic) . ",";
    //schedule
    print jsonn("method", $method) . ",";
    //url
    print jsons("date", $date);
    echo "}";
    echo "}";
}

function get_promotion() {
    $idhp = get_datan('idhp');
    $p = new health_promotion();
    $p->retrieve_promo_by_id_promo($idhp);
    if ($p) {
        $row = $p->fetch();
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
        echo jsons("latitude", $row["latitude"]) . ",";
        echo jsons("longitude", $row["longitude"]) . ",";
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
        echo jsons("latitude", $row["latitude"]) . ",";
        echo jsons("longitude", $row["longitude"]) . ",";
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
    $p->delete_promotion($idhp);
    if (!$p) {
        echo "{";
        echo jsonn("result", 0) . ",";
        echo jsons("message", "error, Could not delete");
        echo "}";
    } else {
        echo "{";
        echo jsonn("result", 1) . ",";
        echo jsons("message", "Deleted");
        echo "}";
    }
}

function get_all_promotions() {
    $p = new health_promotion();
    $p->retrieveAll_promotion();

    if ($p) {
        $row = $p->fetch();

        echo "{";
        echo jsonn("result", 1);
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
            echo jsons("latitude", $row["latitude"]) . ",";
            echo jsons("longitude", $row["longitude"]) . ",";
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
