<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Health Promotion</title>

        <!-- Core CSS - Include with every page -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Dashboard -->
        <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
        <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

        <!-- SB Admin CSS - Include with every page -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Tables -->
        <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <?php
        include './health_promotion.php';
        
        // ----------------------------------- if there's a request to delete, delete first
        if(isset($_REQUEST['idhealth_promotion'])){
            
            $promo_delete_obj = new health_promotion();
            $promo_delete_obj->delete_promotion($_REQUEST['idhealth_promotion']);
//            print_r($_REQUEST);
        }
        ?>

    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="welcome.php"><?php session_start();
        print $_SESSION['username']; ?></a>
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
                            <a href="#"><i class="fa fa-table fa-fw"></i>Summaries<span class="fa arrow"></span></a>
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
                        <h1 class="page-header">View Health Promotions</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Health Promotion Table
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <?php
                                    $health_promo_obj = new health_promotion();

                                    if (!$health_promo_obj->retrieveAll_promotion()) {
                                        print "error: " . mysql_error($obj->link);
                                        exit();
                                    }

                                    $row = $health_promo_obj->fetch();
//        ----------------------------------- create cho object ---------------
//        $health_promo_obj->get_cho_by_promo($row['idhealth_promotion']);
//        $cho_name = $health_promo_obj->fetch();
//        --------------------------------------------- that won't work so screate another healpromo object neither does pointing to the previous object

                                    $health_promo_obj2 = new health_promotion();
//        $health_promo_obj2->get_cho_by_promo($row['idhealth_promotion']);
//        $cho_name = $health_promo_obj2->fetch();
                                    
                                    $health_promo_obj3 = new health_promotion();
                                    ?>

                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr >
                                                <th>Topic</th>
                                                <th>Venue</th>
                                                <th>Date</th>
                                                <th>CHO</th>
                                                <th>Sub District</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row) {
                                                $health_promo_obj2->get_cho_by_promo($row['idhealth_promotion']);
                                                $cho_name = $health_promo_obj2->fetch();
                                                $health_promo_obj3->get_subd_by_promo($row['idhealth_promotion']);
                                                $subdistrict = $health_promo_obj3->fetch();
//                                              onclick="location.href='dfadf'"
                                                print "<tr onclick=\"location.href='health_promotion_profile.php?idhealth_promotion=" .$row['idhealth_promotion']."'\"><td>";
                                                print $row["topic"];
                                                print "</td><td>";
                                                print $row['venue'];
                                                print "</td><td>";
                                                print $row["date"];
                                                print "</td><td>";
                                                print $cho_name['cho_name'];
                                                print "</td><td>";
//             print_r($cho_name);
                                                print $subdistrict['subdistrict_name'];
//                                                print_r($subdistrict);
                                                print "</td></tr>";
                                                $row = $health_promo_obj->fetch();
                                            }
                                            ?>    
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                <!--                            <div class="well">
                                                                <h4>DataTables Usage Information</h4>
                                                                <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                                                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                                                            </div>-->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Hover Rows
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Context Classes
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="success">
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr class="info">
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr class="warning">
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                            <tr class="danger">
                                                <td>4</td>
                                                <td>John</td>
                                                <td>Smith</td>
                                                <td>@jsmith</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
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

        <!-- Page-Level Plugin Scripts - Tables -->
        <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

        <!-- SB Admin Scripts - Include with every page -->
        <script src="js/sb-admin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

    </body>

</html>
