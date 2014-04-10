<html>
    <head>
        <title>Health Promotion Form</title>

        <?php
        include ("health_promotion.php");
        ?>
    </head>   
    <body>

        <form action="health_promotion_form.php" method="GET">
            <input type="hidden" name="inputID"><br>
            Date: <input type="date" name="inputDATE"><br>
            Venue: <input type="text" name="inputVENUE"><br>
            Topic: <input type="text" name="inputTOPIC"><br>
            Method: <input type="text" name="inputMETHOD"><br>
            Target audience: <input type="text" name="inputTARGET_AUD"><br>
            Number of audience: <input type="text" name="inputNO_AUD"><br>
            Remarks: <input type="text" name="inputREMARKS"><br>
            Month:

            <select name="inputMONTH">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>


            <br>
            Latitude: <input type="text" name="inputLATITUDE">
            Longitude: <input type="text" name="inputLONGITUDE">
            Image: <input type="text" name="inputIMAGE">

            Idcho: <select name="inputIDCHO">

                <option value = "">Choose a CHO</option>
                <?php
                $cho = new health_promotion();              //  the constructor should be the name of the class
                $cho->retrieveAll_idcho();
                $row = $cho->fetch();
                while ($row) {
                    echo "<option value =" . $row["idcho"] . ">" . $row["cho_name"] . "</option> ";
                    $row = $cho->fetch();
                }
                ?>
            </select>

            subdistrict id: <input type="text" name="inputSUBDISTRICT_ID">
            <input type="submit" name ="submit" value="Submit">
        </form>


<?php
// create a form that allows the user to input data

if (isset($_GET["inputDATE"]) && isset($_GET["inputVENUE"]) && isset($_GET["inputTOPIC"]) &&
        isset($_GET["inputMETHOD"]) && isset($_GET["inputTARGET_AUD"]) && isset($_GET["inputNO_AUD"]) &&
        isset($_GET["inputMONTH"]) && isset($_GET["inputIDCHO"]) && isset($_GET["inputSUBDISTRICT_ID"])) {
    $idhealth_promotion = $_REQUEST["inputID"];
    $date = $_REQUEST["inputDATE"];
    $venue = $_REQUEST["inputVENUE"];
    $topic = $_REQUEST["inputTOPIC"];
    $method = $_REQUEST["inputMETHOD"];
    $target_audience = $_REQUEST["inputTARGET_AUD"];
    $number_of_audience = $_REQUEST["inputNO_AUD"];
    $remarks = $_REQUEST["inputREMARKS"];
    $month = $_REQUEST["inputMONTH"];
    $latitude = $_REQUEST["inputLATITUDE"];
    $longitude = $_REQUEST["inputLONGITUDE"];
    $image = $_REQUEST["inputIMAGE"];
    $idcho = $_REQUEST["inputIDCHO"];
    $subdistrict_id = $_REQUEST["inputSUBDISTRICT_ID"];


    if ($_GET["inputDATE"] != "" && $_GET["inputVENUE"] != "" && $_GET["inputTOPIC"] != "" && $_GET["inputMETHOD"] &&
            $_GET["inputTARGET_AUD"] != "" && $_GET["inputNO_AUD"] != "" && $_GET["inputMONTH"] != "" && $_GET["inputIDCHO"] &&
            $_GET["inputSUBDISTRICT_ID"] != "") {
        $prom = new health_promotion();

        //function update_promotion($idhealth_promotion, )
        $prom->add_promotion($date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks, $month, $latitude, $longitude, $image, $idcho, $subdistrict_id);
    } elseif (isset($_GET["submit"])) {

        echo "<div><header>ERROR: PLEASE FILL IN ALL FIELDS</header></div>";
    }
}
?>

    </body>
</html>