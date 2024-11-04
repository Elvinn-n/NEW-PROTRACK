<?php
include("../Assets/connection/connection.php");
session_start();

$sid=$_SESSION['sid'];

if(isset($_POST["submit"]))
	{
		$details=$_POST["details"];
		$sleep=$_POST["sleep"];
		$food=$_POST["food"];
		$exercise=$_POST["exercise"];
    $sid=$_SESSION['sid'];
		
		
		$insQry="insert into tbl_dailyreport(student_id,dailyreport_details,dailyreport_sleep,dailyreport_foodamount,dailyreport_exercise,dailyreport_date) values('".$sid."','".$details."','".$sleep."','".$food."','".$exercise."',CURDATE())";
		if($con->query($insQry)){
			echo "Inserted";
		}
		
	}



?>






<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<title>Students</title>
</head>


<body align="center">





  <form id="form1" name="form1" method="post" action="">
    <table align="center" width="200" border="1">
      <tr>
        <td width="87">Details</td>
        <td width="97"><input name ="details" type="text" id="details" value="" placeholder="Enter Details"></td>
      </tr>
      <tr>
        <td width="87">Sleep</td>
        <td><label for="sleep"></label>
          <select name="sleep" id="sleep">
            <?php
              while($count<=10) {
        
                echo "<option value='" . $count . "'>" . $count . "</option>";
                $count++;
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td width="87">Food</td>
        <td><label for="food"></label>
          <select name="food" id="food">
            <?php
              while($counts<=10) {
        
                echo "<option value='" . $counts . "'>" . $counts . "</option>";
                $counts++;
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td width="87">Exercise</td>
        <td width="97"><input name ="exercise" type="text" value="" placeholder="Enter no of exercise sets"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="submit" /> </td>
      
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="messages" id="messages" value="messages" /> </td>
      
      </tr>

              
            
    </table>
  </form>



  <br><br><br>
  <?php
    
    $f="";
    $SESSION['view']="";
    
    if(isset($_POST["messages"]))
    {
      $i=1;
      $f="read";
      $_SESSION['view']=$f;

      $selqry="select tbl_dailyreport.*, tbl_coach.coach_name from tbl_dailyreport INNER JOIN tbl_coach ON tbl_dailyreport.coach_id=tbl_coach.coach_id where dailyreport_review IS NOT NULL AND dailyreport_review <> '' AND student_id='".$sid."'";
      $result = $con->query($selqry);

      
  ?>
      <table align="center" width="200" border="1">
        <tr>
          <th>slno</th>
          <th>Date</th>
          <th>Coach</th>
          <th>Message</th>
        </tr>
        <tr>
        <?php
          while($row = $result->fetch_assoc()) {
            echo "<tr> <td>" . $i++ . "</td><td>" . $row['dailyreport_date'] . "</td><td>" . $row['coach_name'] . "</td><td>" . $row['dailyreport_review'] . "</td> </tr>";
          }
        ?>
        </tr>

      </table>

  <?php
    }
    else
    {
      $f="unread";
      $_SESSION['view']=$f;

    }


  ?>
  
</body>
</html>

