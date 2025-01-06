<?php
include("../Assets/connection/connection.php");

if (isset($_POST["submit"])) {
    $content = $_POST["content"];

    $insQry = "insert into tbl_feedback(feedback_content) values('" . $content . "')";
    if ($con->query($insQry)) {
        echo "Inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
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

        input[type="text"], textarea {
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
    <script>
        function validateForm() {
            var content = document.getElementById("content").value;
            var error = "";

            if (content == "") {
                error += "Feedback content is required.\n";
            }

            if (error != "") {
                alert(error);
                return false;
            }
            return true;
        }
    </script>
</head>
<body align="center">

<div class="container">
    <h2>Feedback Form</h2>

    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
        <table align="center" width="200" border="1">
            <tr>
                <td width="87">Content</td>
                <td width="97"><textarea name="content" id="content" placeholder="Enter feedback"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" id="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>