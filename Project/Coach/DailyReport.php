<?php
    include("../Assets/connection/connection.php");
    session_start();

    $sid = $_GET['sid'];
    $selqry = "SELECT * FROM tbl_dailyreport WHERE student_id='".$sid."'";
    $result = $con->query($selqry);
    $cid = $_SESSION['cid'];

    if (isset($_POST["btn_msg"])) {
        $date = $_POST['date'];
        $msg = $_POST['message'];
        $updQry = "UPDATE tbl_dailyreport SET coach_id='".$cid."', dailyreport_review='".$msg."' WHERE student_id='".$sid."' AND dailyreport_date='".$date."'";     
        if ($con->query($updQry))
            echo "Reply Successful";	 
    }
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <title>Daily Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        select, input[type="submit"], button {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
        }

        .container {
            width: 80%;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daily Report Details</h2>
        <form id="form1" name="form1" method="post" action="">
            <table>
                <tr>
                    <th>Details</th>
                    <th>Sleep Rate</th>
                    <th>Food Intake Rate</th>
                    <th>Exercise Rate</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['dailyreport_details']; ?></td>
                        <td><?php echo $row['dailyreport_sleep']; ?></td>
                        <td><?php echo $row['dailyreport_foodamount']; ?></td>
                        <td><?php echo $row['dailyreport_exercise']; ?></td>
                        <td><?php echo $row['dailyreport_date']; ?></td>
                        <td><button type="submit" name="reply" id="reply">Reply</button></td>
                    </tr>
                <?php } ?>
            </table>
        </form>

        <?php if(isset($_POST["reply"])) { ?>
            <br><br><br>
            <form id='form1' method='post' action=''>
                <table>
                    <tr>
                        <th>Reply</th>
                        <td>
                            <textarea id='message' name='message' placeholder='Enter the message'></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>
                            <label for="date"></label>
                            <select name="date" id="date">
                                <?php
                                    $sql = "SELECT dailyreport_date FROM tbl_dailyreport";
                                    $result = $con->query($sql);
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row['dailyreport_date'] . "'>" . $row['dailyreport_date'] . "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type='submit' id='btn_msg' name='btn_msg' value='Submit'>
                        </td>
                    </tr>
                </table>
            </form>
        <?php } ?>

        <br><br><br>

        <table>
            <tr>
                <th>Sl No</th>
                <th>Coach Name</th>
                <th>Student Name</th>
                <th>Date</th>
                <th>Messages</th>
                <th>Status</th>
            </tr>
            
            <?php
                $cname = $_SESSION['cname'];
                $i = 1;
                $viewqry = "SELECT tbl_dailyreport.*, tbl_student.student_name FROM tbl_dailyreport INNER JOIN tbl_student ON tbl_dailyreport.student_id=tbl_student.student_id WHERE tbl_dailyreport.student_id = " . $sid . " AND dailyreport_review IS NOT NULL";
                $view = $con->query($viewqry);
                while($rows = $view->fetch_assoc()) {
                    $s = $rows['dailyreport_review_status'] == '1' ? "Read" : "Unread";
                    echo "<tr><td>" . $i++ . "</td><td>" . $cname . "</td><td>" . $rows['student_name'] . "</td><td>" . $rows['dailyreport_date'] . "</td><td>" . $rows['dailyreport_review'] . "</td><td>" . $s . "</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>