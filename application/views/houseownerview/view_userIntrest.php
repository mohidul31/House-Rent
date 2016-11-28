<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner </title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>List of Your published Flat </h4><hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
			
				
				<p class="badge">Total {totalFound} Intrest Found For Your published Flat</p>

				<table class="table table-bordered table-hover">
					
					{userIntrest}
					<tr>
						<tr>
							<th>Flat Name</th>
							<th>Client Name</th>
							<th>Client Mobile</th>
							<th>Client Comment</th>
							<th>Pasted At</th>
							<th>Delete</th>
						</tr>
						<td>{flat_name}</td>
						<td>{name}</td>
						<td>{mobile}</td>
						<td>{comment}</td>
						<td>{createdat}</td>
						<td><a href="<?php echo base_url();?>owner/deleteIntrest/{id}" onclick="return confirm('Are you sure to Delete This Client Intrest?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-remove"> </span> Delete</a></td>
					</tr>
					{/userIntrest}

				</table>
			

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>