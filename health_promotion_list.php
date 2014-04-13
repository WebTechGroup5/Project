<html>
    <head>

        <title>Health Promotion List</title>
        <link rel="stylesheet" href="style.css">
        <script src="jquery-1.11.0.js"></script>
        <script src="gen.js"></script>
        <script>
            var gloabalVar;
            var spanVarPar;
            
            var voo;
            var removeId;
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
                $("#month").prop("value", r.promotion.month);                            //   alert("alert"+r.promotion.month);
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

                gloabalVar = id;
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

                var id = gloabalVar;

                var u = "health_promotion_action.php?cmd=4&idhp=" + id + "&date=" + vdat + "&ven=" + vven + "&top=" + vtop
                        + "&meth=" + vmeth + "&tar=" + vtar + "&num_aud=" + vnum + "&month=" + vmon + "&lat=" + vlat + "&lon=" + vlon
                        + "&img=" + vim + "&sub_id=" + vsub + "&idcho=" + vidc + "&rmks=" + vrem;

                r = syncAjax(u);

                //change things in the span
                var nameCol = $(spanVarPar).children("td").get(1);
                $(nameCol).text("");
                $(nameCol).append("<a href=#>" + vtop + "</a>");

                $(nameCol).css({'color': 'blue'});
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
                
                gloabalVar = id;
                
                spanVarPar = $(obj).closest("tr");
            }
            
            function rem(){
                spanVarPar.remove();

                var u = "health_promotion_action.php?cmd=3&idhp=" + gloabalVar;
                r = syncAjax(u);
                cancel();
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
                    <div class="menuitem">health promotion</div>
                    <div class="menuitem">nutrition</div>
                    <div class="menuitem">child welfare</div>
                    <div class="menuitem">family planning</div>
                </td>
                <td id="content">
                    <div id="divPageMenu">
                        <span class="menuitem" >sub districts</span>
                        <span class="menuitem" >communities</span>
                        <span class="menuitem" >view map</span>
                        <input type="text" id="txtSearch">
                        <span class="menuitem">search</span>		
                    </div>
                    <div id="divStatus" class="status">
                        status message
                    </div>

                    Health Promotions
                    <table class="reportTable" width="100%" >
                        <tr class="header" >
                            <td>ID</td>
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
                        $row_counter = 0;
                        while ($row) {

                            if ($row_counter % 2 == 0) {
                                $style = " class='row1' ";
                            } else {
                                $style = " class='row2' ";
                            }
                            $id = $row['idhealth_promotion'];
                            echo "<tr $style >";
                            echo "<td>$id</td>";
                            echo "<td><a href='health_promotion_detail.php?id=$id'>$row[topic]</a></td>";
                            echo "<td>$row[method]</td>";
                            echo "<td>$row[date]</td>";
                            echo "<td><span class='hotspot' onclick='edit(this,$id)'>edit<span></td>";
                            echo "<td><span class='hotspot' onclick='del(this,$id)'>del<span></td>";
                            echo "</tr>";
                            $row = $obj->fetch();
                            $row_counter++;
                        }
                        ?>
                    </table>
                    </div>
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
                    <td class="field"><input type="text" value="" id="date" ></td>
                </tr>
                <tr>
                    <td class="label">Target Audience :</td>
                    <td class="field"><input type="text" value="" id="target_audience" ></td>
                    <td class="label">Number Of Audience :</td>
                    <td class="field"><input type="text" value="" id="number_of_audience" ></td>
                </tr>
                <tr>
                    <td class="label">Remarks :</td>
                    <td class="field"><input type="text" value="" id="remarks" ></td>
                    <td class="label">Month :</td>
                    <td class="field"><input type="text" value="" id="month" ></td>
                </tr>
                <tr>
                    <td class="label">Latitude :</td>
                    <td class="field"><input type="text" value="" id="latitude" ></td>
                    <td class="label">Longitude :</td>
                    <td class="field"><input type="text" value="" id="longitude" ></td>
                </tr>
                <tr>
                    <td class="label">IDCHO :</td>
                    <td class="field"><input type="text" value="" id="idcho" ></td>
                    <td class="label">Subdistrict :</td>
                    <td class="field"><input type="text" value="" id="subdistrict" ></td>
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