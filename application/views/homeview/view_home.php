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

	<title>Home</title>

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
<body onload='loadCategories()'>

	<div class="container" style="background-color:white; margin-top: 100px; padding-bottom: 100px;">
		
		<?php  $this->load->view('headerview/homeBodyTopView')?>
		

		<p>Were You Want To Live???</p>

		<form class="form-inline" method="POST">
			Location:
			<select  name="location" id='locsSelect' class="form-control" >
				<option value="" >-------Please Select--------</option>
		
			</select>

			Sublocation:
			<select name="sublocation" id='subLocsSelect' class="form-control" >
				<option value="" >-------Please Select--------</option>
			
			</select><br><br>

			Enter Your Choice??<br>
			
			
			Masterbed:
			<select name="masterbed" class="form-control" required>
				<option value="0" <?php echo  set_select('masterbed', '0');?> >0</option>
				<option value="1" <?php echo  set_select('masterbed', '1');?> >1</option>
				<option value="2" <?php echo  set_select('masterbed', '2'); ?> >2</option>
				<option value="3" <?php echo  set_select('masterbed', '3'); ?> >3</option>
			</select>

			Bed:
			<select name="bed" class="form-control" required>
				<option value="0" <?php echo  set_select('bed', '0');?> >0</option>
				<option value="1" <?php echo  set_select('bed', '1');?> >1</option>
				<option value="2" <?php echo  set_select('bed', '2'); ?> >2</option>
				<option value="3" <?php echo  set_select('bed', '3'); ?> >3</option>
				<option value="4" <?php echo  set_select('bed', '4'); ?> >4</option>
				<option value="5" <?php echo  set_select('bed', '5'); ?> >5</option>
			</select>

			Balcony:
			<select name="balcony" class="form-control" required>
				<option value="0" <?php echo  set_select('balcony', '0');?> >0</option>
				<option value="1" <?php echo  set_select('balcony', '1');?> >1</option>
				<option value="2" <?php echo  set_select('balcony', '2'); ?> >2</option>
				<option value="3" <?php echo  set_select('balcony', '3'); ?> >3</option>
				<option value="4" <?php echo  set_select('balcony', '4'); ?> >4</option>
				<option value="5" <?php echo  set_select('balcony', '5'); ?> >5</option>
			</select>

			Washroom:
			<select name="washroom" class="form-control" required>
				<option value="0" <?php echo  set_select('washroom', '0');?> >0</option>
				<option value="1" <?php echo  set_select('washroom', '1');?> >1</option>
				<option value="2" <?php echo  set_select('washroom', '2'); ?> >2</option>
				<option value="3" <?php echo  set_select('washroom', '3'); ?> >3</option>
				<option value="4" <?php echo  set_select('washroom', '4'); ?> >4</option>
				<option value="5" <?php echo  set_select('washroom', '5'); ?> >5</option>
			</select>


			
			<input type="submit" name="search" value="Search" class="btn btn-success">
			  
		</form>


		<h5 style="color:red;"><?php echo validation_errors(); ?></h5>
		</center>
	</div>

</body>
</html>