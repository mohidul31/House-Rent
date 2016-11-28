<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner </title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>List of Your All Home Owner </h4><hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('adminview/adminSideBarView');?>

			</div>
			<div class="col-sm-9" >
				<?php
						if (isset($_SESSION['success'])) {

							echo "
								<div class='alert alert-success'>
									<strong>".$_SESSION['success']."</strong>
								</div>

							";

						}

					?>
			
				
				<p class="badge">Total {totalFound}  Registred Home Owner in Your Site</p>

			
				<br>

				<table class="table table-bordered table-hover">
					<tr>
						<th>Owner Id</th>
						<th>Username</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Total Flat</th>
						<th>Delete</th>
					</tr>
					<?php
						foreach ($allOwner as $row) {?>
							<tr>
								<td><?php echo $row['id']?></td>
								<td><?php echo $row['username']?></td>
								<td><?php echo $row['mobile']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['totalFlat']?></td>

								<td>
									<a href="<?php echo base_url();?>admin/deleteOwner/<?php echo $row['username'];?>" onclick="return confirm('Are you sure to Delete it?All Flat of Owner Also be Deleted')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span>Delete</a>
								</td>
							</tr>
							
					 <?php }
					?>
					
					
						
					

												
						
					
						

				</table>
			

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>