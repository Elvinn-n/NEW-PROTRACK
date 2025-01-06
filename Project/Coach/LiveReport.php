<?php
include("../Assets/connection/connection.php");
session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live Report</title>
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
        max-width: 600px;
        width: 100%;
    }

    h2 {
        color: #333;
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

    textarea, input[type="time"], select {
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

    .error {
        color: red;
        font-size: 12px;
        margin-top: 10px;
    }
</style>
<script>
    function validateForm() {
        let details = document.getElementById("details").value;
        let time = document.getElementById("time").value;
        let student = document.getElementById("student").value;
        let action = document.getElementById("action").value;
        let rate = document.getElementById("rate").value;
        let errorElement = document.getElementById("error");

        let errorMessage = "";
        if (details.trim() === "") {
            errorMessage += "Details cannot be empty.<br>";
        }
        if (time.trim() === "") {
            errorMessage += "Time cannot be empty.<br>";
        }
        if (student.trim() === "") {
            errorMessage += "Student must be selected.<br>";
        }
        if (action.trim() === "") {
            errorMessage += "Action must be selected.<br>";
        }
        if (rate.trim() === "") {
            errorMessage += "Rate must be selected.<br>";
        }

        if (errorMessage !== "") {
            errorElement.innerHTML = errorMessage;
            return false;
        }
        return true;
    }
</script>
</head>
<body>

<div class="form-container">
    <h2>Live Report</h2>

    <?php
    if (isset($_GET['gid'])) {
        $gid = $_GET['gid'];
    } else {
        echo "No ID was passed.";
    }

    if(isset($_POST["submit"]))
    {
        $details = $_POST["details"];
        $time = $_POST["time"];
        $student = $_POST["student"];
        $game = $gid;
        $coach = $_SESSION['cid'];
        $action = $_POST["action"];
        $rate = $_POST["rate"];

        $insQry = "insert into tbl_livereport(livereport_details,livereport_time,student_id,game_id,coach_id,action_id,livereport_rate) values('".$details."','".$time."','".$student."','".$game."','".$coach."','".$action."','".$rate."')";

        if($con->query($insQry))
        {
            echo "Inserted";    
        }
    }
    ?>

    <form name="form1" method="post" action="" onsubmit="return validateForm()">
        <table>
            <tr>
                <td>Details</td>
                <td><label for="details"></label>
                <textarea name="details" id="details" cols="45" rows="5"></textarea></td>
            </tr>
            <tr>
                <td>Time</td>
                <td><label for="time"></label>
                <input type="time" name="time" id="time" step="1"></td>
            </tr>
            <tr>
                <td>Student</td>
                <td><label for="student"></label>
                    <select name="student" id="student">
                    <?php
                    $sql = "SELECT student_id, student_name FROM tbl_student";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['student_id'] . "'>" . $row['student_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No Students Found</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Action</td>
                <td><label for="action"></label>
                    <select name="action" id="action">
                    <?php
                    $sql = "SELECT action_id, action_name FROM tbl_action";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['action_id'] . "'>" . $row['action_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No Actions Found</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Rate</td>
                <td><label for="rate"></label>
                    <select name="rate" id="rate">
                    <?php
                    $count = 1;
                    while($count <= 10) {
                        echo "<option value='" . $count . "'>" . $count . "</option>";
                        $count++;
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="submit" id="submit" value="Submit"></td>
            </tr>
        </table>
        <div id="error" class="error"></div>
    </form>
</div>

</body>
</html>