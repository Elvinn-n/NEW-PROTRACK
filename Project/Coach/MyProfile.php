<?php
    session_start();
    include("../Assets/Connection/Connection.php");
    $selQuery="select * from tbl_coach where coach_id='".$_SESSION['cid']."'";
    $result=$con->query($selQuery);
    $data=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #60bab0;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        width: 400px;
    }

    h1 {
        text-align: center;
        color: #333333;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        width: 30%;
        background-color: #f2f2f2;
        border-bottom: 1px solid #ddd;
    }

    td {
        width: 70%;
        border-bottom: 1px solid #ddd;
    }

    img {
        border-radius: 50%;
        margin-bottom: 20px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .button {
        background-color: #60baaf;
        color: #ffffff;
        padding: 8px 12px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        margin: 10px auto;
    }

    .button:hover {
        background-color: #50a79a;
    }

    .button-container {
        display: flex;
        justify-content: space-around;
    }
</style>
</head>

<body>

<div class="form-container">
  <h1>Profile</h1>

  <table>
    <tr>
      <td colspan="2" align="center">
        <img src='../Assets/files/Coach/<?php echo $data['coach_photo'] ?>' width="100px" height="100px"/>
      </td>
    </tr>
    <tr>
      <th>Name</th>
      <td><?php echo $data['coach_name'] ?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $data['coach_email'] ?></td>
    </tr>
    <tr>
      <td colspan="2" class="button-container">
        <a href="EditProfile.php" class="button">Edit Profile</a>
        <a href="ChangePassword.php" class="button">Change Password</a>
      </td>
    </tr>
  </table>
</div>

</body>
</html>