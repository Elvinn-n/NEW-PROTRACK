<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<a href="HomePage.php">Home</a> <br>

<form id="form1" name="form1" method="post" action="">
  <table width="308" border="1">
    <tr>
      <td width="121">Date</td>
      <td width="171"><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Start Time</td>
      <td><label for="txt_starttime"></label>
      <input type="time" name="txt_starttime" id="txt_starttime" /></td>
    </tr>
    <tr>
      <td>End Time</td>
      <td><label for="txt_endtime"></label>
      <input type="time" name="txt_endtime" id="txt_endtime" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>


<?php

	include("../Assets/connection/connection.php");
	if(isset($_POST["submit"]))
	{
		$date=$_POST['txt_date'];
		$starttime=$_POST['txt_starttime'];
		$endtime=$_POST['txt_endtime'];
		
		$insQry="insert into tbl_game(game_date,game_starttime,game_endtime) values('".$date."','".$starttime."','".$endtime."')";
		if($con->query($insQry))
			echo "Inserted";	
	}



if(isset($_GET["delID"]))
{
	$upQry="delete from tbl_game where game_id='".$_GET["delID"]."'";
	if($con->query($upQry))
	{
		echo "Deleted";
		header("location:AddGame.php");
	}
}

?>


<table width="345" border="1" align="center">
  <tr>
    <th width="57">Slno</th>
    <th width="51">Date</th>
    <th width="115">Start Time</th>
    <th width="94">End Time</th>
    <th width="94">Action</th>
  </tr>
  <?php
  	
  	$i=0;
	$selqry="SELECT * FROM tbl_game";
	$result=$con->query($selqry);
	while($row=$result->fetch_assoc())
	{
		$i=$i+1;
  		?>
  		<tr>
    	<td> <?php echo $i; ?> </td>
    	<td><?php echo $row["game_date"]; ?></td>
    	<td><?php echo $row["game_starttime"]; ?></td>
    	<td><?php echo $row["game_endtime"]; ?></td>
         
        <td><a href="AddGame.php?delID=<?php echo $row["game_id"];?>">Delete</a></td>

  		</tr>
        <?php
  	}
	?>	
</table>

</body>
</html>

