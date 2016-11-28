<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner </title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>Upload Photo For Flat </h4><hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
			<form class="form-inline" method="POST" enctype="multipart/form-data">

					Select Flat:
					<select  name="selectedFlat"  class="form-control" >
						<option value="" >----Please Select Flat----</option>
						{myFlat}
						
						<option value='{fid}' >{flat_name}</option>
						{/myFlat}
					</select><br><br>

					
					<input type="file" name="userfile" value="" /><br><br>

					<input type="submit" name="uploadImages" value="Upload Images" class="btn btn-success">
					  
			</form>

			<?php if (isset($_SESSION['upload_message'])) { echo "<div class='alert alert-success'><strong>		".$_SESSION['upload_message']."</strong></div>";}?>

				<h5 style="color:red;"><?php echo validation_errors(); ?></h5>

				<hr>
				<h3>Your Uploaded Images</h3>
				 <table class="table table-bordered ">
				<?php
					foreach($allFlat as $row){
						if($row['image_name']==''){

						}else{ ?>
							
								<tr>
								<td>

								<img src="<?php echo base_url();?>public/uploads/<?php echo $row['image_name'];?>" width="400" height="300"/>

								</td>
								<td><?php echo $row['flat_name'];?></td>
								<td>
									<a href="<?php echo base_url();?>owner/deleteImages/<?php echo $row['image_name'];?>" onclick="return confirm('Are you sure to Delete it?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span>Delete</a>
								</td>
								</tr>
							
							
						<?php }
					}
				?>
				</table>
				
			

			</div>

			

		</div>

			
		</center>
	</div>

</body>
</html>