<?php
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
</head>
<body>
    <form action="" method="post">
        <label for="sel_student">Student: 
            <select name="sel_student" id="sel_student">
                <option value="">--select--</option>
                <?php
                $s = "SELECT * FROM tbl_student";
                $r = $con->query($s);
                while ($d = $r->fetch_assoc()) {
                    echo "<option value='{$d['student_id']}'>{$d['student_name']}</option>";
                }
                ?>
            </select>
        </label>
        <input type="submit" name="submit" value="Find">
    </form>

    <table>
        <tr>
            <td>#</td>
            <td>Student Name</td>
            <td>Number Of Passes</td>
            <td>Number Of Crosses</td>
        </tr>
        <?php 
        if (isset($_POST['sel_student']) && !empty($_POST['sel_student'])) {
            $studentId = intval($_POST['sel_student']);
            $sel = "
                SELECT s.student_name, 
                       SUM(CASE WHEN a.action_name = 'Pass' THEN 1 ELSE 0 END) AS passes,
                       SUM(CASE WHEN a.action_name = 'Cross' THEN 1 ELSE 0 END) AS crosses
                FROM tbl_livereport l 
                INNER JOIN tbl_student s ON l.student_id = s.student_id
                INNER JOIN tbl_action a ON l.action_id = a.action_id
                WHERE l.student_id = $studentId
                GROUP BY s.student_name
            ";

            $res = $con->query($sel);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                $i++;
                echo "<tr>
                    <td>{$i}</td>
                    <td>{$row['student_name']}</td>
                    <td>{$row['passes']}</td>
                    <td>{$row['crosses']}</td>
                </tr>";
            }
        }
        ?>
    </table>
</body>
</html>
