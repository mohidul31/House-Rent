<?php 
	foreach($locations as $row){
		$loc[] = array("id" => $row['id'], "val" => $row['location']);
	}

	foreach($sublocations as $row){
		
		$subloc[$row['location_id']][] = array("id" => $row['id'], "val" => $row['sublocation']);
	}

	$jsonLocs = json_encode($loc);
	$jsonSubLocs = json_encode($subloc);


 ?>
<!DOCTYPE html>
<html>
<head>
	<?php  $this->load->view('headerview/headerCSSLink')?>

	<title>Home:: Owner</title>
	<script type='text/javascript'>
      <?php

        echo "var locations = $jsonLocs; \n";
        echo "var subLocations = $jsonSubLocs; \n";
      ?>
      function loadCategories(){
        var locationSelect= document.getElementById("locsSelect");
        
		locationSelect.onchange = updateSubLocs;
		//==================put data in Dropdown List
		
        for(var i = 0; i < locations.length; i++){
				var option = document.createElement("option");
				option.text = locations[i].val;
				option.value = locations[i].id;
				var select = document.getElementById("locsSelect");
				select.appendChild(option);

			 			
        }
		
		
		
      }
      function updateSubLocs(){
        var locationSelect = this;
        var locId = this.value;
        var subLocSelect = document.getElementById("subLocsSelect");
        subLocSelect.options.length = 0; //delete all options if any present
		
		//==================put data in Dropdown List
        for(var i = 0; i < subLocations[locId].length; i++){
			
			var option = document.createElement("option");
			option.text = subLocations[locId][i].val;
			option.value = subLocations[locId][i].id;
			var select = document.getElementById("subLocsSelect");
			select.appendChild(option);
         
        }
		
      }
    </script>

</head>
<body onload='loadCategories()''>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<center><h1>Welcome To ABC House Rent</h1><hr>

		<h4>Edit Flat </h4>

		<?php
			if (isset($_SESSION['addSuccessMessage'])) {

				echo "
					<div class='alert alert-success'>
						<strong>Flat added Successfully.</strong> You Can Upload Photo of each flat later and publish when needed .
					</div>

				";

			}

		?>
		<hr>

		<div class="row">
	
			<div class="col-sm-3" >

				<?php $this->load->view('houseownerview/ownerSideBarView');?>

			</div>
			<div class="col-sm-9" align="left">
				
				<form class="form-inline" method="POST" name="addFlatform">
					
					<?php
						foreach ($myFlat as $row) {
							?>

							
					
					Flat Name :
					<input type="text" name="flatname" value='<?php echo $row['flat_name'];?>' class="form-control" placeholder="Enter A name " ><br><br>

					Location Details:
					<input type="text" name="locationDetails" value='<?php echo $row['location_details'];?>' class="form-control" placeholder="Enter Location Details " ><br><br>


					Where it is??:
					<select  name="location" id='locsSelect' class="form-control" >
						<option value="" >--District--</option>
				
					</select>

					Sublocation:
					<select  name="sublocation" id='subLocsSelect' class="form-control" >
						<option value="" >--Sublocation--</option>
					
					</select><br><br>

					Flat Type:
					<select name="flattype" class="form-control">
						<option value="Bechelor" 
						<?php if($row['flat_type']=='Bechelor'){ echo 'selected = "selected"';}?>
						>Bechelor</option>
						<option value="Family" 
						<?php if($row['flat_type']=='Family'){ echo 'selected = "selected"';}?>
						>Family</option>
						<option value="Commercial" 
						<?php if($row['flat_type']=='Commercial'){ echo 'selected = "selected"';}?>
						>Commercial</option>
					</select>
					<br><br>

					Master Bed:
					<select name="masterbed" class="form-control">
						<option value="0" 
						<?php if($row['masterbed']=='0'){ echo 'selected = "selected"';}?>
						>0</option>
						<option value="1" 
						<?php if($row['masterbed']=='1'){ echo 'selected = "selected"';}?>
						>1</option>
						<option value="2" 
						<?php if($row['masterbed']=='2'){ echo 'selected = "selected"';}?>
						>2</option>
						<option value="3" 
						<?php if($row['masterbed']=='3'){ echo 'selected = "selected"';}?>
						>3</option>
					</select>

					Bed:
					<select name="bed" class="form-control">
						<option value="0" 
							<?php if($row['bed']=='0'){ echo 'selected = "selected"';}?>
						>0</option>
						<option value="1" 
							<?php if($row['bed']=='1'){ echo 'selected = "selected"';}?>
						>1</option>
						<option value="2" 
							<?php if($row['bed']=='2'){ echo 'selected = "selected"';}?>
						>2</option>
						<option value="3" 
							<?php if($row['bed']=='3'){ echo 'selected = "selected"';}?>
						>3</option>
						<option value="4" 
							<?php if($row['bed']=='4'){ echo 'selected = "selected"';}?>
						>4</option>
						<option value="5" 
							<?php if($row['bed']=='5'){ echo 'selected = "selected"';}?>
						>5</option>
					</select>

					Balcony:
					<select name="balcony" class="form-control">
						<option value="0" 
							<?php if($row['balcony']=='0'){ echo 'selected = "selected"';}?>
						>0</option>
						<option value="1" 
							<?php if($row['balcony']=='1'){ echo 'selected = "selected"';}?>
						>1</option>
						<option value="2" 
							<?php if($row['balcony']=='2'){ echo 'selected = "selected"';}?>
						>2</option>
						<option value="3" 
							<?php if($row['balcony']=='3'){ echo 'selected = "selected"';}?>
						>3</option>
						<option value="4" 
							<?php if($row['balcony']=='4'){ echo 'selected = "selected"';}?>
						>4</option>
						<option value="5" 
							<?php if($row['balcony']=='5'){ echo 'selected = "selected"';}?>
						>5</option>
					</select>

					Washroom:
					<select name="washroom" class="form-control">
						<option value="0" 
							<?php if($row['washroom']=='0'){ echo 'selected = "selected"';}?>
						>0</option>
						<option value="1" 
							<?php if($row['washroom']=='1'){ echo 'selected = "selected"';}?>
						>1</option>
						<option value="2" 
							<?php if($row['washroom']=='2'){ echo 'selected = "selected"';}?>
						>2</option>
						<option value="3" 
							<?php if($row['washroom']=='3'){ echo 'selected = "selected"';}?>
						>3</option>
						<option value="4" 
							<?php if($row['washroom']=='4'){ echo 'selected = "selected"';}?>
						>4</option>
						<option value="5" 
							<?php if($row['washroom']=='5'){ echo 'selected = "selected"';}?>
						>5</option>
					</select><br><br>

					Flat Details:
					<input type="text" name="flatDetails" value='<?php echo $row['flat_details'];?>' class="form-control" placeholder="Enter Details" ><br><br>
				
					Rent Price per month:
					<input type="number" name="price" value='<?php echo $row['flat_price'];?>' class="form-control" placeholder="Enter Price" ><br><br>
					
					<input type="hidden" name="id" value='<?php echo $row['id'];?>'  ><br><br>
					

					<?php
						}
					?>

					<input type="submit" name="editFlat" value="Edit Flat" class="btn btn-success">
					  
				</form>

				<h5 style="color:red;"><?php echo validation_errors(); ?></h5>

			</div>
		</div>

			
		</center>
	</div>

</body>
</html>