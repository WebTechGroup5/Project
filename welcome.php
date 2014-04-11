<html>
    <head>

        <title></title>
        <link rel="stylesheet" href="style.css">

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
                                    $style = " class='row2'  ";
                                }
                                $id = $row['idhealth_promotion'];
                                echo "<tr $style >";
                                echo "<td>$id</td>";
                                echo "<td><a href='health_promotion_detail.php?id=$id'>$row[topic]</a></td>";
                                echo "<td><a href='#'>$row[method]</a></td>";
//                                echo "<td><a href='#'>$row[venue]</a></td>";
                                echo "<td><a href='#'>$row[date]</a></td>";
                                echo "<td><span class='hotspot' onclick='edit(this,$id)'>edit<span></td>";
                                echo "<td><span class='hotspot' onclick='del(this,$id)'>delete<span></td>";
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
                </tr>
                <tr>
                    <td class="label">Method:</td> 
                    <td class="field"><input type="text" value="" id="method" >
                    </td>
                </tr>
                <tr>
                    <td class="label">Date :</td>
                    <td class="field"><input type="text" value="" id="date" >
                    </td>
                </tr>
                <tr>
                    <td class="label"></td>
                    <td class="field">
                        <input type="button" value="save" onclick="save()" >
                        <input type="button" value="cancel" onclick="cancel()" >
                    </td>
                </tr>
            </table

        </div>

    </body>
</html>	