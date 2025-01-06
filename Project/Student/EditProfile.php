<?php
    session_start();
    include("../Assets/Connection/Connection.php");
    $selQuery="select * from tbl_student where student_id='".$_SESSION['sid']."'";
    $result=$con->query($selQuery);
    $data=$result->fetch_assoc();
    
    if(isset($_POST["update_profile"]))
    {
        $upQry="update tbl_student set student_name='".$_POST["new_name"]."', student_email='".$_POST["new_email"]."' where student_id=".$_SESSION['sid'];
        if($con->query($upQry))
        {
            ?> 
            <script>
             alert("details updated")
             window.location="MyProfile.php"
            </script>
            <?php 
        }
        else
        {
            echo "not updated";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Profile Update</title>
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

    input[type="text"] {
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
    }

    input[type="submit"]:hover {
        background-color: #50a79a;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }
</style>
</head>

<body align="center">

<div class="container">
    <h2>Update Profile</h2>

    <form id="form1" name="form1" method="post" action="">
        <table align="center" width="200" border="1">
            <tr>
                <td width="87">Name</td>
                <td width="97"><input name="new_name" type="text" value="<?php echo $data['student_name'] ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input name="new_email" type="text" value="<?php echo $data['student_email'] ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="update_profile" id="update_profile" value="Update Profile">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>