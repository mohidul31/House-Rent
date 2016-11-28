<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner Registration</title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<?php  $this->load->view('headerview/homeBodyTopView')?>

		<h4>Owner Registration</h4><hr>


		<form class="form-inline" method="POST">
			
			Username :
			<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Enter Username" ><br><br>

			Password :
			<input type="password" name="password" class="form-control" placeholder="Enter Password" ><br><br>

			Confirm Password:
			<input type="password" name="matchPassword" class="form-control" placeholder="Confirm Password" ><br><br>

			Email:
			<input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Enter Valied Email" ><br><br>

			Mobile:
			<input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control" placeholder="Enter Mobile" ><br><br>

			<input type="submit" name="register" value="Register" class="btn btn-success">
			  
		</form>
		<h5 style="color:red;"><?php echo validation_errors(); ?></h5>
			
		</center>
	</div>

</body>
</html>