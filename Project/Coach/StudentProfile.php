<?php
include("../Assets/connection/connection.php");
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Student Profile</title>
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
    


        <div align="center">
            <h1 align="center"> Profile</h1>
            <table width="414" height="306" border="1">
                <tr>
                    <td height="156" colspan="2" align="center"><img src='../Assets/files/student/<?php echo $data['student_photo'] ?>' width="100px" height="100px"/></td>
                </tr>

                <tr>
                    <td  height="51">Name</td>
                    <td width="215" ><?php echo $data['student_name'] ?> </td>
                </tr>
                <tr>
                    <td height="52">Email</td>
                    <td><?php echo $data['student_email'] ?> </td>
                </tr>
                <tr>
                    <td height="52">Jersey Number</td>
                    <td>
                    <!-- Form to update jersey number -->
                    <form method="POST" action="">
                        <span id="jerseyNumberDisplay"><?php echo $data['student_number']; ?></span>  
                        <input type="number" id="jerseyNumberInput" name="jerseyNumber" value="<?php echo $data['student_number']; ?>" style="display: none;">      
                        <button type="button" id="editButton" onclick="toggleEdit()">Edit</button>
                        <input type="submit" name="submit" value="submit" id="submitButton" style="display: none;">
                    </form>
                    </td>
                </tr>
                <tr>
                    <td height="35"><a href="DailyReport.php?sid=<?php echo $sid; ?>">Daily Report</a></td>
                    <td height="35"><a href="PlayerStatus.php?sid=<?php echo $sid; ?> " >Player Status</a></td>
                </tr>
            </table>
        </div>
        




    </body>
</html>

<script>
  function toggleEdit() {
    const display = document.getElementById("jerseyNumberDisplay");
    const input = document.getElementById("jerseyNumberInput");
    const editButton = document.getElementById("editButton");
    const submitButton = document.getElementById("submitButton");

    if (input.style.display === "none") {
      input.style.display = "inline";  // Show the input field
      display.style.display = "none";  // Hide the display value
      editButton.style.display = "none";  // Hide the edit button
      submitButton.style.display = "inline";  // Show the submit button
    } else {
      input.style.display = "none";  // Hide the input field
      display.style.display = "inline";  // Show the display value
      editButton.style.display = "inline";  // Show the edit button
      submitButton.style.display = "none";  // Hide the submit button
    }
  }
</script>