<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="">
            <tbody>
                <tr>
                    <td>
                        HEALTH PROMO ID
                    </td>
                    <td>
                        DATE
                    </td>
                    <td>
                        VENUE
                    </td>
                    <td>
                        TOPIC
                    </td>
                    <td>
                        METHOD
                    </td>
                    <td>
                        TARGET AUDIENCE
                    </td>
                    <td>
                        NUMBER OF AUD
                    </td>
                    <td>
                        REMARKS
                    </td>
                    <td>
                        MONTH
                    </td>
                    <td>
                        LATITUDE
                    </td>
                    <td>
                        LONGITUDE
                    </td>
                    <td>
                        IMAGE
                    </td>
                    <td>
                        IDCHO
                    </td>
                    <td>
                        SUBDISTRICT_ID
                    </td>
                </tr>
                
        <?php
        //        date, venue, topic, method, target_audience,number_of_audience,
//        remarks, month, latitude, longitude, image, idcho, subdistrict_id

        //check connection to your database
        include ("health_promotion.php");
        $obj = new health_promotion();
        if (!$obj->retrieveAll_promotion()) {
            print "error: " . mysql_error($obj->link);
            exit();
        }

//        $dataset2 = $obj->get_all_questions();
//        print_r($dataset2);
        

        $dataset = $obj->result;
        print_r($dataset);

        $row = mysql_fetch_assoc($dataset);

        while ($row) {
            print "<tr><td>";
            print $row["idhealth_promotion"];
            print "</td><td>";
            print $row['date'];
            print "</td><td>";
            print $row["venue"];
            print "</td><td>";
            print $row['topic'];
            print "</td><td>";
            print $row['method'];
            print "</td><td>";
            print $row['target_audience'];
            print "</td><td>";
            print $row['number_of_audience'];
            print "</td><td>";
            print $row['remarks'];
            print "</td><td>";
            print $row['month'];
            print "</td><td>";
            print $row['latitude'];
            print "</td><td>";
            print $row['longitude'];
            print "</td><td>";
            print $row['image'];
            print "</td><td>";
            print $row['idcho'];
            print "</td><td>";
            print $row['subdistrict_id'];
            print "</td></tr>";
            $row = mysql_fetch_assoc($dataset);
        }

//            mysql_close($link);

        ?>
                </tbody>
        </table>
    </body>
</html>