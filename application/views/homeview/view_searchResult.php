<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Search Result</title>



</head>
<body '>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<?php  $this->load->view('headerview/homeBodyTopView')?>
		
		You Searched For : {masterbed} Masterbed, {bed} Bed, {balcony} Balcony, {washroom} Washroom in {SearchSublocations}{sublocation}{/SearchSublocations} , {searchLocations}{location}{/searchLocations}
		<hr>
		 <h4> <span class="label label-default">Based On Your Search ( {total} result Found )</span></h4>

			<table class="table table-bordered ">

				<?php
					foreach ($accurateSearch as $res) {

						echo "
							<tr>
								<td>
									<div class='col-sm-4'>
						";

						$myString=$res['gcimages'];
						$mySplit = explode(',', $myString);
								foreach($mySplit as $row){
									?>

									<img src="<?php echo base_url();?>public/uploads/<?php echo $row; ?>" alt="No Image Uploaded" class="mySlides" width="300" height="200"/> 
									<?php
									break;
										};
								echo "
									</div>
										<div class='col-sm-8' border='1' align='left' style='background-color:white;''>
											<b>Flat Type</b> : ".$res['flat_type']." ( {masterbed} Masterbed, 
											{bed} Bed,  
											{balcony} Balcony,
											{washroom} Washroom )<br>
											<b>Available from</b> : ".$res['available_from']."<br>
											<b>Price Per Month</b> : ".$res['flat_price']." Tk<br>
											<b>Location</b> : ".$res['location_details']." ( ".$res['sublocation']." ,".$res['location']." )<br>
											<b>Total Viewed :</b> ".$res['total_view']."<br>

											<div class='text-right'>";
									 ?>
												<a  href="<?php echo base_url();?>home/flatDetails/<?php echo $res['id'];?>" target="_blank" class="btn btn-success">Details</a>

											</div>
											
										
									</div>
								</td>
								</tr>

							<?php
					}
				?>
				
		

			</table>


		 <h4> <span class="label label-default">Top Viewed Flat in
		 {SearchSublocations}{sublocation}{/SearchSublocations} , {searchLocations}{location}{/searchLocations}
		 ( {totalTopViewed} result Found) </span></h4>

		 <table class="table table-bordered ">
			
				<?php
					foreach ($topViewed as $res) {

						echo "
							<tr>
								<td>
									<div class='col-sm-4'>
						";

						$myString=$res['gcimages'];
						$mySplit = explode(',', $myString);
								foreach($mySplit as $row){
									?>

									<img src="<?php echo base_url();?>public/uploads/<?php echo $row; ?>" alt="No Image Uploaded" class="mySlides" width="300" height="200"/> 
									<?php
									break;
										};
								echo "
									</div>
										<div class='col-sm-8' border='1' align='left' style='background-color:white;''>
											<b>Flat Type</b> : ".$res['flat_type']." ( {masterbed} Masterbed, 
											{bed} Bed,  
											{balcony} Balcony,
											{washroom} Washroom )<br>
											<b>Available from</b> : ".$res['available_from']."<br>
											<b>Price Per Month</b> : ".$res['flat_price']." Tk<br>
											<b>Location</b> : ".$res['location_details']." ( ".$res['sublocation']." ,".$res['location']." )<br>
											<b>Total Viewed :</b> ".$res['total_view']."<br>

											<div class='text-right'>";
									 ?>
												<a  href="<?php echo base_url();?>home/flatDetails/<?php echo $res['id'];?>" target="_blank" class="btn btn-success">Details</a>

											</div>
											
										
									</div>
								</td>
								</tr>

							<?php
					}
				?>

			</table>

		
		
		</center>
	</div>

</body>

</html>