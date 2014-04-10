<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Health Promotion</title>

        <!-- Core CSS - Include with every page -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Dashboard -->
        <link href="./css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
        <link href="./css/plugins/timeline/timeline.css" rel="stylesheet">

        <!-- SB Admin CSS - Include with every page -->
        <link href="./css/sb-admin.css" rel="stylesheet">

        <!-- Page-Level Plugin CSS - Tables -->
        <link href="./css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<title>View Answers</title>
<div id = header>
<?php
	include './questions.php';
	include './answers.php';

	if(isset($_GET["qid"])){
		$qid = $_GET["qid"];
		$question_obj = new questions();
		$question_obj->get_question($qid);
		$question = $question_obj->fetch();
 		echo "QUESTION: ".$question["question"];
	}
?>

</div>
</head>

<body>
	<div>
    	
    </div>
</body>
</html>