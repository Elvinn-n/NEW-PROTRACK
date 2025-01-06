<?php
    session_start();
    include("../Assets/Connection/Connection.php");
    $selQuery="select * from tbl_coach where coach_id='".$_SESSION['cid']."'";
    $result=$con->query($selQuery);
    $data=$result->fetch_assoc();
    
    if(isset($_POST["update_profile"]))
    {
        $upQry="update tbl_coach set coach_name='".$_POST["new_name"]."', coach_email='".$_POST["new_email"]."' where coach_id=".$_SESSION['cid'];
        if($con->query($upQry))
        {
            ?> <script>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #60baaf;
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
</style>
</head>

<body>
<div class="form-container">
    <h2>Update Profile</h2>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td><input name="new_name" type="text" value="<?php echo $data['coach_name'] ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input name="new_email" type="text" value="<?php echo $data['coach_email'] ?>"></td> 
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="update_profile" id="update_profile" value="Update Profile" /></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>