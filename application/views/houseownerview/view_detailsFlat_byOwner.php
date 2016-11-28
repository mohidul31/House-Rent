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
			<center><h4>Details</h4></center>
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
				{flatDetails}
				
					<div class="row">
						
						<div class="col-sm-8" border="1" align="left" style="background-color:white;">
							
						
							<b>Flat Type</b> : {flat_type} <br> 
							<b>Masterbed</b> :{masterbed} <br>
							<b>Bed</b> :{bed} <br>
							<b>Balcony</b> :{balcony}<br>
							<b>Washroom</b> :{washroom} <br><br>
							<b>More Details :</b> {flat_details}<br>
							<b>Location</b> : {location_details} ( {sublocation} ,{location} )<br>
							<b>Flat Available from</b> : {available_from}<br>
							<b>Price Per Month</b> : {flat_price} Tk<br>
							<b>Total Viewed :</b> {total_view}<br>
							

					
						</div>
					</div>
				
				{/flatDetails}

			
</div>
		</div>

			
		</center>
	</div>

</body>
</html>