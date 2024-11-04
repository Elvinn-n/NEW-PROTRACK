<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_coach where coach_id='".$_SESSION['cid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
	if(isset($_POST["update_profile"]))
	{
		
		$upQry="update tbl_coach set coach_name='".$_POST["new_name"]."', coach_email='".$_POST["new_email"]."' where coach_id=".$_SESSION['cid'];
		if($con->query($upQry))
		{
			?> <script>
			 alert("details updated")
			 window.location="MyProfile.php"
			  </script>
               <?php 
		}
		else
		{
			echo "not updated";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align="center" width="200" border="1">
    <tr>
      <td width="87">Name</td>
      <td width="97"><input name ="new_name" type="text" value="<?php echo $data['coach_name'] ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input name="new_email" type="text" value="<?php echo $data['coach_email'] ?>">	</td> 
    </tr>
	<tr >
      <td colspan="2" align="center"><input type="submit" name="update_profile" id="update_profile" value="Update Profile" /> </td>
      
    </tr>
  </table>
</form>
</body>
</html>