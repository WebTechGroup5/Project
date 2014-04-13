<html>
    <head>
    
    
    <link rel="stylesheet" href="style.css">
    <script src="jquery-1.11.0.js"></script>
	<script src="gen.js"></script>
    
    <script>
    
    		function syncAjax(u){
				var obj=$.ajax(
					{url:u,
					 async:false
					 }
				);
				return $.parseJSON(obj.responseText);
				
			}
			
			function popUp(){
				
				$("#divAdd").fadeIn(500);
				
			}
            
            function getQuestion(qid){
				u = "question_action.php?cmd=1&id="+qid;
				var r = syncAjax(u);
				showMsg(r.promotion.question);
				if(r.result==1){
            		return r.promotion.question;
				}
				return "Question not found..";
            }
            
            function saveAdd(){
            	var cat = document.getElementById("question_category").value; 
				var qu = document.getElementById("question").value;
				var idcho = document.getElementById("idcho").value;
            	var u = "question_action.php?cmd=4&cid="+cat +"&question=" + qu +"&idcho="+idcho+"";
				showMsg(u);
				
				var r = syncAjax(u);
				
				if(r.result==1){
					closeAdd();
					showMsg(r.message);
					
				}
				else{
					showMsg(r.message);
					
				}
			}
			
			function showAnswers(qid){
				//Get answers from db
				
				//Get question from db
				$("#question_2").text(getQuestion(qid));
				//Show form
				$("#divShowAnswers").fadeIn(500);
				
				
			}
				
			
			function closeAddQuestion(){
				$("#divAdd").fadeOut(1000);	
				showMsg("Cancelled");
			}
			
			function closeAnswers(){
				$("#divShowAnswers").fadeOut(1000);	
				showMsg("Answer Pop up Cancelled");
				
			}
			
			function showMsg(msg){
				$("#divStatus").text(msg);	
				
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
                        <span class="menuitem" onclick = popUp()>Ask Question</span>
                        <span class="menuitem" >communities</span>
                        <span class="menuitem" >view map</span>
                        <input type="text" id="txtSearch">
                        <span class="menuitem">search</span>		
                    </div>
                    <div id="divStatus" class="status">
                        status message
                    </div>
    
    <?php
			include './questions.php';
			include './categories.php';
			$categories_obj = new categories();
			$categories_obj->getall_categories();
			$rows_categories = $categories_obj->fetch();
			$questions_obj = new questions();
			$questions_obj2 = new questions();
			$questions_obj->get_all_questions();
			$row = $questions_obj->fetch();
			
			
			
       ?>

    </head>

<body>
	<div id="divAdd" class="popupForm">
		<table class="tableForm" >
        			<tr>
						
						<td class="field"><input type="hidden" value = "" id="question_id"  >
						</td>
					</tr>
        
					<tr>
						<td class="label">Category ID: </td>
						<td class="field">
                        CATEGORY:
    					<select name = category id="question_category">
        		<?php
					while($rows_categories){
						$cid = $rows_categories["cid"];
						echo "<option>".$rows_categories["name"]."</option>";
						$rows_categories = $categories_obj->fetch();
					}
			
				?>
        
       		 </select>
        	</td>
					</tr>
					<tr>
						<td class="label">Community Health Officer ID:</td> 
						<td class="field"><input type="number" value="" id="idcho" >
						</td>
					</tr>
					<tr>
						<td class="label">Question:</td>
						<td class="field"><textarea cols="20" rows="5" value="" id="question" ></textarea>
						</td>
					</tr
					><tr>
						<td class="label"></td>
						<td class="field">
							<input type="button" value="save" onClick="saveAdd()" >
							<input type="button" value="cancel" onClick="closeAdd()" >
						</td>
					</tr>
			</table>
				
	</div>
    
    
    
    <div id="divShowAnswers" class="popupForm">
		<table class="tableForm" >
        			<tr>
						<td class = "label">Question: </td>
                        <td id = "question_2">None</td>
					</tr>
                    <tr>
						<td class = "label">Answers:</td>
                        <td id = "count">
                        	<ul>
                        	<?php
                        		echo "<li>YOGURT</li>";
							?>
                        	</ul>
                        </td>
					</tr>
                    <tr>
						
					</tr>
                    <tr>
                    	<td><input type = "button" value = "Close" onClick="closeAnswers()"> </td>
                    </tr>
			</table>
				
	</div>


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
							while($row){
								$id = $row["qid"];
								$count = $questions_obj2->count_answers($id);
								echo "<tr>";
								echo "<td>".$row["qid"]."</td>";
								echo "<td>".$row["question"]."</td>";
								echo "<td>". $count."</td>";
								echo "<td><a onclick = showAnswers($id)>VIEW ANSWERS</a></td>";
								
								echo "<td><a href = ./answer_add.php?qid=".$row["qid"]." >ANSWER</a></td>";
								echo "</tr>";
								$row = $questions_obj->fetch();
							}
						?>
    	
        

</body>
</html>