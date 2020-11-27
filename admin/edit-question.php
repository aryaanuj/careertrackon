<!-- header section -->
<?php require 'winclude/header.php'; ?>
<?php
include '../database/config.php';
if (isset($_GET['id'])) {
    $question_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tbl_questions WHERE question_id = '$question_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $type = $row['type'];
            $question = $row['question'];
            $opt1 = $row['option1'];
            $opt2 = $row['option2'];
            $opt3 = $row['option3'];
            $opt4 = $row['option4'];
            $ans = $row['answer'];
            $tags = $row['tags'];
            $subtags = $row['subtags'];
            $explanation = $row['explanation'];
            if($ans==$opt1)
            {
                $ans = "option1";
            }
            else if($ans==$opt2)
            {
                $ans = "option2";
            }
            else if($ans==$opt3)
            {
                $ans = "option3";
            }
            else if($ans==$opt4)
            {
                $ans = "option4";
            }

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
        <!-- main section -->
        <div class="page-inner">
            <div class="page-title">
                <h3>Edit Questions : <?php echo "$question_id"; ?></h3>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <?php
                                        print '
                                        <form action="pages/update_question.php?type=mc" method="POST">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Question</label>
                                        <textarea placeholder="Enter question" name="question" required autocomplete="off" id="content" class="form-control ckeditor" >'.$question.'</textarea>
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
                                        <textarea placeholder="Enter option 1" name="opt1"  autocomplete="off" id="option1" class="form-control options">'.$opt1.'</textarea>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><h3>Option 2</h3></label>
                                        <textarea type="text" class="options form-control" id="option2" placeholder="Enter option 2" name="opt2"  autocomplete="off">'.$opt2.'</textarea>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr class="bg-success">
                                        <td>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><h3>Option 3</h3></label>
                                        <textarea type="text" class="options form-control " placeholder="Enter option 3" name="opt3" id="option3"  autocomplete="off">
                                        '.$opt3.'</textarea>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><h3>Option 4</h3></label>
                                        <textarea type="text" class="options form-control" placeholder="Enter option 4" name="opt4" id="option4"  autocomplete="off">
                                        '.$opt4.'</textarea>
                                        </div>
                                        </td>
                                        </tr>
                                        <tr class="bg-danger">
                                        <td>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><h3>Question Category:</h3></label>
                                        <select class="form-control" name="tags"  id="tags">
                                        <option value="'.$tags.'">'.$tags.'</option>
                                        ';

                                        include '../database/config.php';
                                        $sql = "SELECT DISTINCT ques_category FROM question_category WHERE status=1 ORDER BY ques_category";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {

                                            while($row = $result->fetch_assoc()) {
                                                print '<option value="'.$row['ques_category'].'">'.ucfirst($row['ques_category']).'</option>';
                                            }
                                        }
                                        $conn->close();
                                        print '
                                        </select>
                                        </div>
                                        </td>
                                        <td>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><h3>Question Sub Category:</h3></label>
                                        <select class="form-control" name="subtags" id="subtags">
                                        <option value="'.$subtags.'">'.$subtags.'</option>

                                        </select>

                                        </div>
                                        </td>
                                        </tr>
                                        <tr class="bg-info">
                                        <td colspan="4">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><h3>Answer:</h3></label>
                                        <select class="form-control" name="answer">
                                        <option value="'.$ans.'">'.$ans.'</option>
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
                                        <textarea placeholder="Write Explanation" name="explanation" autocomplete="off" id="explanation" class="form-control ckeditor" >'.$explanation.'</textarea>
                                        </div>
                                        </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        <input type="hidden" name="type" value="MC">
                                        <input type="hidden" name="question_id" value="'.$question_id.'">

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>';



                                        ?>
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
        <!-- for active sidebar menu -->
        <script type="text/javascript">
            $(document).ready(function(){
                $(".side_menu").removeClass("active");
                $("#questionA").addClass("active");
            });
        </script>
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