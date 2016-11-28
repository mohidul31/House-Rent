
<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner</title>
	

</head>
<body onload='loadCategories()''>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>Update Account Information </h4>

		
		<hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
				<form class="form-inline" method="POST" name="addFlatform">

				{ownerInfo}

					Mobile :
					<input type="text" name="mobile" value='{mobile}' class="form-control" placeholder="Enter Mobile " ><br><br>

					Email:
					<input type="text" name="email" value='{email}' class="form-control" placeholder="Enter Email " ><br><br>


				{/ownerInfo}
					<input type="submit" name="editOwner" value="Update Info" class="btn btn-success">
				
				</form>

				<h5 style="color:red;"><?php echo validation_errors(); ?></h5>

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>