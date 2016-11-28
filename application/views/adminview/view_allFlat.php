<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner </title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>List of Your All Flat </h4><hr>

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
			
				
				<p class="badge">Total {totalFound}  Flat Added By All User</p>

			
				<br>

				<table class="table table-bordered table-hover">
					<tr>
						<th>Flat Id</th>
						<th>User</th>
						<th>Flat Name</th>
						<th>Flat Type</th>
						<th>Price Per Month</th>
						<th>Un/publish</th>
						<th>Masterbed</th>
						<th>Bed</th>
						<th>Balcony</th>
						<th>Washroom</th>
						
						
						<th>Delete</th>
					</tr>
					<?php
						foreach ($allFlat as $row) {?>
							<tr>
								<td><?php echo $row['id']?></td>
								<td><?php echo $row['owner_username']?></td>
								<td><?php echo $row['flat_name']?></td>
								<td><?php echo $row['flat_type']?></td>
								<td><?php echo $row['flat_price']?></td>

								<?php
									if($row['isPublished']=='1'){

										echo "<td style='color:green'>Published</td>";

									}else{
										echo "<td style='color:red'>Unpublished</td>";	
									}
								?>

								<td><?php echo $row['masterbed']?></td>
								<td><?php echo $row['bed']?></td>
								<td><?php echo $row['balcony']?></td>
								<td><?php echo $row['washroom']?></td>

								<td>
									<a href="<?php echo base_url();?>admin/deleteFlat/<?php echo $row['id'];?>" onclick="return confirm('Are you sure to Delete it?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove"> </span>Delete</a>
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