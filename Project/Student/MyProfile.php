<?php
	session_start();
	include("../Assets/Connection/Connection.php");
	$selQuery="select * from tbl_student where student_id='".$_SESSION['sid']."'";
	$result=$con->query($selQuery);
	$data=$result->fetch_assoc();
	
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: #60bab0;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; 
}

h2 {
    text-align: center;
    color: #ffffff; 
    margin-bottom: 20px; 
}

table {
    border-collapse: collapse;
    width: 414px; 
    background-color: #ffffff;
    border-radius: 5px;
    overflow: hidden;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

img {
    border-radius: 50%;
    margin-bottom: 10px;
}

a {
    text-decoration: none;
    color: #60bab0;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>

<div style="text-align: center;"> 
</div>

<table width="414" height="306" border="1">
    <tr>
        <td height="156" colspan="2" align="center">
            <img src='../Assets/files/student/<?php echo $data['student_photo'] ?>' width="100px" height="100px"/>
        </td>
    </tr>

    <tr>
        <td height="51">Name</td>
        <td width="215"><?php echo $data['student_name'] ?></td>
    </tr>
    <tr>
        <td height="52">Email</td>
        <td><?php echo $data['student_email'] ?></td>
    </tr>
    <tr>
        <td height="35"><a href="EditProfile.php">Edit Profile</a></td>
        <td height="35"><a href="ChangePassword.php">Change Password</a></td>
    </tr>
</table>

</body>
</html>