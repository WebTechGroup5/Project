<html>
    <head>

        <title>Health Promotion List</title>
        <link rel="stylesheet" href="style.css">
        <script src="jquery-1.11.0.js"></script>
        <script src="gen.js"></script>
        <script>
            var globalVar;
            var spanVarPar;

            var globalAddObj;

            function search(num) {
                cancel();
                
                if (num == 1) {
                    var search = $("#txtSearch").val();
                    
                    if(search == ""){
                        $("#divStatus").text("Ha Ha Ha, you did not search for anything");
                        $("#divStatus").css({'color': 'yellow'});
                        return;
                    }
                    $("#searchTable").empty();
                    var u = "health_promotion_action.php?cmd=8&search=" + search;

                    r = syncAjax(u);

                    if (r.result == 0) {
                        //show error message
                        $("#divStatus").text("No Health Promotion Found");
                        $("#divStatus").css({'color': 'yellow'});
                        return;
                    }
                    
                    $("#divStatus").text("Search results for: \"" + search + "\"");
                    $("#divStatus").css({'color': 'yellow'});
                    
                    var tabl = $("#searchTable").closest("table");

                    var newRow = "row2";

//                header
                    $(tabl).append("<tr class ='header'><td>#</td><td>Topic</td><td>Method</td><td>Date</td><td>Edit</td><td>Delete</td></tr>");

                    var i = 0;
                    while (i <= r.found_promotions.length) {
                        $(tabl).append("<tr class ='" + newRow + "'><td>" + /*r.found_promotions[i].promotion_id */ (i + 1) + "</td/><td><a href=#>" + r.found_promotions[i].topic + "</a></td><td>" + r.found_promotions[i].method + "</td><td>" + r.found_promotions[i].date + "</td><td><span class='hotspot' onclick='edit(this," + r.found_promotions[i].promotion_id + ")'>edit<span></td><td><span class='hotspot2' onclick='del(this," + r.found_promotions[i].promotion_id + ")'>del<span></td></tr>");
                        i++;
                        if (newRow == "row1") {
                            newRow = "row2";
                        }
                        else {
                            newRow = "row1";
                        }
                    }
                }
                else
                {
                    var u = "health_promotion_action.php?cmd=8&search= ";

                    $("#searchTable").empty();

                    r = syncAjax(u);

                    var tabl = $("#searchTable").closest("table");

                    var newRow = "row2";

//                header
                    $(tabl).append("<tr class ='header'><td>#</td><td>Topic</td><td>Method</td><td>Date</td><td>Edit</td><td>Delete</td></tr>");

                    var i = 0;
                    while (i < r.found_promotions.length) {

                        $(tabl).append("<tr class ='" + newRow + "'><td>" + /*r.found_promotions[i].promotion_id*/ (i + 1) + "</td/><td><a href=#>" + r.found_promotions[i].topic + "</a></td><td>" + r.found_promotions[i].method + "</td><td>" + r.found_promotions[i].date + "</td><td><span class='hotspot' onclick='edit(this," + r.found_promotions[i].promotion_id + ")'>edit<span></td><td><span class='hotspot2' onclick='del(this," + r.found_promotions[i].promotion_id + ")'>del<span></td></tr>");
                        i++;
                        if (newRow == "row1") {
                            newRow = "row2";
                        }
                        else {
                            newRow = "row1";
                        }
                    }
                }
            }


            //makes a synchronous call to the page u and return the 
            //result as object
            function syncAjax(u) {
                var obj = $.ajax(
                        {url: u,
                            async: false
                        }
                );
                return $.parseJSON(obj.responseText);

            }
            function edit(obj, id) {

                // cancel so you can load up a previous form
                cancel();

                var r = getHealthPromo(id);
//                alert("result ----- " + r.result);
                if (r.result == 0) {
                    //show error message
                    return;
                }
                //get the data from JSON object r and get the respective attributes from the object and load into the form
                $("#topic").prop("value", r.promotion.topic);                        //       alert("topoc: "+r.promotion.topic);
                $("#method").prop("value", r.promotion.method);                       //      alert("alert"+r.promotion.method);
                $("#venue").prop("value", r.promotion.venue);                          //     alert("alert"+r.promotion.venue);
                $("#date").prop("value", r.promotion.date);                            //     alert("alert"+r.promotion.date);
                $("#target_audience").prop("value", r.promotion.target_audience);         //  alert("alert"+r.promotion.target_audience);
                $("#number_of_audience").prop("value", r.promotion.number_of_audience);   //  alert("alert"+r.promotion.number_of_audience);
                $("#remarks").prop("value", r.promotion.remarks);                         //  alert("alert"+r.promotion.remarks);
//                $("#month option:selected").prop("value", r.promotion.month);                            //   alert("alert"+r.promotion.month);
                $("#month option[value=" + r.promotion.month + "]").prop('selected', true);
//                option[value='+pSelectedValue+']
//                $("#month").prop('selected', "april"); 
                $("#latitude").prop("value", r.promotion.latitude);                       //  alert("alert"+r.promotion.latitude);
                $("#longitude").prop("value", r.promotion.longitude);                    //   alert("alert"+r.promotion.longitude);
                $("#image").prop("value", r.promotion.image);                            //   alert("alert"+r.promotion.image);
                $("#subdistrict").prop("value", r.promotion.subdistrict_id);            //    alert("alert"+r.promotion.subdistrict_id);


                $("#idcho").prop("value", r.promotion.cho_id);                          //    alert("alert"+r.promotion.cho_id);
                //show the form
                //find where the user clicked and store it in x and y
                var y = event.clientY;
                var x = event.clientX / 2;
                //use x and y to set the location of the form
                $("#divEdit").css("top", y);
                $("#divEdit").css("left", x);
                //display the form
                $("#divEdit").fadeIn(250);

                globalVar = id;
                spanVarPar = $(obj).closest("tr");
//                document.activeElement;
//                alert($(obj).get(0).tagName);
//                alert($(spanVarPar).get(0).tagName);
            }
            //returns a result object for one vaccine 
            function getHealthPromo(id) {
                var u = "health_promotion_action.php?cmd=1&idhp=" + id;
                return syncAjax(u);
            }
            //makes asynchronous call to the save page
            function save() {
                //complete the url
                var vtop = document.getElementById("topic").value;
                var vmeth = document.getElementById("method").value;
                var vven = document.getElementById("venue").value;
                var vdat = document.getElementById("date").value;
                var vtar = document.getElementById("target_audience").value;
                var vnum = document.getElementById("number_of_audience").value;
                var vrem = document.getElementById("remarks").value;
                var vmon = document.getElementById("month").value;
                var vlat = document.getElementById("latitude").value;
                var vlon = document.getElementById("longitude").value;
                var vim = document.getElementById("image").value;
                var vsub = document.getElementById("subdistrict").value;
                var vidc = document.getElementById("idcho").value;

                var id = globalVar;
//                alert("gloabalVar   ---  " + globalVar);
                var u = "health_promotion_action.php?cmd=4&idhp=" + id + "&date=" + vdat + "&ven=" + vven + "&top=" + vtop
                        + "&meth=" + vmeth + "&tar=" + vtar + "&num_aud=" + vnum + "&month=" + vmon + "&lat=" + vlat + "&lon=" + vlon
                        + "&img=" + vim + "&sub_id=" + vsub + "&idcho=" + vidc + "&rmks=" + vrem;

//                alert(u);
                r = syncAjax(u);
//                alert("result   ---  " +r.result);


                if (r.result == 4) { // signifies update
                    $("#divStatus").text("Health Promotion: \"" + vtop + "\" updated");
                    $("#divStatus").css({'color': 'yellow'});
                    //change things in the span
                    var nameCol = $(spanVarPar).children("td").get(1);
                    $(nameCol).text("");
                    $(nameCol).append("<a href=#>" + vtop + "</a>");

                    $(nameCol).css({'color': 'blue'});

                    // method column change dymincs
                    var methodColumn = $(spanVarPar).children("td").get(2);
                    $(methodColumn).text(vmeth);

                    // date column change dymincs
                    var dateColumn = $(spanVarPar).children("td").get(3);
                    $(dateColumn).text(vdat);
                }
                else if (r.result == 5) { // signifies add
                    $("#divStatus").text("Health Promotion: \"" + vtop + "\" added");
                    $("#divStatus").css({'color': 'yellow'});
//                    alert("added");
//                    var row = spanVarPar;
//                    var lastRow = $('#yourtableid tr:last').attr('id');

                    var tabl = $(globalAddObj).closest("table");
                    var lastRow = tabl.find("tr:last");


//                    alert($(lastRow).attr("class"));

                    var newRow = $(lastRow).attr("class");
                    if (newRow == "row1") {
                        newRow = "row2";
                    }
                    else {
                        newRow = "row1";
                    }
//                    alert(tabl.get(0).tagName);
//                    alert(lastRow.get(0).tagName);//.attr("id")

//                    $(lastRow).append("<tr><td><a href=#>" + vtop + "</a></td><td>ff</td><td>ff</td><td>kl</td><td>ff</td></tr>");
                    $(lastRow).after("<tr class ='" + newRow + "'><td>" + /*r.health_promotion.id*/"figure out logic" +"</td/><td><a href=#>" + vtop + "</a></td><td>" + vmeth + "</td><td>" + vdat + "</td><td><span class='hotspot' onclick='edit(this," + r.health_promotion.id + ")'>edit<span></td><td><span class='hotspot' onclick='del(this," + r.health_promotion.id + ")'>del<span></td></tr>");

                }
                else {
                    alert("didn't add nor update");
                }
                cancel();
            }

            function saveDone(data) {
                alert(data);
            }

            function del(obj, id) {
                // cancel so you can load up a previous form
                cancel();
                var r = getHealthPromo(id);

                if (r.result == 0) {
                    //show error message
                    return;
                }
                //show the form
                //find where the user clicked and store it in x and y
                var y = event.clientY;
                var x = event.clientX / 1.5;
                //use x and y to set the location of the form
                $("#divDel").css("top", y);
                $("#divDel").css("left", x);
                //display the form
                $("#divDel").fadeIn(250);

                globalVar = id;

                spanVarPar = $(obj).closest("tr");
            }

            function rem() {
                spanVarPar.remove();

                var u = "health_promotion_action.php?cmd=3&idhp=" + globalVar;
//                alert(u);
                r = syncAjax(u);
                cancel();
                $("#divStatus").text("Health Promotion: \"" + r.topic + "\" deleted");
                $("#divStatus").css({'color': 'yellow'});
            }

            function add(obj) {

                globalAddObj = obj;

                globalVar = 0;
//                alert(globalVar);

                var y = event.clientY;
                var x = event.clientX / 2;

                $("#divEdit").css("top", y);
                $("#divEdit").css("left", x);
//                save();
                $("#divEdit").fadeIn(250);
//                cancel();
            }

            //hides the form
            function cancel() {
                //fade out the form in half a second
                $("#divEdit").fadeOut(250);
                $("#divDel").fadeOut(250);
            }
        </script>
    </head>
    <body>
        <table>
            <tr>
                <td colspan="2" id="pageheader">
                    health information system
                </td>
            </tr>
            <tr>
                <td id="mainnav">
                    <div class="menuitem">location</div>
                    <div class="menuitem">opd cases</div>
                    <a href="health_promotion_list.php"><div class="menuitem">health promotion</div></a>
                    <div class="menuitem">nutrition</div>
                    <div class="menuitem">child welfare</div>
                    <div class="menuitem">family planning</div>
                </td>
                <td id="content">
                    <div id="divPageMenu">
                        <span class="menuitem" >sub districts</span>
                        <span class="menuitem" >communities</span>
                        <span class="menuitem" >view map</span>
                        <input type="text" id="txtSearch" >
                        <!------------------------added onclick="search()"---------------------------------------------------->
                        <span class="menuitem" onclick="search(1)">search</span>		
                    </div>

                    <div id="divStatus" class="status">
                        status message
                    </div>
                    <!---------------------------------------------------------------------------->
                    <div id="divPageMenuSub">
                        <a href="question_view.php"><span class="menuitem" >questions</span></a>
                        <a href="#"><span class="menuitem" >answers</span></a>
                        <a><span class="menuitem" onclick = "search(0)">refresh</span></a>
                    </div>

                    <span style="font-weight: bold; font-size: large">Health Promotions</span>
                    <button class="field" onclick="add(this)" style="float: right;">ADD</button>
                    <table class="reportTable" width="100%" id="searchTable">
                        <tr class="header" >
                            <td>#</td>
                            <td>Topic</td>
                            <td>Method</td>
                            <td>Date</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <?php
                        include("./health_promotion.php");
                        $obj = new health_promotion();
                        if (!$obj->retrieveAll_promotion()) {
                            echo "error";
                            exit();
                        }

                        $row = $obj->fetch();
                        $row_counter = 1;
//            -------------------to get cho name-----------------------
//            $health_promo_obj2->get_cho_by_promo($row['idhealth_promotion']);
//            $cho_name = $health_promo_obj2->fetch();
//
//            -------------------to get cho name-----------------------
                        while ($row) {
                            if ($row_counter % 2 == 0) {
                                $style = " class='row1' ";
                            } else {
                                $style = " class='row2' ";
                            }
                            $id = $row['idhealth_promotion'];
                            echo "<tr $style >";
//                            echo "<td>$id</td>";
                            echo "<td>$row_counter</td>";
                            echo "<td><a href='health_promotion_detail.php?id=$id'>$row[topic]</a></td>";
                            echo "<td>$row[method]</td>";
                            echo "<td>$row[date]</td>";
                            echo "<td><span class='hotspot' onclick='edit(this,$id)'>edit<span></td>";
                            echo "<td><span class='hotspot2' onclick='del(this,$id)'>del<span></td>";
                            echo "</tr>";
                            $row = $obj->fetch();
                            $row_counter++;
                        }
                        ?>
                    </table>
                </td>
            </tr>
        </table>

        <div id="divEdit" class="popupForm">
            <table class="tableForm" >
                <tr>
                    <td class="label">Topic: </td>
                    <td class="field"><input type="text" value="" id="topic" ></td>
                    <td class="label">Method:</td> 
                    <td class="field"><input type="text" value="" id="method" ></td>
                </tr>
                <tr>
                    <td class="label">Venue :</td>
                    <td class="field"><input type="text" value="" id="venue" ></td>
                    <td class="label">Date :</td>
                    <td class="field"><input type="date" value="" id="date" ></td>
                </tr>
                <tr>
                    <td class="label">Target Audience :</td>
                    <td class="field"><input type="text" value="" id="target_audience" ></td>
                    <td class="label">Number Of Audience :</td>
                    <td class="field"><input type="number" value="" id="number_of_audience" ></td>
                </tr>
                <tr>
                    <td class="label">Remarks :</td>
                    <td class="field"><textarea type="textarea" value="" id="remarks" ></textarea></td>
                    <td class="label">Month :</td>
                    <td class="field">
                        <!--<input type="" value="" id="month" >-->
                        <select id="month" name="inputMONTH" <?php
//                if (isset($_REQUEST['inputMONTH'])) {
//                    $selection = $_REQUEST['inputMONTH'];
//                }
                        ?>>
                            <option value="january" <?php
                            // if ($selection == 'january') {
//                            print "selected='selected'";
//                        } 
                            ?>>January</option>
                            <option value="february"<?php
                            // if ($selection == 'february') {
//                            print "selected='selected'";
//                        } 
                            ?>>February</option>
                            <option value="march"<?php
                            // if ($selection == 'march') {
//                            print "selected='selected'";
//                        } 
                            ?>>March</option>
                            <option value="april"<?php
                            // if ($selection == 'april') {
//                            print "selected='selected'";
//                        } 
                            ?>>April</option>
                            <option value="may"<?php
                            // if ($selection == 'may') {
//                            print "selected='selected'";
//                        } 
                            ?>>May</option>
                            <option value="june"<?php
                            // if ($selection == 'june') {
//                            print "selected='selected'";
//                        } 
                            ?>>June</option>
                            <option value="july"<?php
                            // if ($selection == 'july') {
//                            print "selected='selected'";
//                        } 
                            ?>>July</option>
                            <option value="august"<?php
                            // if ($selection == 'august') {
//                            print "selected='selected'";
//                        } 
                            ?>>August</option>
                            <option value="september"<?php
                            // if ($selection == 'september') {
//                            print "selected='selected'";
//                        } 
                            ?>>September</option>
                            <option value="october"<?php
                            // if ($selection == 'october') {
//                            print "selected='selected'";
//                        } 
                            ?>>October</option>
                            <option value="november"<?php
                            // if ($selection == 'november') {
//                            print "selected='selected'";
//                        } 
                            ?>>November</option>
                            <option value="december"<?php
                            // if ($selection == 'december') {
//                            print "selected='selected'";
//                        } 
                            ?>>December</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="label">Latitude :</td>
                    <td class="field"><input type="number" value="" id="latitude" ></td>
                    <td class="label">Longitude :</td>
                    <td class="field"><input type="number" value="" id="longitude" ></td>
                </tr>
                <tr>
                    <td class="label">IDCHO :</td>
                    <td class="field">
                        <select id="idcho" name="inputIDCHO" <?php
//                                                            if (isset($_REQUEST['inputIDCHO'])) {
//                                                                print "value=" . "'" . $_REQUEST['inputIDCHO'] . "'";
//                                                            }
//                                                            
                        ?>>
                            <option>Select a CHO</option>
                            <?php
                            $health_promo2 = new health_promotion();              //  the constructor should be the name of the class
                            $health_promo2->retrieveAll_idcho();
                            $cho = $health_promo2->fetch();
                            while ($cho) {
                                echo "<option value =" . $cho["idcho"] . ">" . $cho["cho_name"] . "</option> ";
                                $cho = $health_promo2->fetch();
                            }
                            ?>
                        </select>
                    </td>
                    <td class="label">Subdistrict :</td>
                    <td class="field"><select id="subdistrict" name="inputSUBDISTRICT_ID" <?php ?>>
                            <option>Select a Sub District</option>
                            <?php
                            $health = new health_promotion();
                            $subdistricts = null;
                            if (!$health->retrieveAll_subdistricts()) {
                                print "error: class err: " . mysql_error();
                            } else {
                                $subdistricts = $health->fetch();
                            }

                            while ($subdistricts) {
                                echo "<option value = " . $subdistricts["subdistrict_id"] . ">" . $subdistricts["subdistrict_name"] . "</option> ";
                                $subdistricts = $health->fetch();
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td class="label">Image :</td>
                    <td class="field"><input type="text" value="" id="image" ></td>
                    <td class="label"></td>
                    <td class="label"></td
                </tr>
                <tr>
                    <td class="label"></td>
                    <td class="field"><input type="button" value="save" onclick="save()" ></td>
                    <td class="label"></td>
                    <td class="field"><input type="button" value="cancel" onclick="cancel()" ></td>
                </tr>
            </table>
        </div>

        <div id="divDel" class="popupForm">
            <table class="tableForm" >
                <tr>
                    <td>Are you sure you want to delete?</td>
                </tr>
                <tr>
                    <td class="field"><input type="button" value="YES" onclick="rem()" ></td>
                    <td class="field"><input type="button" value="NO" onclick="cancel()" ></td>
                </tr>
            </table>
        </div>

    </body>
</html>	