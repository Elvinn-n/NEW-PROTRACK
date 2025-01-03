<?php
include("../Assets/connection/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            overflow: hidden;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #e9e9e9;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        td {
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Students List</h1>
        <form id="form1" name="form1" method="post" action="">
            <table align="center" width="100%">
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
    </div>
</body>
</html>
