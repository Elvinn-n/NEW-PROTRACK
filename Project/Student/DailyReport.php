<?php
include("../Assets/connection/connection.php");
session_start();

$sid = $_SESSION['sid'];

if (isset($_POST["submit"])) {
    $details = $_POST["details"];
    $sleep = $_POST["sleep"];
    $food = $_POST["food"];
    $exercise = $_POST["exercise"];
    $sid = $_SESSION['sid'];

    $insQry = "insert into tbl_dailyreport(student_id,dailyreport_details,dailyreport_sleep,dailyreport_foodamount,dailyreport_exercise,dailyreport_date) values('$sid','$details','$sleep','$food','$exercise',CURDATE())";
    if ($con->query($insQry)) {
        echo "<script>alert('Inserted successfully!');</script>"; // Use JavaScript for better feedback
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daily Report</title>
<style>
body {
    font-family: sans-serif;
    margin: 20px;
    background-color: #f4f4f4;
}

form {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border-radius: 5px; /* Add border-radius to the table */
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.message-table {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body>

<form method="post" action="">
    <table>
        <tr>
            <th>Details</th>
            <td><input type="text" name="details" id="details" required></td>
        </tr>
        <tr>
            <th>Sleep</th>
            <td><select name="sleep" id="sleep" required>
                <?php
                for ($count = 0; $count <= 10; $count++) {
                    echo "<option value='$count'>$count</option>";
                }
                ?>
            </select></td>
        </tr>
        <tr>
            <th>Food</th>
            <td><select name="food" id="food" required>
                <?php
                for ($counts = 0; $counts <= 10; $counts++) {
                    echo "<option value='$counts'>$counts</option>";
                }
                ?>
            </select></td>
        </tr>
        <tr>
            <th>Enter the number of sets</th>
            <td><input type="text" name="exercise" id="exercise"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>


<?php
if (isset($_POST["messages"])) {
    // ... (Rest of your existing message display code)
}
?>

</body>
</html>