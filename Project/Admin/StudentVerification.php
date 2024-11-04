<?php
include("../Assets/Connection/Connection.php");

if(isset($_GET["acid"]))
{
	$upQry="update tbl_student set student_status='1' where student_id='".$_GET["acid"]."'";
	if($con->query($upQry))
	{
		echo "Accepted";
		header("location:StudentVerification.php");
	}
}

if(isset($_GET["rejid"]))
{
	$upQry="update tbl_student set student_status='2' where student_id='".$_GET["rejid"]."'";
	if($con->query($upQry))
	{
		echo "Rejected";
		header("location:StudentVerification.php");
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StudentVerification</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<h3>NewStudent</h3>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>Name</td>
      <td>Course</td>
      <td>AcademicYear</td>
      <td>Email</td>
    
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_student s inner join tbl_course c on s.course_id=c.course_id inner join tbl_academicyear a on a.acyear_id=s.acyear_id where student_status='0'";
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
      <td><?php echo $data["student_name"];?></td>
      <td><?php echo $data["course_name"];?></td>
      <td><?php echo $data["acyear_name"];?></td>
      <td><?php echo $data["student_email"];?></td>
     
      <td><img src="../Assets/files/Coach/<?php echo $data["student_proof"];?>" width="75" height="75" /></td>
       <td><img src="../Assets/files/Coach/<?php echo $data["student_photo"];?>" width="75" height="75" /></td>
     <td><a href="StudentVerification.php?acid=<?php echo $data["student_id"];?>">Accept</a>/<a href="StudentVerification.php?rejid=<?php echo $data["student_id"];?>">Reject</a></td>

    </tr>
    <?php }?>
  </table>
  
  
  <h3>AcceptedList</h3>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>Name</td>
      <td>Course</td>
      <td>AcademicYear</td>
      <td>Email</td>
    
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_student s inner join tbl_course c on s.course_id=c.course_id inner join tbl_academicyear a on a.acyear_id=s.acyear_id where student_status='1'";
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
      <td><?php echo $data["student_name"];?></td>
      <td><?php echo $data["course_name"];?></td>
      <td><?php echo $data["acyear_name"];?></td>
      <td><?php echo $data["student_email"];?></td>
     
      <td><img src="../Assets/files/Coach/<?php echo $data["student_proof"];?>" width="75" height="75" /></td>
       <td><img src="../Assets/files/Coach/<?php echo $data["student_photo"];?>" width="75" height="75" /></td>
     <td><a href="StudentVerification.php?rejid=<?php echo $data["student_id"];?>">Reject</a></td>

    </tr>
    <?php }?>
  </table>
  

<h3>RejectedList</h3>
  <table width="200" border="1">
    <tr>
      <td>Si.No</td>
      <td>Name</td>
      <td>Course</td>
      <td>AcademicYear</td>
      <td>Email</td>
    
      <td>Proof</td>
      <td>Photo</td>
      <td>Action</td>

    </tr>
    <?php
		$selQry="Select *from tbl_student s inner join tbl_course c on s.course_id=c.course_id inner join tbl_academicyear a on a.acyear_id=s.acyear_id where student_status='2'";
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
      <td><?php echo $data["student_name"];?></td>
      <td><?php echo $data["course_name"];?></td>
      <td><?php echo $data["acyear_name"];?></td>
      <td><?php echo $data["student_email"];?></td>
     
      <td><img src="../Assets/files/Coach/<?php echo $data["student_proof"];?>" width="75" height="75" /></td>
       <td><img src="../Assets/files/Coach/<?php echo $data["student_photo"];?>" width="75" height="75" /></td>
     <td><a href="StudentVerification.php?acid=<?php echo $data["student_id"];?>">Accept</a></td>

    </tr>
    <?php }?>
  </table>
  
</body>
</html>