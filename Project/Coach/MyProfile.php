<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_coach where coach_id='".$_SESSION['cid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
</head>

<body>

  <div align="center">
   <h1 align="center"> Profile</h1>
    <table width="414" height="306" border="1">
      <tr>
        <td height="156" colspan="2" align="center"><img src='../Assets/files/Coach/<?php echo $data['coach_photo'] ?>' width="100px" height="100px"/></td>
      </tr>

      <tr>
        <td  height="51">Name</td>
        <td width="215" ><?php echo $data['coach_name'] ?> </td>
      </tr>
      <tr>
        <td height="52">Email</td>
        <td><?php echo $data['coach_email'] ?> </td>
      </tr>
      <tr>
        <td height="35"><a href="EditProfile.php">Edit Profile</a></td>
        <td height="35"><a href="ChangePassword.php">Change Password</a></td>
      </tr>
    </table>
  </div>
</body>

</html>