<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_student where student_id='".$_SESSION['sid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="432" border="1">
  <tr>
    <td width="199">Enter Current Password</td>
    <td width="217"><label for="txt_current"></label>
      <input type="text" name="txt_current" id="txt_current" /></td>
  </tr>
  <tr>
    <td>Enter New Password</td>
    <td><label for="txt_new"></label>
      <input type="text" name="txt_new" id="txt_new" /></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><label for="txt_confirm"></label>
      <input type="text" name="txt_confirm" id="txt_confirm" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
</table>
</form>

<?php

	
	if(isset($_POST["submit"])){
		
	$p=$_POST["txt_current"];
	$n=$_POST["txt_new"];
	$c=$_POST["txt_confirm"];
	
		if($p==$data['student_password'])
		{
			if($n==$c)
			{
			    $updQry="UPDATE tbl_student SET student_password='".$n."' WHERE student_id='".$_SESSION['sid']."'";     
				if($con->query($updQry))
					echo "Updated";	
			}
			else
				echo "New password and Confirm Password MISMATCH..";
			
		}
		else
			echo "You have Entered incoorect password..";
	}

?>


</body>
</html>