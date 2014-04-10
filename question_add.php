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
<title>Add Question</title>

<?php
	include './questions.php';
	include './categories.php';
	$questions_obj = new questions();
		$categories_obj = new categories();
	
?>
</head>


<?php
	$idcho = 1;
	if ((isset($_GET["question"]))&&(isset($_GET["category"]))){
		
		$question = $_GET["question"];
		$category = $categories_obj->getid_categories($_GET["category"]);
		
		if($question != ""&&$category != ""){
			$questions_obj->add_question($category, $idcho, $question);
		
		//Status Bar Update
		}
			
	}


?>



<body>
<?php

	$categories_obj->getall_categories();
	$rows_categories = $categories_obj->fetch();
	//print_r($rows_categories);
	
	
	//GEt the idcho
	if(isset($_GET["idcho"]))
		
?>

   <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            SUBMIT QUESTION HERE:
	<form>
    	CHO ID:
    	<select name = idcho disabled = true>
        </select>
        <br>
    	CATEGORY:
    	<select name = category>
        	<?php
				while($rows_categories){
					echo "<option>".$rows_categories["name"]."</option>";
					$rows_categories = $categories_obj->fetch();
				}
			
			?>
        
        </select><br>
        Question:
        <textarea name = question rows = 5 cols = 100></textarea><br>
        
        <button type=submit name=submit>Add</button>
        
    </form>
    </div>
    </div>
    </div>
    </div>
    
    
</body>
</html>