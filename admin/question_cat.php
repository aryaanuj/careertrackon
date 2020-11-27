<!-- header section -->
<?php require 'winclude/header.php'; ?>
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
                <div class="page-title">
                    <h3>Manage Questions Category</h3>
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
			
                                                <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab">Categories</a></li>
                                                <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Add Category</a></li>
                                            </ul>
                                    
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                           <div class="table-responsive">
										   <?php
										   include '../database/config.php';
										   $sql = "SELECT * FROM question_category";
                                           $result = $conn->query($sql);

                                           if ($result->num_rows > 0) {
										print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
												<th>Category</th>
												<th>Sub Category</th>
                                                <th>Status</th>
                                                <th>Date Registered</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
												<th>Category</th>
												<th>Sub Category</th>
                                                <th>Status</th>
                                                <th>Date Registered</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';
     
                                           while($row = $result->fetch_assoc()) {
											   $status = $row['status'];
											   if ($status == 1) {
											   $st = '<p class="text-success">ACTIVE</p>';
											   $stl = '<a href="pages/make_questcat_in.php?id='.$row['id'].'">Make Inactive</a>';
											   }else{
											   $st = '<p class="text-danger">INACTIVE</p>'; 
                                               $stl = '<a href="pages/make_questcat_ac.php?id='.$row['id'].'">Make Active</a>';											   
											   }
                                          print '
										       <tr>
                                                <td>'.ucfirst($row['ques_category']).'</td>
												<td>'.ucfirst($row['ques_subcategory']).'</td>
                                                <td>'.$st.'</td>
												<td>'.$row['created_at'].'</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>'.$stl.'</li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['ques_category']; ?> ?')" <?php print ' href="pages/drop_questcat.php?id='.$row['id'].'">Drop Category</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                           }
										   
										   print '
									   </tbody>
                                       </table>  ';
                                            } else {
											print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';
    
                                           }
                                           $conn->close();
										   
										   ?>


                 

                                    </div>
                                                       
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab6">
                                         <form action="pages/add_quest_cat.php" method="POST">

										<div class="form-group">
                                            <div class="row">
                                            <div class="col-md-5">
                                            <label for="exampleInputEmail1">Select Category</label>
                                            <select class="form-control" name="qcat" >
											<option value="" selected disabled>-Select Category-</option>
											<?php
											include '../database/config.php';
											$sql = "SELECT DISTINCT ques_category FROM question_category  ORDER BY ques_category";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
    
                                            while($row = $result->fetch_assoc()) {
                                            print '<option value="'.$row['ques_category'].'">'.$row['ques_category'].'</option>';
                                            }
                                           } else {
                          
                                            }
                                             $conn->close();
											 ?>
											
											</select>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="exampleInputEmail1"></label>
                                            <h4 class="text-center form-group">OR</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Add New Category</label>
                                            <input type="text" name="new_qcat" placeholder="Add New Category" class="form-control">
                                        </div>
										</div>
										<div class="form-group">
                                            <label for="exampleInputEmail1">Sub Category</label>
                                            <input type="text" class="form-control" placeholder="Enter Sub Category" name="qsubcat"  autocomplete="off">
                                        </div>

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
<script type="text/javascript">
    $(document).ready(function(){
        $(".side_menu").removeClass("active");
        $("#subjectA").addClass("active");
    });
</script>