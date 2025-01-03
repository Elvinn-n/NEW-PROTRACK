
<?php
include("../Assets/connection/connection.php");

if(isset($_POST["submit"])) {
    $content = $_POST["content"];
    
    $insQry = "INSERT INTO tbl_feedback(feedback_content) VALUES('".$content."')";
    if($con->query($insQry)){
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
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 12px;
        }
    </style>
    <script>
        function validateForm() {
            const content = document.getElementById("content").value;
            const errorElement = document.getElementById("error");

            if (content.trim() === "") {
                errorElement.textContent = "Feedback content cannot be empty.";
                return false;
            }

            return true;
        }
    </script>
</head>
<body align="center">
    <h2>Complaint Form</h2>
    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
        <table align="center">
            <tr>
                <td>Content</td>
                <td><textarea name="content" id="content" placeholder="Enter feedback"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" id="submit" value="Submit">
                </td>
            </tr>
        </table>
        <div id="error" class="error"></div>
    </form>
</body>
</html>