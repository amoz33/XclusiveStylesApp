

<div class="container">

	<!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h3 class="h3 mb-0 text-gray-800">Image Upload</h3>
        </div>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Upload Hairstyles Images</h1>
                            </div>
                            <?php

                               echo $report;

				               $formArray = array('class'=>'user', 'id'=>'', 'role'=>'form', 'method'=>'post');
				               echo form_open_multipart('Image/upload_hairstyles', $formArray) ;?>

                            	<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select name="category_id" class="form-control " required="required">
	                                		<option value="">SELECT HAIR CATEGORY</option>
                                			<?php 
                                			if ($hairCategory) {
                                				foreach ($hairCategory as $value) {

                            					$categoryID = $value['id'];
                            					$categoryName = $value['category_name']; ?>
                            					<option value="<?php echo $categoryID; ?>"><?php echo strtoupper($categoryName); ?></option>
                                					
                                			<?php }//END foreach ($hairCategory as $value) {
                                				
                                			}//END if ($hairCategory) {?>
                                		</select>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- <input type="file" class="form-control" name="userfile[]" multiple="multiple" size="20" accept=".png, .jpg, .jpeg" required="required"> -->
                                        <input type="file" class="form-control" name="userfile" size="20" accept=".png, .jpg, .jpeg" required="required">
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" name="uploadImage" class="btn btn-primary btn-user btn-md" role="button" value="Upload Image" />
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Hairstyles Images</h1>
                    <p class="mb-4">Below are the list of the Hairstyles that have been uploaded.</p>

                    
                    <div class="row">

                        <div class="col-lg-12">
                        	<?php //echo $report; ?>
                        	<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Uploaded Hairstyles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        	<th>S/N</th>
                                            <th>Hairstyles</th>
			                                <th>Date Uploaded</th>
			                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            		<?php
                            			if($hairstyles_images){

                            			$imageURL = $this->config->item('hairstyles_upload_url');
                            			$table_name = 'hair_category';
                            			$i=0;
                            			foreach ($hairstyles_images as $result) {
                            				//var_dump($result);
                            				$i+=1;
                            				$recordID = $result['id'];
                            				$categoryID = $result['category_id'];
											$getCategoryName = $this->manage_category->getCategoryName($table_name,array('id'=>$categoryID));
											//var_dump($getCategoryName);
                            				$category_name = $getCategoryName['category_name'];
                            				$imageUrl = $result['image_url'];
                            				$uploadDate = $result['date_upload'];
                            			
                            		?>
                                        <tr>
                                            <td ><?php echo $i;?></td>
                                			<td><?php echo ucfirst($category_name).' Hairstyle'; ?></td>
                                			<td><?php echo $uploadDate; ?></td>
                                			<td class="center">
				                                <a href="<?php echo base_url($imageURL).'/'.$imageUrl; ?>" target="_blank"><button class="btn btn-primary"><i class="fa fa-eye"></i> View Image</button></a>

				                               <a href="<?php echo base_url('Image/deleteImageUrl').'?id='.$recordID; ?>" onclick="return confirm('Are you sure you want to delete this Image?');"><button class="btn btn-danger" name="del"><i class="fa fa-trash"></i> Delete</button>

				                                </a>
				                            </td>
                                        </tr>

                                    <?php    }//END foreach ($hairstyles_category as $value) {

                                    	}//END if($hairstyles_category){ ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->