<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php 
$exam_id = '';
if (isset($_GET['eid'])) {
    $message = isset($_GET['msg']) ? $_GET['msg'] : '';
    include '../database/config.php';
    $exam_id = mysqli_real_escape_string($conn, $_GET['eid']);	

    $sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$exam_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            $exam_name =$row['exam_name'];
        }
    } else {
        header("location:./");	
    }

}else{
    header("location:./");	
}
?>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
    <div class="overlay"></div>
    <!-- profile side menu -->
    <?php require 'winclude/nav-sidemenu.php'; ?>
    <main class="page-content content-wrap">
       <!-- navbar section -->
       <?php require 'winclude/navbar.php'; ?>

       <!-- sidebar section -->
       <?php require 'winclude/sidebar.php'; ?>
       <div class="page-inner">
        <?php if($message=='success'){ ?>
            <div class="alert alert-success bg-success alert-dismissible" role="alert" style="font-size:16px">
                <button type="button" class="close bg-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="fa fa-check"></i>  <?= $message; ?>
            </div>
        <?php } else if($message != ''){ ?>
            <div class="alert alert-danger bg-danger alert-dismissible" role="alert" style="font-size:16px">
                <i class="fa fa-close"></i>  <?= $message; ?>
                <button type="button" class="close bg-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <div class="page-title">
            <h3>Add Questions - <?php echo "$exam_name"; ?></h3>

        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body">
                                <div role="tabpanel">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Multiple Choice</a></li>
                                        <li class="pull-right"><a target="_blank" href="view-questions.php?eid=<?= $exam_id ?>" class="btn btn-danger">
                                        <span class="badge badge-success" style="font-weight:bold;">
                                            <?php $query = mysqli_query($conn, "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'");
                                            echo mysqli_num_rows($query)+1;
                                            ?>
                                        </span>  View Questions</a></li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                            <form action="pages/add_question.php?type=mc" method="POST">
                                                <div class="form-group bg-primary">
                                                    <label for="exampleInputEmail1" style="padding-left:10px;"><h3>Question</h3></label>

                                                    <!-- <input type="text" class="form-control" placeholder="Enter question" name="question" required autocomplete="off"> -->
                                                    <textarea placeholder="Enter question" name="question" required autocomplete="off" id="content" class="form-control ckeditor"></textarea>
                                                    <textarea type="text" name="qs" id="transcript2" placeholder="" class="form-control" disabled></textarea>
                                                    <button type="button" id="hindi" class="btn btn-info" onclick="hindi_toggle()" style="background-color: green;"><i class="fa fa-microphone"></i> Hindi</button>
                                                    <button type="button" id="english" class="btn btn-primary"  onclick="english_toggle()" style="background-color: blue" ><i class="fa fa-microphone"></i> English</button>
                                                </div>
                                                
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Option</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="bg-success">
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><h3>Option 1</h3></label>
                                                                    <textarea placeholder="Enter option 1" name="opt1"  autocomplete="off" id="option1" class="form-control options"></textarea>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><h3>Option 2</h3></label>
                                                                    <textarea type="text" class="options form-control" id="option2" placeholder="Enter option 2" name="opt2"  autocomplete="off"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-success">
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><h3>Option 3</h3></label>
                                                                    <textarea type="text" class="options form-control " placeholder="Enter option 3" name="opt3" id="option3"  autocomplete="off"></textarea>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><h3>Option 4</h3></label>
                                                                    <textarea type="text" class="options form-control" placeholder="Enter option 4" name="opt4" id="option4"  autocomplete="off"></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-danger">
                                                            <td>
                                                                <div class="form-group">
                                            <label for="exampleInputEmail1"><h3>Question Category:</h3></label>
                                            <select class="form-control" name="tags"  id="tags">
                                            <option value="" selected disabled>-Select Category-</option>
                                            <?php
                                            include '../database/config.php';
                                            $sql = "SELECT DISTINCT ques_category FROM question_category WHERE status=1 ORDER BY ques_category";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['ques_category'].'">'.ucfirst($row['ques_category']).'</option>';
                                            }
                                           } 
                                            $conn->close();
                                        ?> 
                                            </select>       
                                                                </div>
                                                            </td>
                                                            <td>
                                            <div class="form-group">
                                            <label for="exampleInputEmail1"><h3>Question Sub Category:</h3></label>
                                            <select class="form-control" name="subtags" id="subtags">
                                            <option value="NULL" selected>-Select Sub Category-</option>
                                            </select>
                                                                   
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-info">
                                                            <td colspan="4">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1"><h3>Answer:</h3></label>
                                                                    <select class="form-control" name="answer">
                                                                        <option value="option1">option1</option>
                                                                        <option value="option2">option2</option>
                                                                        <option value="option3">option3</option>
                                                                        <option value="option4">option4</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-warning">
                                                            <td colspan="2">
                                                            <div class="form-group">
                                                             <label for="exampleInputEmail1"><h3>Explanation:</h3></label>
                                                                <textarea placeholder="Write Explanation" name="explanation" autocomplete="off" id="explanation" class="form-control ckeditor"></textarea>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                                <input type="hidden" name="exam_id" value="<?php echo "$exam_id"; ?>">
                                                <button type="submit" class="btn btn-primary">Submit</button>



                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>  

                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
</main>
<?php if ($ms == "1") { ?> 
    <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php } ?>
    <!-- footer section -->
    <?php require 'winclude/footer.php'; ?>

    <!-- for active sidebar menu -->
    <script type="text/javascript" src="../assets/tinymce/tinymce.js"></script>
    <script>
        tinymce.init({
          selector: 'textarea#option1,textarea#option2,textarea#option3,textarea#option4',
          force_br_newlines : true,
          force_p_newlines : false,
          forced_root_block : '',
        });
         CKEDITOR.replace( 'content', {
            height: 200,
            filebrowserUploadUrl: "upload_question_image.php",
            toolbar: 'Full',
            enterMode : CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P
        });
          CKEDITOR.replace( 'explanation', {
            height: 200,
            filebrowserUploadUrl: "upload_question_image.php",
            toolbar: 'Full',
            enterMode : CKEDITOR.ENTER_BR,
            shiftEnterMode: CKEDITOR.ENTER_P
        });
    
    </script>
    <script>
        var recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;
        recognition.lang = "";

        var hindi_listening = false;
        var english_listening = false;

        function hindi_toggle(){
          recognition.lang = "hi-IN";
          if(hindi_listening) {
            recognition.stop();  
            hindi_listening = false;
            document.getElementById('hindi').style.backgroundColor = "green";
        }
        else{
            recognition.stop();
            setTimeout(function(){
                recognition.start();
            },500);
            english_listening = false;
            hindi_listening = true;
            document.getElementById('hindi').style.backgroundColor = "red";
            document.getElementById('english').style.backgroundColor = "blue";
        }
    }

    function english_toggle(){
      recognition.lang = "";
      if(english_listening) {
        recognition.stop();  
        english_listening = false;
        document.getElementById('english').style.backgroundColor = "blue";
    }
    else{
        recognition.stop();
        setTimeout(function(){
            recognition.start();
        },500);
        hindi_listening = false;
        english_listening = true;
        document.getElementById('english').style.backgroundColor = "red";
        document.getElementById('hindi').style.backgroundColor = "green";
    }
}
recognition.onresult = function(event) {
  var interim_transcript = '';
  var final_transcript = '';
  for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
        var cont =  CKEDITOR.instances.content.getData() + final_transcript;
        CKEDITOR.instances.content.setData(cont);
        document.getElementById('transcript2').value = final_transcript;
    } else {
        interim_transcript += event.results[i][0].transcript;
        document.getElementById('transcript2').value = interim_transcript;
    }
}
};


$("#tags").on('change', function(){
    var tags = $(this).val();
    $.ajax({
        url:'pages/fetch_qsubcat.php',
        method:'post',
        data:{tags:tags},
        success:function(data){
            $("#subtags").html(data);
        }
    });
});
</script>
