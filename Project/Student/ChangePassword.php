<?php
    session_start();
    include("../Assets/Connection/Connection.php");
    $selQuery="select * from tbl_student where student_id='".$_SESSION['sid']."'";
    $result=$con->query($selQuery);
    $data=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Change Password</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 600px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h2 {
        color: #333;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #60bab0;
        color: #ffffff;
        text-align: center;
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 10px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #60bab0;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #50a79a;
    }

    .message {
        color: red;
        text-align: center;
        margin-top: 10px;
    }
</style>
</head>

<body align="center">

<div class="container">
    <h2>Change Password</h2>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Enter Current Password</td>
                <td><input type="password" name="txt_current" id="txt_current" /></td>
            </tr>
            <tr>
                <td>Enter New Password</td>
                <td><input type="password" name="txt_new" id="txt_new" /></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="txt_confirm" id="txt_confirm" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" id="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
    if(isset($_POST["submit"])){
        $p=$_POST["txt_current"];
        $n=$_POST["txt_new"];
        $c=$_POST["txt_confirm"];
    
        if($p==$data['student_password']) {
            if($n==$c) {
                $updQry="UPDATE tbl_student SET student_password='".$n."' WHERE student_id='".$_SESSION['sid']."'";     
                if($con->query($updQry)) {
                    echo "<div class='message'>Password updated successfully.</div>";
                }	
            } else {
                echo "<div class='message'>New password and Confirm Password do not match.</div>";
            }
        } else {
            echo "<div class='message'>You have entered incorrect current password.</div>";
        }
    }
?>
</body>
</html>