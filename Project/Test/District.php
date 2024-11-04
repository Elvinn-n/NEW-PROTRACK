<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$district=$_POST["district"];
	$insQry="insert into tbl_district(district_name) values('".$district."')";
	echo $insQry;
	if($con->query($insQry))
	{
		echo "inserted";
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
  <table width="200" border="1">
    <tr>
      <td>District</td>
      <td><label for="district"></label>
      <input type="text" name="district" id="district" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>District</td>

    </tr>
    <?php
		$selQry="Select *from tbl_district";
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
      <td>
	  <?php
	 echo $data["district_name"];
      ?>
      </td>

    </tr>
    <?php }?>
  </table>
</form>
</body>
</html>