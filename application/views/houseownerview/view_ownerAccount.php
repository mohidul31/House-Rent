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

				<h1>Account Information</h1>

				<?php
						if (isset($_SESSION['message'])) {

							echo "<div class='alert alert-success'><strong>".$_SESSION['message']."</strong></div>";

						}

					?>
				<table class="table table-bordered table-hover">

				{ownerInfo}
					<tr><td>Username</td><td>{username}</td></tr>
					<tr><td>Mobile</td><td>{mobile}</td></tr>
					<tr><td>Email</td><td>{email}</td></tr>
					<tr><td>Account Created At</td><td>{createdat}</td></tr>
					<tr><td>Last Account Info Updated At</td><td>{updatedat}</td></tr>

				{/ownerInfo}

				</table>

				<a href="<?php echo base_url();?>owner/accountUpdate"  class="btn btn-success"><span class="glyphicon glyphicon-wrench"> </span> Update Information</a>

				<a href="<?php echo base_url();?>owner/changePassword"  class="btn btn-success"><span class="glyphicon glyphicon-pushpin"> </span> Change Password</a>


							
					


			</div>
		</div>

			
		</center>
	</div>

</body>
</html>