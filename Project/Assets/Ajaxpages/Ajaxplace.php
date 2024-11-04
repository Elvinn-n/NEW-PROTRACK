<option>-----select-----</option>
<?php 
	include("../Connection/Connection.php");
	$selQry="select * from tbl_place where district_id =".$_GET['did'];
	$resultOne=$con->query($selQry);
	while($data=$resultOne->fetch_assoc())
	{
		?>
		
        <option value="<?php echo $data["place_id"]?>">
        	<?php echo $data["place_name"]?>	
        </option>
        <?php
	}
	?>	