<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Log In</title>

</head>
<body >

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<?php  $this->load->view('headerview/homeBodyTopView')?>

		<h4>Log In</h4><hr>


		<form class="form-inline" method="POST">
			
			Username :
			<input type="text" name="username" class="form-control" placeholder="Enter Username" ><br><br>

			Password :
			<input type="password" name="password" class="form-control" placeholder="Enter Password" ><br><br>

			

			<input type="submit" name="login" value="Login" class="btn btn-success">
			  
		</form>
		
		<h5 style="color:red;"><?php echo validation_errors(); ?></h5>

		<?php
						if (isset($_SESSION['loginError'])) {

							echo "
								<div class='alert alert-danger'>
									<strong>".$_SESSION['loginError']."</strong>
								</div>

							";

						}

					?>
			
		</center>
	</div>

</body>
</html>