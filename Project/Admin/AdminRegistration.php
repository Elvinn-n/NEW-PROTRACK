<?php
include("../Assets/connection/connection.php");
	if(isset($_POST["submit"]))
	{
		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$insQry="insert into tbl_admin(admin_name,admin_email,admin_password)values('".$name."','".$email."','".$password."')";
		if($con->query($insQry))
		{
			echo "inserted";	
		}
	}
	
	
	
	
if(isset($_GET["delID"]))
{
	$upQry="delete from tbl_admin where admin_id='".$_GET["delID"]."'";
	if($con->query($upQry))
	{
		echo "Deleted";
		header("location:AdminRegistration.php");
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Form</title>
</head>
<body>
<a href="HomePage.php">Home</a>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td>
      <input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="password" id="password" /></td>
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
      <td>Name</td>
      <td>Email</td>
      <td>Password</td>
   
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_admin";
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
      <td><?php echo $data["admin_name"];?></td>
      <td><?php echo $data["admin_email"];?></td>
      <td><?php echo $data["admin_password"];?></td>
     
     <td><a href="AdminRegistration.php?delID=<?php echo $data["admin_id"];?>">Delete</a></td>

    </tr>
    <?php }?>
  </table>
  