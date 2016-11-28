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
				<?php
						if (isset($_SESSION['unPublishItSuccess'])) {

							echo "
								<div class='alert alert-success'>
									<strong>".$_SESSION['unPublishItSuccess']."</strong>
								</div>

							";

						}

					?>
			
				
				<p class="badge">Total {totalFound} published Result Found</p>

				<table class="table table-bordered table-hover">
					<tr>
						<th>Flat Name</th>
						<th>Price</th>
						<th>Available From</th>
						<th>Unpublish it</th>
					</tr>
					{publishedFlat}
					<tr>
						<td>{flat_name}</td>
						<td>{flat_price}</td>
						<td>{available_from}</td>
						<td><a href="<?php echo base_url();?>owner/unPublishIt/{id}" onclick="return confirm('Are you sure to Unpublish it?')" class="btn btn-danger">
						<span class="glyphicon glyphicon-chevron-down"> </span> Unpublish It</a></td>
					</tr>
					{/publishedFlat}

				</table>
			

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>