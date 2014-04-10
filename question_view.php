<!DOCTYPE html ">
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
			include './questions.php';
			$questions_obj = new questions();
			$questions_obj2 = new questions();
			$questions_obj->get_all_questions();
			$row = $questions_obj->fetch();
			
			
			
        ?>

    </head>

<body>
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            
                        
                            <th>Question Number</th>
                            <th>Question</th>
                            <th>No. of Answers</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
							echo "<tr><td>";
							echo $row["qid"]."</td>";
							echo "<td>".$row["question"]."</td>";
							echo "<td>". $questions_obj2->count_answers($row["qid"])."</td>";
							echo "<td><a href = ./question_answers_view.php?qid=".$row["qid"].">VIEW ANSWERS</a></td>";
							echo "<td><a href = ./answer_add.php?qid=".$row["qid"].">ANSWER</a></td>";
							echo "</tr>";
						
						
						?>
    	
        

</body>
</html>