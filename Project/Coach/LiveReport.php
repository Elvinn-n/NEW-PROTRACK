<?php
include("../Assets/connection/connection.php");
session_start();
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Live Report</title>
</head>
<body>


<?php

if (isset($_GET['gid'])) {
    $gid = $_GET['gid'];
} else {
    echo "No ID was passed.";
}



if(isset($_POST["submit"]))
{
  $details=$_POST["details"];
  $time=$_POST["time"];
  $student=$_POST["student"];
  $game=$gid;
  $coach=$_SESSION['cid'];
  $action=$_POST["action"];
  $rate=$_POST["rate"];

  
  $insQry="insert into tbl_livereport(livereport_details,livereport_time,student_id,game_id,coach_id,action_id,livereport_rate) values('".$details."','".$time."','".$student."','".$game."','".$coach."','".$action."','".$rate."')";

  if($con->query($insQry))
  {
    echo "inserted";	
  }
}

?>


<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="91">Details</td>
      <td width="93"><label for="details"></label>
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
            echo "<option value=''>No Students  Found</option>";
        }

        
        ?>
      </select></td>
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
            echo "<option value=''>No Actions  Found</option>";
        }

        
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="rate"></label>
        <select name="rate" id="rate">
        <?php
          while($count<=10) {
        
            echo "<option value='" . $count . "'>" . $count . "</option>";
            $count++;
            }
        ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>
  </table>
</form>
</body>
</html>





