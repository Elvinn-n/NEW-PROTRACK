<?php
include("Head.php");
?>
<?php
include("../Assets/Connection/Connection.php");

if(isset($_GET["acid"]))
{
	$upQry="update tbl_coach set coach_status='1' where coach_id='".$_GET["acid"]."'";
	if($con->query($upQry))
	{
		echo "Accepted";
    ?>
    <script>
      window.location="CoachVerification.php"
    </script>
    <?php
	}
}

if(isset($_GET["rejid"]))
{
	$upQry="update tbl_coach set coach_status='2' where coach_id='".$_GET["rejid"]."'";
	if($con->query($upQry))
	{
		echo "Rejected";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<a href="HomePage.php">Home</a>
<h3>NewCoachList</h3>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Address</td>
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_coach where coach_status='0'";
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
      <td><?php echo $data["coach_name"];?></td>
      <td><?php echo $data["coach_email"];?></td>
      <td><?php echo $data["coach_address"];?></td>
      <td><img src="../Assets/files/Coach/<?php echo $data["coach_proof"];?>" width="75" height="75" /></td>
       <td><img src="../Assets/files/Coach/<?php echo $data["coach_photo"];?>" width="75" height="75" /></td>
     <td><a href="CoachVerification.php?acid=<?php echo $data["coach_id"];?>">Accept</a>/<a href="CoachVerification.php?rejid=<?php echo $data["coach_id"];?>">Reject</a></td>

    </tr>
    <?php }?>
  </table>
  
  
  <h3>AcceptedList</h3>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Address</td>
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_coach where coach_status='1'";
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
      <td><?php echo $data["coach_name"];?></td>
      <td><?php echo $data["coach_email"];?></td>
      <td><?php echo $data["coach_address"];?></td>
      <td><img src="../Assets/files/Coach/<?php echo $data["coach_proof"];?>" width="75" height="75" /></td>
       <td><img src="../Assets/files/Coach/<?php echo $data["coach_photo"];?>" width="75" height="75" /></td>
     <td><a href="CoachVerification.php?rejid=<?php echo $data["coach_id"];?>">Reject</a></td>

    </tr>
    <?php }?>
  </table>



<h3>RejectedList</h3>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Address</td>
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_coach where coach_status='2'";
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
      <td><?php echo $data["coach_name"];?></td>
      <td><?php echo $data["coach_email"];?></td>
      <td><?php echo $data["coach_address"];?></td>
      <td><img src="../Assets/files/Coach/<?php echo $data["coach_proof"];?>" width="75" height="75" /></td>
       <td><img src="../Assets/files/Coach/<?php echo $data["coach_photo"];?>" width="75" height="75" /></td>
     <td><a href="CoachVerification.php?acid=<?php echo $data["coach_id"];?>">Accept</a></td>

    </tr>
    <?php }?>
  </table>

</body>
</html>
<?php
  include("Foot.php");
    ?>