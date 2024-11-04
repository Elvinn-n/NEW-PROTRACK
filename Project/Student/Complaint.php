<?php
include("../Assets/connection/connection.php");
session_start();

$sid=$_SESSION['sid'];
/*
$selQry="select * from tbl_student where student_id='".$sid."'";
$result=$con->query($selQry);
$data=$result->fetch_assoc(); */

$user="student";
if(isset($_POST["submit"]))
	{
    $_SESSION['complaint']=$user;
		$title=$_POST["title"];
		$content=$_POST["content"];
		
		$insQry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,student_id) values('".$title."','".$content."',CURDATE(),'".$sid."')";
		if($con->query($insQry)){
			echo "Inserted";
		}
		
	}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaint Form</title>
</head>
<body align="center">

  <h2>Complaint Form</h2>

  <form id="form1" name="form1" method="post" action="">
    <table align="center" width="200" border="1">
      
      <tr>
        <td width="87">Title</td>
        <td width="97"><input name ="title" type="text" id="title" placeholder="Enter title"></td>
      </tr>
      <tr>
        <td width="87">Content</td>
        <td width="97"><textarea name ="content"  id="content" placeholder="Enter content"></textarea></td>
      </tr>
      <tr>
        <td> <input type="submit" name="submit" id="submit" value="Submit"></td>
      
        <td> <input type="submit" name="replys" id="replys" value="replys"></td>
      </tr>

    </table>
  </form>



  <?php
    if(isset($_POST["replys"]))
    {
  ?>
      <br><br><br>
      <h3>Reply messages</h3>

      <table align="center" border="1">
        <tr>
            <th>Slno</th>
            <th>Title</th>
            <th>Message</th>
            
        </tr>
        <?php
            $i=1;
                              
            $selqry="select complaint_title,complaint_reply from tbl_complaint where student_id='".$sid."' and complaint_reply is not null";
            $result = $con->query($selqry);
            while($row=$result->fetch_assoc())
	          {
  		        if($row["complaint_reply"]!='')
              {
                ?>
  		          <tr>
    	            <td> <?php echo $i++; ?> </td>
    	            <td><?php echo $row["complaint_title"]; ?></td>
                  <td><?php echo $row["complaint_reply"]; ?></td>                        
  		          </tr>
  		      <?php
              }
            }
        ?>
        </table>
  <?php
    } 
  ?>

</body>
</html>