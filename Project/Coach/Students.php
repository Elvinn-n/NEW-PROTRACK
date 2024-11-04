<?php
include("../Assets/connection/connection.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<title>Students</title>
</head>


<body align="center">





    <h1>Students List </h1>
    <form id="form1" name="form1" method="post" action="">
        <table align="center" width="200" border="1">
            <tr>
                <th>Sl No</th>
                <th>Student Name</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_student";
            $result = $con->query($sql);
            $i=1;
            while($row = $result->fetch_assoc()) {
                echo "<tr> <td>" . $i++ . "</td> <td><a href='StudentProfile.php?sid=" . $row['student_id'] . "'>" . $row['student_name'] . "</td> </tr>";
            }
            
            ?>
        </table>
    </form>
</body>
</html>

