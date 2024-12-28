<?php
include("../Assets/Connection/Connection.php");

	if(isset($_POST["Submit"]))
	{
		$name=$_POST["name"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$course=$_POST["selcourse"];
		$year=$_POST["selyear"];
    $weight=$_POST["weight"];
    $height=$_POST["height"];
    $dob=$_POST["date"];
		
		$photo=$_FILES["photo"]["name"];
		$temp=$_FILES["photo"]["tmp_name"];
		move_uploaded_file($temp,"../Assets/files/student/".$photo);
		
		
		
		$proof=$_FILES["proof"]["name"];
		$temp=$_FILES["proof"]["tmp_name"];
		move_uploaded_file($temp,"../Assets/files/student/".$proof);
		
		
		$insQry="insert into tbl_student(student_name,student_email,student_password,student_dob,student_height,student_weight,course_id,acyear_id,student_photo,student_proof) values('".$name."','".$email."','".$password."','".$dob."','".$height."','".$weight."','".$course."','".$year."','".$photo."','".$proof."')";
		if($con->query($insQry)){
			echo "Inserted";
		}
		
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  /* Reset some default margins and paddings */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

/* Body and form styling */
body {
  background-color: #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

form {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
}

/* Table styling */
table {
  width: 100%;
  border: none;
}

/* Input and label styling */
td {
  padding: 10px;
  vertical-align: top;
}

input[type="text"],
input[type="file"],
select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="file"] {
  padding: 3px;
}

select {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  width: 45%;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  margin-right: 10px;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

input[name="Cancel"] {
  background-color: #f44336;
}

input[name="Cancel"]:hover {
  background-color: #d32f2f;
}

/* Styling the table header and input labels */
td:first-child {
  font-weight: bold;
  color: #333;
}

td[colspan="2"] {
  text-align: center;
}

</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="288" border="1">
    <tr>
      <td width="136">Name</td>
      <td width="136"><label for="name"></label>
        <input type="text" name="name" id="name" />
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="email"></label>
      <input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td width="136">dob</td>
      <td width="136"><label for="date"></label>
        <input type="date" name="date" id="date" /> cm
    </tr>
    <tr>
      <td width="136">Height</td>
      <td width="136"><label for="height"></label>
        <input type="text" name="height" id="height" /> cm
    </tr>
    <tr>
      <td width="136">Weight</td>
      <td width="136"><label for="weight"></label>
        <input type="text" name="Weight" id="Weight" /> kg
    </tr>
    <tr>
      <td>Course</td>
      <td>
        <select name="selcourse" id="selcourse" >
        <option>Select</option>
        <?php
		$SelQry1="select * from tbl_course";
		$resultOne=$con->query($SelQry1);
		while($data=$resultOne->fetch_assoc())
		{
		?>
      <option value="<?php echo $data["course_id"]?>">
      <?php echo $data["course_name"]; ?>
      
      </option>
      <?php
		}
		?> 
      </select></td>
    </tr>
    
    <tr>
      <td>AcademicYear</td>
      <td>
        <select name="selyear" id="selyear" >
        <option>Select</option>
        <?php
		$SelQry1="select * from tbl_academicyear";
		$resultOne=$con->query($SelQry1);
		while($data=$resultOne->fetch_assoc())
		{
		?>
      <option value="<?php echo $data["acyear_id"]?>">
      <?php echo $data["acyear_name"]; ?>
      
      </option>
      <?php
		}
		?> 
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" /></td>
    </tr>
     <tr>
      <td>Proof</td>
      <td><label for="proof"></label>
      <input type="file" name="proof" id="proof" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="Submit" id="Submit" value="Submit" />
        <input name="Cancel" type="submit" id="Cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>	
</body>
</html>
 <script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }

</script>

