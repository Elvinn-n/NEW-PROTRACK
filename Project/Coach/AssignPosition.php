<html>
<body>

<?php
include("../Assets/connection/connection.php");
if(isset($_POST["submit"]))
{
	$ins = "insert into tbl_assignposition(student_id,position_id,game_id) values('".$_POST["student"]."','".$_POST["position"]."','".$_GET["gid"]."')";
	if($con->query($ins))
	{
		?>
		<script>
        alert("Data Inserted")
		
        </script>
		<?php
	}
}
		
?>	
<form name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Student</td>
      <td><label for="student"></label>
        <select name="student" id="student">
        <?php 
		$selQry1="Select *from tbl_student";
		$result1=$con->query($selQry1);
		while($data1=$result1->fetch_assoc())
		{
		?>
        	<option value="<?php echo $data1["student_id"];?>"><?php echo $data1["student_name"];?></option>
        <?php
		}
		?>
        
      </select></td>
    </tr>
    <tr>
      <td>Position</td>
      <td><label for="position"></label>
        <select name="position" id="position">
         <?php 
		 $selQry2="Select *from tbl_position";
		$result2=$con->query($selQry2);
		 while($data2=$result2->fetch_assoc())
		{
		?>
        	<option value="<?php echo $data2["position_id"];?>"><?php echo $data2["position_name"];?></option>
        <?php
		}
		?>
        
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>
  </table>
</form>

