<?php
    include("../Assets/connection/connection.php");

    session_start();

    $sid=$_GET['sid'];
    $selqry="select * from tbl_dailyreport where student_id='".$sid."'";
    $result = $con->query($selqry);
    $cid=$_SESSION['cid'];
    

    if(isset($_POST["btn_msg"]))
    {
        $date=$_POST['date'];
        $msg=$_POST['message'];
        $updQry="UPDATE tbl_dailyreport SET coach_id='".$cid."',dailyreport_review='".$msg."' WHERE student_id='".$sid."'AND dailyreport_date='".$date."'";     
        if($con->query($updQry))
            echo "Reply Successful";	 

    }

    
  


?>






<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<title>Daily Report</title>
</head>


<body align="center">


    <h2> Daily Report Details<h2>


  <form id="form1" name="form1" method="post" action="">
    <table align="center" width="200" border="1">
        <tr>
            <th>Details</th>
            <th>Sleep Rate</th>
            <th>Food Intake Rate</th>
            <th>Exercise Rate</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row['dailyreport_details']."</td><td>".$row['dailyreport_sleep']."</td><td>".$row['dailyreport_foodamount']."</td><td>".$row['dailyreport_exercise']."</td><td>".$row['dailyreport_date']."</td><td><input type='submit' value='reply' name='reply' id='reply'></td></tr>";
            }
        ?>

               
               
            

              
            
    </table>
  </form>
</body>
</html>

<?php
    if(isset($_POST["reply"]))
	{   
?>
        <br><br><br>
		<form id='form1' method='post' action=''>
            <table align='center' width='200' border='1'>
            <tr>
                <th> Reply </th>
                <td>
		            <textarea id='message' name='message' placeholder='Enter the message'></textarea>
                </td>
            </tr>
            <tr>
                <th> Date </th>
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
                </select></td>
                </td>
            </tr>
            <tr>
            <td>
		        <input type='submit' id='btn_msg' name='btn_msg' value='submit'>
            </td>
            </tr>
        </table>
    </form>
<?php	
    }
?>

<br><br><br>

<table>
    <tr>
        <th>sl no</th>
        <th>Coach name</th>
        <th>Student name</th>
        <th>Date</th>
        <th>Messages</th>
        <th>Status</th>
    </tr>
    
    <?php

        $cname=$_SESSION['cname'];
        $f=$_SESSION['view'];
        $i=1;

        $viewqry="select tbl_dailyreport.*, tbl_student.student_name from tbl_dailyreport INNER JOIN tbl_student ON tbl_dailyreport.student_id=tbl_student.student_id where tbl_dailyreport.student_id = " . $sid . " AND dailyreport_review IS NOT NULL";
        $view=$con->query($viewqry);
        while($rows = $view->fetch_assoc()) {
            echo "<tr> <td>" . $i++ . "</td><td>" . $cname . "</td><td>" . $rows['student_name'] . "</td><td>" . $rows['dailyreport_date'] . "</td><td>" . $rows['dailyreport_review'] . "</td><td>" . $f . "</td> </tr>";
        }
    ?>
</table>