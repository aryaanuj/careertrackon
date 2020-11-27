<?php
date_default_timezone_set('Asia/Kolkata');
include 'includes/check_user.php';
include 'includes/check_reply.php';
include '../includes/uniques.php';
// variables declare
$date = date('y-m-d');
$sDate = "";
$Time = "";
$examid = "";
$subject="";
$exam_name ="";
$reexam = "";
if (isset($_SESSION['current_examid'])) {
    include '../database/config.php';
    $exam_id = $_SESSION['current_examid'];
    $retake_status = $_SESSION['student_retake'];
// if ($retake_status == "1") {
// $sql = "DELETE FROM tbl_assessment_records WHERE student_id = '$myid' AND exam_id = '$exam_id'";
// if ($conn->query($sql) === TRUE) {
// } else {
// }
// }
//get Minutes
    function Minutes($time) {
        $timeArr = explode(':', $time);
        $decTime = round(($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60));
        return $decTime;
    }
//fetching exam
    $query2 = mysqli_query($conn, "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id' AND category = '$mycategory' AND status = 'Active'")or die(mysql_error());
    if ($query2->num_rows > 0) {
        while($row2 = mysqli_fetch_array($query2)){
            $exam_name =$row2['exam_name'];
            $sDate = $row2['date'];
            $startTime = Minutes($row2['duration']);
            $endTime = Minutes($row2['end_duration']);
            $currentTime= Minutes(date("H:i:s"));
            $Time = ($endTime-$currentTime);
            $examid = $row2['exam_id'];
            $subject = $row2['subject'];
            $reexam = $row2['re_exam'];
            if($Time<0)
            {
                header("location:./take-assessment.php?id=$exam_id");
            }
        }
    } else{ header("location:./"); }
} else{ header("location:./"); }
// check student already given exam or not. if student already given exam then redirect it previous page else entry in assessment records.
// $sql = "SELECT * FROM tbl_assessment_records WHERE student_id = '$myid' ";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         header("location:./take-assessment.php?id=$exam_id");
//     }
// } else {
//     $myname = "$myfname $mylname";
//     $recid = 'RS'.get_rand_numbers(14).'';
//     $sql = "INSERT INTO tbl_assessment_records (record_id, student_id, student_name, exam_name, exam_id, score, status, next_retake, date)
//     VALUES ('$recid', '$myid', '$myname', '$exam_name', '$exam_id', '0', 'FAIL', '$reexam', '$date')";
//     if (mysqli_query($conn, $sql)) {
//     } else {
//     }
// }
//fetch questions
$query = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id' ORDER BY serialno ASC";
$res = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="../img/tls_logo.png" rel="icon" type="image"> -->
    <title>E-Cell System</title>
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/custom10.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.default.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <style type="text/css">
        @font-face{font-family: kruti;src:url("css/fonts/k010.ttf");}
        html{ background-color: #ffffff !important;}
        body{top: 0px !important;}
        .logo-img{
            width:100px;
            height: auto;
            position:relative;
            bottom:10px;
        }
        #full-screen-btn{
            background-color: white;
        }
    </style>
</head>
<body id="full-screen" >
    <div id="all">
        <header class="main-header notranslate" style="padding:0px;margin:0px;">
            <div class="navbar navbar-light yamm" role="navigation" id="navbar"  data-spy="affix" data-offset-top="200" style="border-bottom:1px solid gray; padding-top:20px;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand">
                        <img src="../assets/images/logo1.png" class="img-fluid logo-img"></a>
                        <button onclick="openFullscreen(this)" id="full-screen-btn">Full Screen</button>
                        <div id="google_translate_element" class="pull-right"></div>
                        <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'en', 
                                includedLanguages: 'hi,en', 
                                autoDisplay: false,
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                                
                            }, 'google_translate_element');
                            var a = document.querySelector("#google_translate_element select");
                            a.selectedIndex=1;
                            a.dispatchEvent(new Event('change'));
                        }
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    </div>
                    <div class="col-md-5 pull-right">
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav pull-right user-profile">
                                <li class="user-name pull-left" style="padding-right:20px;">
                                    <?php 
                                      if ($myavatar == NULL) {
                                        print'<img class="img-circle avatar"  width="30" height="30" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
                                      }else{
                                        echo '<img width="40" height="40" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle avatar"  alt="'.$myfname.'"/>'; 
                                      }
                                      echo "$myfname $mylname"; 
                                      ?>
                                                        
                                <li class="timer-div" style="border-left:1px solid lightgray;">
                                    <div class="col-md-12">
                                        <p><i class="fa fa-hourglass-end"></i> &nbsp;TIME LEFT:
                                            <span class="timer-title time-started">00:00:00</span>
                                        </p>
                                    </div>
                                </li>
                                <li><button style="display:none;" class="btn btn-success btn-block submit-res-btn btn-submit-all-answers">Submit</button></li>
                            </ul>
                            <input type="hidden" id="hdfTestDuration" value="<?php echo $Time; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="clear"></div>
        <div id="content">
            <div class="container-fluid">
                <div class="row exam-paper">
                    <div class="col-md-9" id="quest" style="padding:0px;">
                        <table style="width: 100%" id="questionPanel">
                            <tr>
                                <td>
                                    <div class="panel panel-default ">
                                        <div class="panel-body mb0">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <?php
                                                    $counter=0;
                                                    while($row = mysqli_fetch_array($res))
                                                    {
                                                        $counter+=1;
                                                        ?>
                                                        <div style="display:none;" class="tab-content div-question mb0" id="page0<?php echo $counter; ?>">
                                                            <input type="hidden" class="subj" value="<?php echo $subject; ?>">
                                                            <input type="hidden" class="stuid" value="<?php echo $myid; ?>">
                                                            <input type="hidden" class="examid" value="<?php echo $examid; ?>">
                                                            <input type="hidden" class="exam_desc" value="<?php echo $exam_name; ?>">
                                                            <input type="hidden" class="sdate" value="<?php echo $sDate; ?>">
                                                            <input type="hidden" value="1" class="hdfQuestionID">
                                                            <input type="hidden" value="1" class="hdfPaperSetID">
                                                            <input type="hidden" value='<?php echo $row['answer']; ?>' class="hdfCurrectAns">
                                                            <div class="question-height">
                                                                <h4 class="question-title"> Question <?php echo $counter; ?>:  <p class="badge bg-info"><?= ucfirst($row['tags']); ?></p></h4>
                                                                <span id="ques-txt"><?php
                                                                $pos = strpos($row['question'],'src="');
                                                                if($pos==false)
                                                                {
                                                                    echo $row['question'];
                                                                }
                                                                else
                                                                {
                                                                    echo $question = str_replace('src="upload', 'src="../admin/upload', $row['question']);
                                                                }
                                                                ?></span>
<div class="col-md-12 mb0 options-txt" style=" padding-top:20px;">
 <!-- option A -->                                                                   
<div class="" style="padding:5px;">
<input type="radio" value='<?php echo $row['option1'] ?>' name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"><span> <b class="notranslate">(A)</b>&nbsp;&nbsp;<?php echo $row['option1']; ?></span><br>
</div>
<!-- option B -->
<div class="" style="padding:5px;">  <input type="radio" value='<?php echo $row['option2'];?>' name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"><span> <b class="notranslate">(B)</b>&nbsp;&nbsp; <?php
echo $row['option2'];
?></span><br></div>
<!-- option c -->
<div class="" style="padding:5px;">  <input type="radio" value='<?php echo $row['option3'] ?>' name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"><span> <b class="notranslate">(C)</b>&nbsp;&nbsp; <?php
echo $row['option3'];
?></span><br></div>
<!-- option d -->
<div class="" style="padding:5px;">  <input type="radio" value='<?php echo $row['option4'] ?>' name="radiospage0<?php echo $counter; ?>" id="rOption<?php echo $counter; ?>_1"><span> <b class="notranslate">(D)</b>&nbsp;&nbsp; <?php
echo $row['option4'];
?></span><br></div>
</div>
</div>
</div>
<?php } ?>
<div class="clearfix"></div>
<div class="row action_button notranslate">
    <div class="col-md-3">
        <button class="mb5 full-width btn btn-warning btn-block btn-save-mark-answer" style="background-color:#FEA223!important;">Save &amp; Mark For Review</button>
    </div>
    <div class="col-md-3">
        <button class="mb5 full-width btn btn-default btn-block btn-reset-answer">Clear Response</button>
    </div>
    <div class="col-md-3">
        <button class="mb5 full-width btn btn-primary btn-block btn-mark-answer" style="background-color:blue !important;">Mark For Review &amp; Next</button>
    </div>
    <div class="col-md-3">
        <button class="mb5 full-width btn btn-success btn-block btn-save-answer" style="background-color:#43d001 !important;">Save &amp; Next</button>
    </div>
</div>
<br>
</div>
</div>
<div class="panel-footer notranslate">
    <div class="row">
        <a href="javascript:void(0);" class="btn btn-default pull-left" id="btnPrevQue">
            << Back </a>&nbsp;&nbsp; <a href="javascript:void(0);" class="btn btn-default pull-left" id="btnNextQue">Next >></a>&nbsp;&nbsp; </div>
        </div>
    </div>
</td>
</tr>
</table>
</div>
<div class="col-md-3 notranslate" id="pallette" style="border:1px solid lightgray;border-top:none;font-size:12px;">
    <div class="panel panel-default mb0">
        <div class="panel-body" style="padding:0px;margin-top:20px;">
            <table class="table table-borderless mb0">
                <tr>
                    <td class="full-width"> <a class="test-ques-stats que-not-attempted lblNotVisited">0</a> Not Visited </td>
                    <td class="full-width"> <a class="test-ques-stats que-not-answered lblNotAttempted">0</a> Not Answered </td>
                </tr>
                <tr>
                    <td class="full-width"> <a class="test-ques-stats que-save lblTotalSaved">0</a> Answered </td>
                    <td class="full-width"> <a class="test-ques-stats que-mark lblTotalMarkForReview">0</a> Marked for Review </td>
                </tr>
                <tr>
                    <td colspan="2"><a class="test-ques-stats que-save-mark lblTotalSaveMarkForReview">0</a> Answered &amp; Marked for Review</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="panel panel-default notranslate" style="border-top:1px solid lightgray; position:relative;bottom:30px;padding-top:5px;">
        <div class="panel-header"><h5>QUESTION PALLETE</h5></div>
        <div class="panel-body" style="height:40vh;overflow-y:auto;padding:0px;">
            <ul class="pagination test-questions">
                <?php $count=0;
                $sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
                $result = mysqli_query($conn, $sql);
                while($r = mysqli_fetch_array($result)){
                    $count+=1;
                    $zero = "";
                    if($count<=9){$zero=0;}
                    if($count==1)
                        {?>
                            <li class="active" data-seq="1"><a class="test-ques que-not-answered" href="javascript:void(0);" data-href="page0<?php echo $count; ?>"><?php echo $zero.$count; ?></a></li>
                        <?php }
                        else
                            {?>
                                <li data-seq="1"><a class="test-ques que-not-attempted" href="javascript:void(0);" data-href="page0<?php echo $count; ?>"><?php echo $zero.$count; ?></a></li>
                            <?php }?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-success btn-block btn-submit-all-answers">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 exam-summery notranslate" style="display:none;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center">Exam Summary</h3>
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Section Name</th>
                                <th>No of Questions</th>
                                <th>Answered</th>
                                <th>Not Answered</th>
                                <th>Marked for Review</th>
                                <th>Answered & Marked for Review(will be considered for evaluation)</th>
                                <th>Not Visited</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">Paper 1</td>
                                <td class="lblTotalQuestion"></td>
                                <td class="lblTotalSaved"></td>
                                <td class="lblNotAttempted"></td>
                                <td class="lblTotalMarkForReview"></td>
                                <td class="lblTotalSaveMarkForReview"></td>
                                <td class="lblNotVisited"></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />
                    <div class="col-md-12 text-center">
                        <h4> Are you sure you want to submit for final marking?<br />No changes will be allowed after submission. <br /> </h4>
                        <a class="btn btn-default btn-lg" id="btnYesSubmit">Yes</a> <a class="btn btn-default btn-lg" id="btnNoSubmit">No</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 exam-confirm notranslate" style="display:none;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 text-center">
                        <h4> Thank You, your responses will be submitted for final marking - click OK to complete final submission. <br /> </h4>
                        <a class="btn btn-default  btn-lg" id="btnYesSubmitConfirm">Ok</a> <a class="btn btn-default  btn-lg" id="btnNoSubmitConfirm">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 exam-thankyou notranslate" style="display:none;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 text-center">
                        <h4> Thank you, Submitted Successfully.</h4>
                        <a class="btn btn-default btn-lg" id="btnViewResult">View Result</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 exam-result" style="display:none;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 text-center">
                        <h3 class="notranslate">
                            RESULT
                        </h3>
                        <h4 class="bg-primary notranslate" style="padding:10px;">Score: <strong id="lblRScore"></strong></h4>
                        <table class="table table-bordered notranslate">
                            <tbody>
                                <tr>
                                    <td>Total Question</td>
                                    <th id="lblRTotalQuestion"></th>
                                    <td>Total Attempted</td>
                                    <th id="lblRTotalAttempted"></th>
                                </tr>
                                <tr>
                                    <td>Correct Answers</td>
                                    <th id="lblRTotalCorrect"></th>
                                    <td>Incorrect Answers</td>
                                    <th id="lblRTotalWrong"></th>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead class="notranslate">
                                <tr>
                                    <th>Question No.</th>
                                    <th>selected Option</th>
                                    <th>Status</th>
                                    <th>Correct Option</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyResult" ></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/JsScript.js"></script>
<script>
    $('.full_screen').click(function() {
    //alert('ff');
    $('#quest').removeClass('col-md-8');
    $('#quest').addClass('col-md-12');
    //pallette
    $('#pallette').addClass('hidden');
    $('.full_screen').addClass('hidden');
    $('.collapse_screen').removeClass('hidden');
    });
    $('.collapse_screen').click(function() {
    $('#quest').removeClass('col-md-12');
    $('#quest').addClass('col-md-8');
    //pallette
    $('#pallette').removeClass('hidden');
    $('.full_screen').removeClass('hidden');
    $('.collapse_screen').addClass('hidden');
    });
    var elem = document.getElementById("full-screen");
    function openFullscreen(val) {
        if(val.innerHTML == "Full Screen"){
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
                val.innerHTML = "Exit Fullscreen";
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
                val.innerHTML = "Exit Fullscreen";
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
                val.innerHTML = "Exit Fullscreen";
            }
        }else{
            if (document.exitFullscreen) {
                document.exitFullscreen();
                val.innerHTML = "Full Screen";
            } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
                val.innerHTML = "Full Screen";
            } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
                val.innerHTML = "Full Screen";
            }
        }
    }
</script>
</body>
</html>