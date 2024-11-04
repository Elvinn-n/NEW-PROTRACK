<?php
include("../Assets/connection/connection.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Student Profile</title>
    </head>
    <body>

        <?php
            if (isset($_GET['sid'])) {
    
                $sid = $_GET['sid'];
                $sql = "SELECT * FROM tbl_student WHERE student_id = $sid";
                $result = $con->query($sql);
                $data = $result->fetch_assoc();
            }
        ?>
    


        <div align="center">
            <h1 align="center"> Profile</h1>
            <table width="414" height="306" border="1">
                <tr>
                    <td height="156" colspan="2" align="center"><img src='../Assets/files/student/<?php echo $data['student_photo'] ?>' width="100px" height="100px"/></td>
                </tr>

                <tr>
                    <td  height="51">Name</td>
                    <td width="215" ><?php echo $data['student_name'] ?> </td>
                </tr>
                <tr>
                    <td height="52">Email</td>
                    <td><?php echo $data['student_email'] ?> </td>
                </tr>
                <tr>
                    <td height="35"><a href="DailyReport.php?sid=<?php echo $sid; ?>">Daily Report</a></td>
                    <td height="35"><a href="ChangePassword.php">Change Password</a></td>
                </tr>
            </table>
        </div>
        




    </body>
</html>