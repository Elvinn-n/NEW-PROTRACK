<?php
include("../Assets/connection/connection.php");
session_start();

$cid = $_SESSION['cid'];
/*
$selQry = "select * from tbl_coach where student_id='".$cid."'";
$result = $con->query($selQry);
$data = $result->fetch_assoc();*/

$user = "coach";
if (isset($_POST["submit"])) {
    $_SESSION['complaint'] = $user;
    $title = $_POST["title"];
    $content = $_POST["content"];

    $insQry = "insert into tbl_complaint(complaint_title,complaint_content,complaint_date,coach_id) values('".$title."','".$content."',CURDATE(),'".$cid."')";
    if ($con->query($insQry)) {
        echo "Inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Complaint Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #333;
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
            background-color: #f4f4f4;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #60baaf;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #50a79a;
        }

        .reply-table {
            margin-top: 30px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
    <script>
        function validateForm() {
            var title = document.getElementById("title").value;
            var content = document.getElementById("content").value;
            var error = "";

            if (title == "") {
                error += "Title is required.\n";
            }
            if (content == "") {
                error += "Content is required.\n";
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
    <h2>Complaint Form</h2>

    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm()">
        <div class="error" id="error"></div>
        <table>
            <tr>
                <td width="87">Title</td>
                <td width="97"><input name="title" type="text" id="title" value="" placeholder="Enter title"></td>
            </tr>
            <tr>
                <td width="87">Content</td>
                <td width="97"><textarea name="content" type="textarea" id="content" value="" placeholder="Enter content"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" name="submit" id="submit" value="Submit">
                    <input type="submit" name="replys" id="replys" value="replys">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST["replys"])) {
    ?>
        <div class="reply-table">
            <h3>Reply messages</h3>

            <table>
                <tr>
                    <th>Slno</th>
                    <th>Title</th>
                    <th>Message</th>
                </tr>
                <?php
                $i = 1;
                $selqry = "select * from tbl_complaint where coach_id='".$cid."' and complaint_reply is not null";
                $result = $con->query($selqry);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td><?php echo $row["complaint_title"]; ?></td>
                        <td><?php echo $row["complaint_reply"]; ?></td>                        
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>