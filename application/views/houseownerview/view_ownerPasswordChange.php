
<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner</title>
	

</head>
<body onload='loadCategories()''>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>Change Password </h4>

		
		<hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" >
				
				<form class="form-inline" method="POST" name="addFlatform">

				

					Current Password :
					<input type="password" name="oldPW" value='' class="form-control" placeholder="Enter Mobile " ><br><br>

					New Password:
					<input type="password" name="PW" value='' class="form-control" placeholder="Enter Email " ><br><br>

					Confirm Password
					<input type="password" name="cPW" value='' class="form-control" placeholder="Enter Email " ><br><br>


				
					<input type="submit" name="updatePass" value="Change Password" class="btn btn-success">
				
				</form>

				<h5 style="color:red;"><?php echo validation_errors(); ?></h5>

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>