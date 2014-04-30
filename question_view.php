<html>
    <head>


        <link rel="stylesheet" href="style.css">
        <script src="jquery-1.11.0.js"></script>
        <script src="gen.js"></script>

        <script>
            var question_id;

            function syncAjax(u) {
                var obj = $.ajax(
                        {url: u,
                            async: false
                        }
                );
                return $.parseJSON(obj.responseText);

            }


            /*
             * Method to refresh the list of questions
             */
            function refreshTable() {
                var u = "question_action.php?cmd=3";
                var r = syncAjax(u);

                if (r.result == 0) {
                    showMsg(r.message);
                }
                else
                {

                    $("#mainbody").empty();


                    var row_counter = 1;


                    for (var i = 0; i < r.question.length; i++) {
                        var ctid = r.question[i].question_id;


                        if (row_counter % 2 == 0) {
                            var style = " class='row1' ";
                        } else {
                            var style = " class='row2' ";
                        }
                        row_counter++;
                        $("#mainbody").append("<tr" + style + "><td>" + r.question[i].question_id + "</td><td>" + r.question[i].question + "</td><td>" + countAns(ctid) + "</td><td><span onclick = 'showAnswers(" + ctid + ")'><button>  VIEW ANSWERS  </button></span></td><td><span onclick = 'answerAQuestion(" + ctid + ")'><button >  ANSWER  </button></span></td></tr>");

                    }
                    showMsg("Showing Results of Search:" + row_counter);
                }



            }

            function popUp() {

                $("#divAdd").fadeIn(500);

            }

            function countAns(id) {
                var u = "question_action.php?cmd=6&qid=" + id;
                var r = syncAjax(u);


                if (r.result == 1) {
                    return r.count;
                }

                alert(r.count);

            }

            function searchQ() {
                $("#mainbody").empty();
                var d = document.getElementById("txtSearch").value;
                var u = "question_action.php?cmd=5&text=" + d;
                var r = syncAjax(u);

                if (r.result == 0) {
                    showMsg(r.message);
                }
                else
                {

                    $("#mainbody").empty();


                    var row_counter = 1;


                    for (var i = 0; i < r.question.length; i++) {
                        var ctid = r.question[i].question_id;


                        if (row_counter % 2 == 0) {
                            var style = " class='row1' ";
                        } else {
                            var style = " class='row2' ";
                        }
                        row_counter++;
                        $("#mainbody").append("<tr" + style + "><td>" + r.question[i].question_id + "</td><td>" + r.question[i].question + "</td><td>" + countAns(ctid) + "</td><td><span onclick = 'showAnswers(" + ctid + ")'><button>  VIEW ANSWERS  </button></span></td><td><span onclick = 'answerAQuestion(" + ctid + ")'><button >  ANSWER  </button></span></td></tr>");

                    }
                    showMsg("Showing Results of Search:" + row_counter);
                }


            }


            function answerAQuestion($id) {
                //find where the user clicked and store it in x and y
                var y = event.clientY;
                var x = event.clientX;
                //use x and y to set the location of the form
                $("#divAddAnswer").css("top", y);
                $("#divAddAnswer").css("left", x);

                $("#question_3").text(getQuestion($id));
                $("#divAddAnswer").fadeIn(500);

                question_id = $id;
                refreshTable();
            }

            function getQuestion(qid) {
                u = "question_action.php?cmd=1&id=" + qid;
                var r = syncAjax(u);
                showMsg(r.promotion.question);
                if (r.result == 1) {
                    return r.promotion.question;
                }
                return "Question not found..";
            }

            function saveAddQuestion() {
                var cat = document.getElementById("question_category").value;
                var qu = document.getElementById("question").value;
                var idcho = document.getElementById("idcho").value;
                var u = "question_action.php?cmd=4&cid=" + cat + "&question=" + qu + "&idcho=" + idcho + "";


                var r = syncAjax(u);


                if (r.result == 1) {
                    closeAddQuestion();
                    showMsg(r.message);

                }
                else {
                    showMsg(r.message);

                }
                refreshTable();
            }


            function saveAnswer($id) {
                var idcho = document.getElementById("idcho").value;
                var sid = document.getElementById("sid").value;
                var qid = question_id;
                var answer = document.getElementById("answerArea").value;

                var u = "answer_action.php?cmd=4&id=" + qid + "&answer=" + answer;
                showMsg(u);

                closeAnswer();


                var q = syncAjax(u);

                showMsg(q.message);
                refreshTable();


            }




            function showAnswers(qid) {
                //Get answers from db

                //Get question from db
                $("#question_2").text(getQuestion(qid));

                //Get answers from db
                var u = "answer_action.php?cmd=5&id=" + qid;
                var r = syncAjax(u);

                //Putting answers in display
                $("#answerlist").empty();
                for (var i = 0; i < r.answers.length; i++) {
                    $("#answerlist").append("<li>" + r.answers[i].answer + " </li>");
                }


                //find where the user clicked and store it in x and y
                var y = event.clientY;
                var x = event.clientX;
                //use x and y to set the location of the form
                $("#divShowAnswers").css("top", y);
                $("#divShowAnswers").css("left", x);

                //Show form
                $("#divShowAnswers").fadeIn(500);


            }


            function closeAddQuestion() {
                $("#divAdd").fadeOut(1000);
                showMsg("Cancelled");
            }

            function closeAnswer() {
                $("#divAddAnswer").fadeOut(1000);
                showMsg("Answer Pop up Cancelled");

            }

            function closeAnswers() {
                $("#divShowAnswers").fadeOut(1000);
                showMsg("Answer Pop up Cancelled");

            }

            function showMsg(msg) {
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
                    <a href="health_promotion_list.php"><div class="menuitem">health promotion</div></a>
                    <div class="menuitem">nutrition</div>
                    <div class="menuitem">child welfare</div>
                    <div class="menuitem">family planning</div>
                </td>
                <td id="content">
                    <div id="divPageMenu">
                        <span class="menuitem" onclick = popUp()>ask question?</span>
                        <span class="menuitem" >communities</span>
                        <span class="menuitem" >view map</span>
                        <input type="text" id="txtSearch">
                        <span class="menuitem" onclick = "searchQ()">search</span>		
                    </div>
                    <div id="divStatus" class="status">
                        status message
                    </div>

                    <div id="divPageMenuSub">
                        <a href="question_view.php"><span class="menuitem" >questions & answers</span></a>

                        <a><span class="menuitem" onclick = "refreshTable()">show all</span></a>
                    </div>

                    <span style="font-weight: bold; font-size: large">Questions</span>

                    <?php
                    include './questions.php';
                    include './categories.php';
                    include './answers.php';
                    $ans = new answers();
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
                                    while ($rows_categories) {
                                        $cid = $rows_categories["cid"];
                                        echo "<option>" . $rows_categories["name"] . "</option>";
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
                                <input type="button" value="save" onClick="saveAddQuestion()" >
                                <input type="button" value="cancel" onClick="closeAddQuestion()" >
                            </td>
                        </tr>
                    </table>

                </div>



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
                                    while ($rows_categories) {
                                        $cid = $rows_categories["cid"];
                                        echo "<option>" . $rows_categories["name"] . "</option>";
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
                                <input type="button" value="save" onClick="saveAddQuestion()" >
                                <input type="button" value="cancel" onClick="closeAddQuestion()" >
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
                                <ul id = answerlist>
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


                <div id="divAddAnswer" class="popupForm">
                    <table class="tableForm" >
                        <tr>
                            <td class = "label">Question: </td>
                            <td id = "question_3">None</td>
                        </tr>
                        <tr>
                            <td class = "label">Answer:</td>
                            <td id = "answer">
                                <textarea cols = 35 rows = 5 id = "answerArea"></textarea>
                            </td>
                        </tr>
                        <tr>
                        <input type = "hidden" value = 0 id = "question_id">
                        </tr>
                        <tr>
                        <input type = "hidden" value = 1 id = "idcho">
                        </tr>
                        <tr>
                        <input type = "hidden" value = "null" id = "sid">
                        </tr>
                        <tr>
                            <td><input type = "button" value = "Close" onClick="closeAnswer()"> </td>
                        </tr>
                        <tr>
                            <td><input type = "button" value = "Save" onClick="saveAnswer()"> </td>
                        </tr>
                    </table>

                </div>


                <table class="reportTable">
                    <thead>
                        <tr class = header>


                            <th>Question Number</th>
                            <th>Question</th>
                            <th>No. of Answers</th>


                        </tr>
                    </thead>

                    <?php
                    echo "<tbody id = 'mainbody'>";

                    $row_counter = 1;
                    while ($row) {

                        if ($row_counter % 2 == 0) {
                            $style = " class='row1' ";
                        } else {
                            $style = " class='row2' ";
                        }
                        $row_counter++;
                        $id = $row["qid"];
                        $count = $questions_obj2->count_answers($id);
                        echo "<tr $style>";
                        echo "<td>" . $row["qid"] . "</td>";
                        echo "<td>" . $row["question"] . "</td>";
                        echo "<td>" . $count . "</td>";
                        echo "<td><span onclick = showAnswers($id)><button>  VIEW ANSWERS  </button></span></td>";

                        echo "<td><span onclick = answerAQuestion($id)><button>  ANSWER  </button></span></td>";
                        echo "</tr>";
                        $row = $questions_obj->fetch();
                    }



                    echo "</tbody>";
                    ?>
            </body>
</html>