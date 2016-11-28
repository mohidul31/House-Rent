<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner </title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>List of Your unpublished Flat </h4><hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				

					
				
				
				<p class="badge">Total {totalFound} unpublished Result Found</p>
				<table class="table table-bordered table-hover">
					<tr>
						<th>Flat Name</th>
						<th>Price</th>
						<th>Publish it</th>
					</tr>
					{unpublishedFlat}
					<tr>
						<td>{flat_name}</td>
						<td>{flat_price}</td>
						<td><a href="<?php echo base_url();?>owner/publishIt/{id}" class="btn btn-primary">
						<span class="glyphicon glyphicon-chevron-up"> </span> Publish It</a></td>
					</tr>
					{/unpublishedFlat}
				</table>
			

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>