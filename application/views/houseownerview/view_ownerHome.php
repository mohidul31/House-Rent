<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner</title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>Welcome To Owner Home </h4><hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
					
					<?php
						if($totalFound== '0'){
							echo "<h1>Your Have No Published Flat</h1>";
						}else{
							?>

							<h1>Your Published Flat</h1>
							<table class="table table-bordered table-hover">
								<tr>
									<th>Flat Name</th>
									<th>Price</th>
									<th>Available From</th>
									<th>Total Viewed</th>
								
								</tr>
								{publishedFlat}
								<tr>
									<td>{flat_name}</td>
									<td>{flat_price}</td>
									<td>{available_from}</td>
									<td>{total_view}</td>
								</tr>
								{/publishedFlat}

							</table>
							<?php
						}
					?>
					


			</div>
		</div>

			
		</center>
	</div>

</body>
</html>