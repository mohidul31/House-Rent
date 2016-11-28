<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner </title>

	<script src="<?php echo base_url();?>public/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>public/js/jquery-ui.min.js"></script> 
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/jquery-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/jquery-ui.theme.min.css">
	

	<script>		
		$("document").ready(function() {
			$('#datepicker').datepicker({ 
					dateFormat: 'dd-MM-yy',
					minDate: '0'
				});
		  });

	</script>



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
				<h3>You Can Publish It</h3><hr>

				{getFlat}
					Flat Name : {flat_name} <br>
					Price : {flat_price} <br>
					Room : {masterbed} Masterbed,{bed} Bed,{balcony} Balcony,{washroom} washroom <br><br>

				

				<form class="form-inline" method="POST">
					 	Available From:
					 	<input type="text" name="available_from"  class="form-control"  id="datepicker" placeholder="Enter Date" >

					 	<input type="hidden" name="faltid" value='{id}'><br><br>

					 	<input type="submit" name="publishSubmit" value="Publish" class="btn btn-success">

				</form>
				{/getFlat}

				<h5 style="color:red;"><?php echo validation_errors(); ?></h5>
			
				
			

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>