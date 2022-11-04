


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hairstyles Category</h1>
                    </div>

                    
                    <div class="row">

                        <div class="col-lg-12">
                        	<?php echo $report; ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Hair Category</h6>
                                </div>
                                <div class="card-body">
                                	<?php
						               $formArray = array('class'=>'', 'id'=>'', 'role'=>'form', 'method'=>'post');
						               echo form_open('Category/edit_hair_category', $formArray) ;?>

						                <div class="form-row justify-content-md-center">
						                     <?php if($editCategory){
                                                    foreach($editCategory as $key=>$result){

                                                    $categoryID = $result['id'];
                                              ?> 
                                            <div class="form-group col-md-5">
                                                <h6>Category Name</h6>
                                                <input class="form-control" type="text" name="category" value="<?php echo $result['category_name'];?>" required />
                                            </div>

                                            <div class="form-group col-md-2">
                                                <h6>Status</h6>
                                                <?php if($result['status']==1) { ?>
                                                 <div class="form-check form-check-inline">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="1" checked="checked">Active
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="0">Inactive
                                                    </label>
                                                </div>
                                                <?php } else { ?>

                                                 <div class="form-check form-check-inline">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="0" checked="checked">Inactive
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label>
                                                        <input type="radio" name="status" id="status" value="1">Active
                                                    </label>
                                                </div>
                                                <?php }//END if($result['status']==1) { ?>
                                            </div>
                                            <?php }//END foreach($editCategory as $key=>$result){ ?>

                                        <hr>
                                            <div class="form-group col-md-5">
                                              <input type="hidden" name="category_id" value="<?php echo $categoryID; ?>">
                                              <button type="submit" value="update" name="update" class="btn btn-success">Update Category</button>
                                              <?php echo  anchor('Category/hair_category','Cancel',array('class'=>'btn btn-danger text-white'));?>
                                            </div>
						                </div>
                                    <?php    }//END if($editCategory){ ?>

						                <hr>
						            </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

