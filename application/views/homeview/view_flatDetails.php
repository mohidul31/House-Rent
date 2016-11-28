<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>


	<title>Flat Details</title>

</head>
<body '>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<?php  $this->load->view('headerview/homeBodyTopView')?>
			Flat Details
			<hr>
		 

			
				
				
				
					<div class="row">
						<div class="col-sm-7" >
							<?php
							foreach ($flatDetails as $res) {

								$myString=$res['gcimages'];
								$mySplit = explode(',', $myString);
								foreach($mySplit as $row){
									?>

									<img src="<?php echo base_url();?>public/uploads/<?php echo $row; ?>" alt="No Image Uploaded" class="mySlides" width="600" height="400"/> 

									<?php
								
										};?>

										<a class="w3-btn-floating w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
										<a class="w3-btn-floating w3-display-right" onclick="plusDivs(+1)">&#10095;</a>
						</div>
						<div class="col-sm-5"  align="left" style="background-color:white;">
							
						
							<b>Flat Type</b> :<?php echo $res['flat_type'];?>  <br> 
							<b>Masterbed</b> : <?php echo $res['masterbed'];?> <br>
							<b>Bed</b> :<?php echo $res['bed'];?>  <br>
							<b>Balcony</b> :<?php echo $res['balcony'];?> <br>
							<b>Washroom</b> :<?php echo $res['washroom'];?>  <br><br>
							<b>More Details :</b> <?php echo $res['flat_details'];?> <br>
							<b>Location</b> :  <?php echo $res['location_details'];?>  ( <?php echo $res['sublocation'];?>  ,<?php echo $res['location'];?>  )<br>

							<b>Flat Available from</b> : <?php echo $res['available_from'];?> <br>
							<b>Price Per Month</b> : <?php echo $res['flat_price'];?>  Tk<br>
							<b>Total Viewed :</b> <?php echo $res['total_view'];?> <br>
							

							<hr>
							<h4>Contract With Owner</h4>
							<b>Flat Owner</b> :<?php echo $res['username'];?> <br>
							<b>Owner Mobile</b> :<?php echo $res['mobile'];?> <br>
							<b>Owner Email</b> :<?php echo $res['email'];?> <br>
					
						</div>
					</div>
				
				

			
			
			<hr>
</center>
			<form class="form-inline" method="POST" name="addFlatform">

				

					Name :
					<input type="text" name="name" value='<?php echo set_value('name'); ?>' class="form-control" placeholder="Enter Name " ><br><br>

					Mobile To Contract With You:
					<input type="text" name="mobile" value='<?php echo set_value('mobile'); ?>' class="form-control" placeholder="Enter Mobile " ><br><br>

					Comment
					<input type="text" name="comment" value='<?php echo set_value('comment'); ?>' class="form-control" placeholder="Enter Comment " ><br><br>


				
					<input type="submit" name="submitIntrest" value="I Am Intrested" class="btn btn-success">
				
				</form>
			
				<?php } ?>
		

			<h5 style="color:red;"><?php echo validation_errors(); ?></h5>
		
	</div>

</body>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}
</script>

</html>