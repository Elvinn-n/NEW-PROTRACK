<?php
include("../Assets/connection/connection.php");
	if(isset($_POST["submit"]))
	{
		$name=$_POST["txt_name"];
		$email=$_POST["txt_email"];
		$password=$_POST["txt_password"];
		$address=$_POST["txt_address"];
		
		
		$photo=$_FILES["photo"]['name'];
		$path=$_FILES['photo']['tmp_name'];
		move_uploaded_file($path,'../Assets/files/Coach/'.$photo);
		
		$proof=$_FILES["proof"]['name'];
		$path=$_FILES['proof']['tmp_name'];
		move_uploaded_file($path,'../Assets/files/Coach/'.$proof);
		
		$insQry="insert into tbl_coach(coach_name,coach_email,coach_password,coach_address,coach_proof,coach_photo)values('".$name."','".$email."','".$password."','".$address."','".$proof."','".$photo."')";
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
input[type="password"],
textarea,
input[type="file"] {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

textarea {
  resize: none;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #0056b3;
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
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="proof"></label>
      <input type="file" name="photo" id="photo" /></td>
    </tr>
    
    <tr>
      <td>Proof</td>
      <td><label for="proof"></label>
      <input type="file" name="proof" id="proof" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
