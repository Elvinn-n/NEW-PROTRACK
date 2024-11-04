<?php
include("../Assets/connection/connection.php");
ob_start();
include("Head.php");
	if(isset($_POST["submit"]))
	{
		$name=$_POST["name"];
	
		$insQry="insert into tbl_action(action_name)values('".$name."')";
		if($con->query($insQry))
		{
			echo "inserted";	
		}
	}
	
	
	
	
if(isset($_GET["delID"]))
{
	$upQry="delete from tbl_action where action_id='".$_GET["delID"]."'";
	if($con->query($upQry))
	{
		echo "Deleted";
		header("location:Action.php");
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
      <td>Action</td>
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
      <td>Action Name</td>
      
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_action";
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
      <td><?php echo $data["action_name"];?></td>
      
     
     <td><a href="Action.php?delID=<?php echo $data["action_id"];?>">Delete</a></td>

    </tr>
    <?php }?>
  </table>
  <?php
            include("Foot.php");
            ob_flush();
         ?> 
  