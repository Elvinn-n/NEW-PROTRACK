<?php
include("../Assets/connection/connection.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Student Profile</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                background-color: white;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                width: 500px;
            }

            h1 {
                text-align: center;
                color: #333;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid #ddd;
            }

            th, td {
                padding: 10px;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }

            img {
                border-radius: 50%;
            }

            .button {
                padding: 10px 20px;
                margin: 5px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .button.edit {
                background-color: #4CAF50;
                color: white;
            }

            .button.submit {
                background-color: #008CBA;
                color: white;
                display: none;
            }

            .link {
                text-decoration: none;
                color: #008CBA;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <?php
            if (isset($_GET['sid'])) {
                $sid = $_GET['sid'];
                $sql = "SELECT * FROM tbl_student WHERE student_id = $sid";
                $result = $con->query($sql);
                $data = $result->fetch_assoc();
            }

            if (isset($_POST['submit'])) {
                $jerseyNumber = $_POST['jerseyNumber'];
                $updateQuery = "UPDATE tbl_student SET student_number = $jerseyNumber WHERE student_id = $sid";
                $con->query($updateQuery);
                header("Location: " . $_SERVER['PHP_SELF'] . "?" . http_build_query($_GET));
                exit();
            }
        ?>

        <div class="container">
            <h1>Profile</h1>
            <table>
                <tr>
                    <td colspan="2">
                        <img src='../Assets/files/student/<?php echo $data['student_photo'] ?>' width="100px" height="100px"/>
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $data['student_name'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $data['student_email'] ?></td>
                </tr>
                <tr>
                    <th>Jersey Number</th>
                    <td>
                        <!-- Form to update jersey number -->
                        <form method="POST" action="">
                            <span id="jerseyNumberDisplay"><?php echo $data['student_number']; ?></span>  
                            <input type="number" id="jerseyNumberInput" name="jerseyNumber" value="<?php echo $data['student_number']; ?>" style="display: none;">      
                            <button type="button" id="editButton" class="button edit" onclick="toggleEdit()">Edit</button>
                            <input type="submit" name="submit" value="Submit" id="submitButton" class="button submit">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td><a href="DailyReport.php?sid=<?php echo $sid; ?>" class="link">Daily Report</a></td>
                    <td><a href="PlayerStatus.php?sid=<?php echo $sid; ?>" class="link">Player Status</a></td>
                </tr>
            </table>
        </div>

        <script>
            function toggleEdit() {
                const display = document.getElementById("jerseyNumberDisplay");
                const input = document.getElementById("jerseyNumberInput");
                const editButton = document.getElementById("editButton");
                const submitButton = document.getElementById("submitButton");

                if (input.style.display === "none") {
                    input.style.display = "inline";
                    display.style.display = "none";
                    editButton.style.display = "none";
                    submitButton.style.display = "inline";
                } else {
                    input.style.display = "none";
                    display.style.display = "inline";
                    editButton.style.display = "inline";
                    submitButton.style.display = "none";
                }
            }
        </script>
    </body>
</html>