<!-- header section -->
<?php require 'winclude/header.php'; ?>
<style type="text/css">
    table tr img{
        width:50%!important;
        height: auto;
    }
    table tr td p span,
    table tr th p span{
        font-size:14px!important;
    }
    table tr span img{
        width:10%!important;
        height: auto;
    }
</style>
<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
    <?php
    $examid = '';
    $exam_name = '';
    if(isset($_GET['eid'])){
        include '../database/config.php';
        $examid = mysqli_real_escape_string($conn, $_GET['eid']);
        $sql = "SELECT * FROM tbl_examinations WHERE exam_id = '$examid'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $exam_name =$row['exam_name'];
            }
        } else {
            header("location:./");
        }
    }
    else{
        echo "<script>window.location.href='index.php';</script>";
    }
    ?>
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
                <h3>Add Questions- <?= $exam_name ?></h3>
            </div>
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6" style="border-right:1px solid #ddd;">
                                        <form method="post" id="filter-form">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="hidden" name="eid" value="<?= $examid ?>">
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
                                                <div class="col-md-5">
                                                    <select class="form-control" name="subtags" id="subtags">
                                                        <option value="NULL" selected>-Select Sub Category-</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="submit" class="btn btn-primary" id="filter-btn"><i class="fa fa-filter"></i> Filter</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="" style="border-top:1px solid black;padding-top:30px;margin-top:30px;">
                                            <span>Total Questions: <span class="badge badge-danger qcount">0</span></span>
                                            <table class="display table table-stripped" id="" style="width: 100%;table-layout:fixed;word-wrap: break-all;" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th width="8%">Q NO.</th>
                                                        <th width="84%">Question</th>
                                                        <th>Add</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="ques-sec">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <h3 class="text-center">NEW QUESTION SET
                                                <span class="pull-right"><button id="clearall" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Clear All</button></span>
                                            </h3>
                                        </div>
                                        <div class="" style="border-top:1px solid black;padding-top:30px;margin-top:17px;">
                                            <?php
                                            include '../database/config.php';
                                            $counter = 0;
                                            $output='';
                                            $query = "SELECT * FROM tbl_questions tq LEFT JOIN tbl_question_set tqs ON tq.question_id=tqs.questionid WHERE tq.exam_id='$examid' OR tqs.examid='$examid'";
                                            $res = $conn->query($query);
                                            $count = $res->num_rows;
                                            ?>
                                            <span>Total Question:<span id="qset-count" class="badge badge-danger"><?= $count; ?></span></span>
                                            <table class="display table table-stripped" id="example3" style="width: 100%;" cellspacing="0" cellpadding="0">
                                                <thead>
                                                    <tr>
                                                        <th width="8%">Q NO.</th>
                                                        <th width="84%">Question</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   
                                                    if ($res->num_rows > 0) {
                                                    while($row = $res->fetch_assoc()) {
                                                        $counter +=1;
                                                        $id = $row['question_id'];
                                                        $output .= '<tr id="tr-'.$id.'" >
                                                            <th>Q'. $counter .' #</th>
                                                            <th>'. $row['question'] .'
                                                                <br><br>
                                                                <p>
                                                                    <span>(A) '. $row['option1'] .'</span>
                                                                    <span style="padding-left:10px;">(B) '. $row['option2'] .'</span>
                                                                    <br>
                                                                    <span>(C) '. $row['option3'] .'</span>
                                                                    <span style="padding-left:10px;">(D) '. $row['option4'].'</span>
                                                                    <br>
                                                                    <span class="text-danger">(Ans) '. $row['answer'] .'</span>
                                                                </p>
                                                            </th>';
                                                        
                                                            $output .='<th><a  id="d'.$id.'" onclick="delQues(this)" class="btn btn-danger"><i class="fa fa-close"></i></a></th>
                                                            </tr>';

                                                        }
                                                        echo $output;
                                                    }
                                                    ?>

                                                </tbody>
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
    </main>
    <?php if ($ms == "1") { ?>
        <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php } ?>
        <script>
            CKEDITOR.replace( 'content', {
                height: 200,
                filebrowserUploadUrl: "upload_question_image.php"
            });
        </script>
        <!-- footer section -->
        <?php require 'winclude/footer.php'; ?>
        <!-- for active sidebar menu -->
        <script type="text/javascript">
            $(document).ready(function(){
                $(".side_menu").removeClass("active");
                $("#questionA").addClass("active");
            });
    //  var table = $('#example').DataTable();
    // $('#tags').on('change', function(){
    //    table.search(this.value).draw();
    // });
    // $('#subtags').on('change', function(){
    //    table.search(this.value).draw();
    // });
    var ts = $('#example3').DataTable();
    function addQues(e){
        var ids = $(e).attr('id');
        var qno='', ques='';
        var examid = '<?= $examid ?>';
        $("#tr-"+ids).each(function(i, e){
            var eds = $(this).find('th');
            qno = eds.eq(0).text();
            ques = eds.eq(1).html();
        });
        $.ajax({
            url:"add_question_set.php",
            method:"post",
            data:{id:ids,examid:examid},
            beforeSend:function(){
                $(e).attr("disabled",true);
                $(e).html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success:function(data){
                var obj = JSON.parse(data);
                if(obj.status==true){
                    ts.row.add(
                        [ "Ques#",
                        ques,
                        `<a  id="d${ids}" onclick="delQues(this)" class="btn btn-danger"><i class="fa fa-close"></i></a>`
                        ]).node().id = "se"+ids ;
                    ts.draw(true);
                }else{
                    alert(obj.msg);
                }
                $(e).attr("disabled",false);
                $(e).html("<i class='fa fa-plus'></i>");
                $(e).removeClass('btn-success');
                $(e).addClass('btn-warning');
                var count = countQues(examid);
                $("#qset-count").html(count);
            }
        });
    }
    function delQues(e){
        var id = $(e).attr('id');
        id = id.substr(1,);
        var examid = '<?= $examid ?>';
        $.ajax({
            url:"del_question_fromset.php",
            method:"post",
            data:{id:id,examid:examid},
            beforeSend:function(){
                $(e).attr("disabled",true);
                $(e).html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success:function(data){
                var obj = JSON.parse(data);
                if(obj.status==true){
                    ts.row($(e).parents('tr') ).remove().draw();
                }else{
                    alert("Question Not deleted. Please try again");
                }
                $(e).attr("disabled",false);
                $(e).html("<i class='fa fa-close'></i>");
                var count = countQues(examid);
                $("#qset-count").html(count);
                if(obj.status==true && obj.check==true){
                    $("#"+id).removeClass("btn-warning");
                    $("#"+id).addClass("btn-success");
                }
            }
        });
    }
    $("#clearall").click(function(){
        var examid = '<?= $examid ?>';
        var conf = confirm("Are you sure to delete all questions?");
        if(conf){
            $.ajax({
                url:"clearall_ques.php",
                method:"post",
                data:{examid:examid},
                success:function(data){
                    var count = countQues(examid);
                    $("#qset-count").html(count);
                    var table = $('#example3').DataTable();
                    table.clear().draw();
                }
            });
        }
    });
    function countQues(examid){
        var count = 0;
        $.ajax({
            async:false,
            url:"ques_count_fromset.php",
            method:"post",
            data:{examid:examid},
            success:function(data){
                var obj = JSON.parse(data);
                count = obj.count;
            }
        });
        return count;
    }
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
    $("#filter-form").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"fetch_question.php",
            method:"post",
            data:$(this).serialize(),
            beforeSend:function(){
                $("#filter-btn").html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success:function(data){
                var obj = JSON.parse(data);
                $(".qcount").html(obj.count);
                $("#ques-sec").html(obj.ques);
                $("#filter-btn").html("<i class='fa fa-filter'>Filter</i>");
            }
        });
    })
</script>