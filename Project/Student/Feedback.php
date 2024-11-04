<?php
include("../Assets/connection/connection.php");




if(isset($_POST["submit"]))
	{
		$content=$_POST["content"];
		
		$insQry="insert into tbl_feedback(feedback_content) values('".$content."')";
		if($con->query($insQry)){
			echo "Inserted";
		}
		
	}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
</head>
<body align="center">

  <h2>Complaint Form</h2>

  <form id="form1" name="form1" method="post" action="">
    <table align="center" width="200" border="1">
      <tr>
        <td width="87">Content</td>
        <td width="97"><textarea name ="content"  id="content" placeholder="Enter feedback"></textarea></td>
      </tr>
      <tr>
        <td> <input type="submit" name="submit" id="submit" value="Submit"></td>
      </tr>

    </table>
  </form>
</body>
</html>


