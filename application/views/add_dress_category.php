


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dress Category</h1>
                    </div>

                    
                    <div class="row">

                        <div class="col-lg-12">
                        	<?php echo $report; ?>
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                                </div>
                                <div class="card-body">
                                	<?php
						               $formArray = array('class'=>'', 'id'=>'', 'role'=>'form', 'method'=>'post');
						               echo form_open('Category/dress_category', $formArray) ;?>

						                <div class="form-row justify-content-md-center">
						                    <div class="form-group col-md-5">
						                        <h6>Category Name</h6>
						                        <input class="form-control" type="text" name="category" autocomplete="off" placeholder="Enter Category Name" required />
						                    </div>

						                    <div class="form-group col-md-2">
						                        <h6>Status</h6>
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
						                    </div>

						                    <div class="form-group col-md-2">
						                        <input type="submit" name="create" class="form-control-plaintext btn btn-primary" role="button" value="Add Category" />
						                    </div>

						                </div>

						                <hr>
						            </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Dress Categories</h1>
                    <p class="mb-4">Below are the list of the Dress categories created.</p>

                    
                    <div class="row">

                        <div class="col-lg-12">
                        	<?php //echo $report; ?>
                        	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>S/N</th>
                                            <th>Category Name</th>
			                                <th>Status</th>
			                                <th>Creation Date</th>
			                                <th>Update Date</th>
			                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            		<?php
                            			if($dress_category){

                            			$i=0;
                            			foreach ($dress_category as $result) {
                            				$i+=1;
                            				$categoryID = $result['id'];
                            				$category_name = $result['category_name'];
                            				$status = $result['status'];
                            				$createDate = $result['CreationDate'];
                            				$updateDate = $result['UpdationDate'];
                            			
                            		?>
                                        <tr>
                                            <td ><?php echo $i;?></td>
                                			<td><?php echo $category_name; ?></td>
			                                <td><?php if($status==1) {?>
				                                <a href="#" class="btn btn-success btn-xs">Active</a>
				                                <?php } else {?>
				                                <a href="#" class="btn btn-danger btn-xs">Inactive</a>
				                                <?php } ?>
			                            	</td>
                                			<td><?php echo $createDate; ?></td>
                                			<td><?php echo $updateDate; ?></td>
                                			<td class="center">

				                                <a href="<?php echo base_url('Category/edit_dress_category').'?cat_id='.$categoryID; ?>" ><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button></a>

				                               <a href="<?php echo base_url('Category/deleteDressCategory').'?id='.$categoryID; ?>" onclick="return confirm('Are you sure you want to delete this Category?');"><button class="btn btn-danger" name="del"><i class="fa fa-trash"></i> Delete</button>

				                                </a>
				                            </td>
                                        </tr>

                                    <?php    }//END foreach ($dress_category as $value) {

                                    	}//END if($dress_category){ ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->



