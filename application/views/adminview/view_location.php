<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner</title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>All Stored Location </h4><hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('adminview/adminSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
					
					<table class="table table-bordered table-hover">
					<tr>
						<th>Locations</th>
						<th>Sublocations</th>
					
					</tr>
					{alllocations}
							<tr>
								<td>{location}</td>
								<td>{sub}</td>

							<tr>
					{/alllocations}
							

				</table>
					


			</div>
		</div>

			
		</center>
	</div>

</body>
</html>