<?php
include("../Assets/connection/connection.php");
	if(isset($_POST["submit"]))
	{
		$name=$_POST["name"];
	
		$insQry="insert into tbl_position(position_name)values('".$name."')";
		if($con->query($insQry))
		{
			echo "inserted";	
		}
	}
	
	
	
	
if(isset($_GET["delID"]))
{
	$upQry="delete from tbl_position where position_id='".$_GET["delID"]."'";
	if($con->query($upQry))
	{
		echo "Deleted";
		header("location:Positions.php");
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Positions</title>
</head>
<body>
<a href="HomePage.php">Home</a>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td>Position</td>
      <td>
      <input type="text" name="name" id="name" /></td>
    </tr>
    
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<table width="200" border="1" align="center">
    <tr>
      <td>Si.No</td>
      <td>Position</td>
      
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_position";
		$result=$con->query($selQry);
		$i=0;
		while($data=$result->fetch_assoc())
		{
			$i++;
	?>
    <tr>
      <td>
      	<?php
	 				echo $i;
	 	?>
      </td>
      <td><?php echo $data["position_name"];?></td>
      
     
     <td><a href="Positions.php?delID=<?php echo $data["position_id"];?>">Delete</a></td>

    </tr>
    <?php }?>
  </table>
  