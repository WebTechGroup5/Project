<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Health Promotion</title>
        
        <!--my javaScript check-->
        <script href="myJavaScript/h_p_add.js"></script>


        <!-- Core CSS - Include with every page -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Forms -->

        <!-- SB Admin CSS - Include with every page -->
        <link href="css/sb-admin.css" rel="stylesheet">
        <?php
        include './health_promotion.php';
        ?>
        
        <script>
        function topicTextBox(){
            var input = document.getElementById("topictxtB").value;
            return input;
        }
        
        function showStatustopicTextBox(msg){
                var objDivStatus = document.getElementById("topictxtB");
                objDivStatus.innerHTML=msg;
            }
    
    function checkTextBox(topicTextBox()){
               if((topicTextBox()) == ""))
               {
                   showStatustopicTextBox("This is a required field");
               }
               else{
                   showStatustopicTextBox("");
               }
               
            }
            
            
            
        </script>
    </head>

    <body>

        <!--<div id="wrapper">-->

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="welcome.php"><?php session_start(); print $_SESSION['username']; ?></a>
            </div>
            <!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <!--<li class="dropdown">-->
                    
                    
<!--                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>-->
<!--                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>-->
<li style="margin-top: 7px">
<button  type='button' class="btn btn-primary" onclick="location.href='index.php'">Log Out</button>
                        </li>
<!--                    </ul>
                     /.dropdown-user 
                </li>-->
                <!-- /.dropdown -->
            </ul>
            
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="welcome.php"><i class="fa fa-dashboard fa-fw"></i>Home Page</a>
                    </li>
                    <li>
                        <a href="health_promotion_add.php"><i class="fa fa-edit fa-fw"></i> Add New Health Promo</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Summaries<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="health_promotion_view.php">View Health Promotions</a>
                            </li>
                            <li>
                                <a href="cho_view.php">View Chief Health Officers</a>
                            </li>
                            <li>
                                <a href="subdistricts_view.php">View Sub Districts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="morris.html">Morris.js Charts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add New Health Promotion</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="health_promotion_add.php" method="GET">
                                            <input type="hidden" name="inputID" 
                                                <?php
                                            if (isset($_REQUEST['inputID'])) {
                                                print "value=" . "'" . $_REQUEST['inputID'] . "'";
                                            }
                                            ?>>
                                            <div class="form-group">
                                                <label>Topic<div id='topictxtBDiv'></div><label>
                                                <input class="form-control" placeholder="Topic" name="inputTOPIC" id='topictxtB'
                                                    <?php
//                                                if (isset($_REQUEST['inputTOPIC'])) {
//                                                    print "value=" . "'" . $_REQUEST['inputTOPIC'] . "'";
//                                                }
                                                ?>>
                                            </div>
                                            <div class="form-group">
                                                <label>Venue</label>
                                                <input class="form-control" placeholder="Venue" name="inputVENUE" 
                                                    <?php
//                                                if (isset($_REQUEST['inputVENUE'])) {
//                                                    print "value=" . "'" . $_REQUEST['inputVENUE'] . "'";
//                                                }
                                                ?>>
                                            </div>
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input class="form-control" type="date" name="inputDATE" 
                                                    <?php
//                                                if (isset($_REQUEST['inputDATE'])) {
//                                                    print "value=" . "'" . $_REQUEST['inputDATE'] . "'";
//                                                }
                                                ?>>
                                            </div>

                                            <div class="form-group">
                                                <label>Method</label>
                                                <input class="form-control" placeholder="Method" name="inputMETHOD"
                                                    <?php
//                                                if (isset($_REQUEST['inputMETHOD'])) {
//                                                    print "value=" . "'" . $_REQUEST['inputMETHOD'] . "'";
//                                                }
                                                ?>>
                                            </div>
                                            <div class="form-group">
                                                <table style="width: 100%; " cellspacing="10" cellpadding="10">
                                                    <tr>
                                                        <td style="padding: 0 10px 0 0">
                                                            <div class="form-group">
                                                                <label>Target Audience</label>
                                                                <input class="form-control" placeholder="Ashesi Community" name="inputTARGET_AUD" 
                                                                    <?php
//                                                                if (isset($_REQUEST['inputTARGET_AUD'])) {
//                                                                    print "value=" . "'" . $_REQUEST['inputTARGET_AUD'] . "'";
//                                                                }
                                                                ?>>
                                                            </div>
                                                        </td>
                                                        <td style="padding: 0 0 0 10px">
                                                            <div class="form-group">
                                                                <label>Number of Audience</label>
                                                                <input class="form-control" placeholder="600"  name="inputNO_AUD" <?php
//                                                                if (isset($_REQUEST['inputNO_AUD'])) {
//                                                                    print "value=" . "'" . $_REQUEST['inputNO_AUD'] . "'";
//                                                                }
                                                                ?>>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>

                                            <!--</form>-->
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <!--<form role="form"  action="health_promotion_add.php" method="GET">-->

                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" placeholder="Helpful?"  name="inputREMARKS"><?php
//                                                if (isset($_REQUEST['inputREMARKS'])) {
//                                                    print $_REQUEST['inputREMARKS'];
//                                                }
                                                ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Month</label>
                                            <select class="form-control" name="inputMONTH" <?php
                                            if (isset($_REQUEST['inputMONTH'])) {
                                                $selection = $_REQUEST['inputMONTH'];
//                                                print "value=" . "'" . $_REQUEST['inputMONTH'] . "'";
                                            }
                                            ?>>
                                                <option value="january" <?php if($selection == 'january'){print "selected='selected'";} ?>>January</option>
                                                <option value="february"<?php if($selection == 'february'){print "selected='selected'";} ?>>February</option>
                                                <option value="march"<?php if($selection == 'march'){print "selected='selected'";} ?>>March</option>
                                                <option value="april"<?php if($selection == 'april'){print "selected='selected'";} ?>>April</option>
                                                <option value="may"<?php if($selection == 'may'){print "selected='selected'";} ?>>May</option>
                                                <option value="june"<?php if($selection == 'june'){print "selected='selected'";} ?>>June</option>
                                                <option value="july"<?php if($selection == 'july'){print "selected='selected'";} ?>>July</option>
                                                <option value="august"<?php if($selection == 'august'){print "selected='selected'";} ?>>August</option>
                                                <option value="september"<?php if($selection == 'september'){print "selected='selected'";} ?>>September</option>
                                                <option value="october"<?php if($selection == 'october'){print "selected='selected'";} ?>>October</option>
                                                <option value="november"<?php if($selection == 'november'){print "selected='selected'";} ?>>November</option>
                                                <option value="december"<?php if($selection == 'december'){print "selected='selected'";} ?>>December</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <table style="width: 100%; " cellspacing="10" cellpadding="10">
                                                <tr>
                                                    <td style="padding: 0 10px 0 0">
                                                        <div class="form-group">
                                                            <label>Longitude</label>
                                                            <input class="form-control" placeholder="3234443" name="inputLATITUDE" <?php
                                                            if (isset($_REQUEST['inputLATITUDE'])) {
                                                                print "value=" . "'" . $_REQUEST['inputLATITUDE'] . "'";
                                                            }
                                                            ?>>
                                                        </div>
                                                    </td>
                                                    <td style="padding: 0 0 0 10px">
                                                        <div class="form-group">
                                                            <label>Latitude</label>
                                                            <input class="form-control" placeholder="255445" name="inputLONGITUDE" <?php
                                                            if (isset($_REQUEST['inputLONGITUDE'])) {
                                                                print "value=" . "'" . $_REQUEST['inputLONGITUDE'] . "'";
                                                            }
                                                            ?>>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>

                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" placeholder="localhost/images/help_or_naa.gif" name="filePATH" <?php
                                            if (isset($_REQUEST['filePATH'])) {
                                                print "value=" . "'" . $_REQUEST['filePATH'] . "'";
                                            }
                                            ?>>
                                            <input class="form-control" placeholder="localhost/images/help_or_naa.gif" name="inputIMAGE" <?php
                                            if (isset($_REQUEST['filePATH'])) {
                                                print "value=" . "'" . $_REQUEST['filePATH'] . "'";
                                            } else if (isset($_REQUEST['inputIMAGE'])) {
                                                print "value=" . "'" . $_REQUEST['inputIMAGE'] . "'";
                                            }
                                            ?>>
                                        </div>
                                        <div class="form-group">
                                            <table style="width: 100%; " cellspacing="10" cellpadding="10">
                                                <tr>
                                                    <td style="padding: 0 10px 0 0">

                                                        <div class="form-group">
                                                            <label>IDCHO</label>

                                                            <select class="form-control" placeholder="None" name="inputIDCHO" <?php
                                                            if (isset($_REQUEST['inputIDCHO'])) {
                                                                print "value=" . "'" . $_REQUEST['inputIDCHO'] . "'";
                                                            }
                                                            ?>>
                                                                <option>Select a CHO</option>
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
                                                        </div>
                                                    </td>
                                                    <td style="padding: 0 0 0 10px">

                                                        <div class="form-group">
                                                            <label>SubDistrict</label>
                                                            <select class="form-control" placeholder="None" name="inputSUBDISTRICT_ID" <?php
                                                            if (isset($_REQUEST['inputSUBDISTRICT_ID'])) {
                                                                print "value=" . "'" . $_REQUEST['inputSUBDISTRICT_ID'] . "'";
                                                            }
                                                            ?>>
                                                                <option>Select a Sub District</option>
                                                                <?php
                                                                $subdistricts = null;
                                                                if (!$cho->retrieveAll_subdistricts()) {
                                                                    print "error: class err: " . mysql_error();
                                                                } else {
                                                                    $subdistricts = $cho->fetch();
                                                                }

                                                                while ($subdistricts) {
                                                                    echo "<option value = " . $subdistricts["subdistrict_id"] . ">" . $subdistricts["subdistrict_name"] . "</option> ";
//                                                                    echo "<option value = "  . ">" . $subdistricts["subdistrict_id"] . "</option> ";
                                                                    $subdistricts = $cho->fetch();
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <button type="submit" class="btn btn-default" name="submit" value="Submit" onclick="checkTextBox()">Submit</button>
                                        <!--<button type="reset" class="btn btn-default">Reset</button>-->
                                        <button type="button" class="btn btn-default" onclick="location.href='health_promotion_view.php';">View</button>
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) 
                                </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            <!-- Core Scripts - Include with every page -->
            <script src="js/jquery-1.10.2.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

            <!-- Page-Level Plugin Scripts - Forms -->

            <!-- SB Admin Scripts - Include with every page -->
            <script src="js/sb-admin.js"></script>

            <!-- Page-Level Demo Scripts - Forms - Use for reference -->


            <?php
//            print "sdf";
// create a form that allows the user to input data
//            print $_REQUEST['filePATH'];
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
                $image = $_REQUEST['filePATH'];
//                $image = $_REQUEST["inputIMAGE"];
                $idcho = $_REQUEST["inputIDCHO"];
                $subdistrict_id = $_REQUEST["inputSUBDISTRICT_ID"];

                if ($_GET["inputDATE"] != "" && $_GET["inputVENUE"] != "" && $_GET["inputTOPIC"] != "" && $_GET["inputMETHOD"] &&
                        $_GET["inputTARGET_AUD"] != "" && $_GET["inputNO_AUD"] != "" && $_GET["inputMONTH"] != "" && $_GET["inputIDCHO"] &&
                        $_GET["inputSUBDISTRICT_ID"] != "") {
                    $prom = new health_promotion();

                    //function update_promotion($idhealth_promotion, )
                   $a = ($prom->add_promotion($date, $venue, $topic, $method, $target_audience, $number_of_audience, $remarks, $month, $latitude, $longitude, $image, $idcho, $subdistrict_id));

//                    header($string, $replace);
//                    header("location:health_promotion_view");
                } elseif (isset($_GET["submit"])) {

                    echo "<div><header>ERROR: PLEASE FILL IN ALL FIELDS</header></div>";
                }
            }
            
            
//            if (mysql_query($sql,$con)) {
//
//    header ("location:/done.php");
//    require_once('done.php');
//    exit();
//    }
//    else {
//echo "Something is wrong";
//}
            ?>

    </body>

</html>
