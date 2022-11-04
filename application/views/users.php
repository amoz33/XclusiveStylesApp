

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
                    <p class="mb-4">Below are the list of the Users created.</p>

                    
                    <div class="row">

                        <div class="col-lg-12">
                        	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>S/N</th>
                                            <th>Name</th>
			                                <th>Email</th>
			                                <th>Username</th>
			                                <th>Password</th>
			                                <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                            		<?php
                            			if($admin_users){

                            			$i=0;
                            			foreach ($admin_users as $result) {
                            				$i+=1;
                            				$adminID = $result['id'];
                            				$name = $result['name'];
                            				$email = $result['email'];
                            				$username = $result['username'];
                            				$password = $result['password'];
                            			
                            		?>
                                        <tr>
                                            <td ><?php echo $i;?></td>
                                			<td><?php echo $name; ?></td>
			                                <td><?php echo $email; ?></td>
                                			<td><?php echo $username; ?></td>
                                			<td><?php echo $password; ?></td>
                                			<!-- <td class="center">

				                                <a href="<?php echo base_url('Category/edit_admin_users').'?cat_id='.$categoryID; ?>" ><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button></a>

				                               <a href="<?php echo base_url('Category/deleteDressCategory').'?id='.$categoryID; ?>" onclick="return confirm('Are you sure you want to delete this Category?');"><button class="btn btn-danger" name="del"><i class="fa fa-trash"></i> Delete</button>

				                                </a>
				                            </td> -->
                                        </tr>

                                    <?php    }//END foreach ($admin_users as $value) {

                                    	}//END if($admin_users){ ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->



