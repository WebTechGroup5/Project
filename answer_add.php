<html>
<head>
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
<title>Add Answer</title>
</head>

<?php
	include './answers.php';
	$answer_obj = new answers();
	
//fish	
	
?>

<body>
	<form>
		
        Question ID
        <input name = qid disabled = true value = ""></input><br>
       
        Community Health Officer
        <input name = cho disabled = true value = ""></input><br>
        
        Specialist ID
        <input name = sid disabled = true value = ""></input><br>
        
        
        <textarea name = answer rows = 5 cols = 80>
        
        </textarea>
        <br>
        
        
        <button type = submit>Submit</button>
        
        
	</form>
</body>
</html>