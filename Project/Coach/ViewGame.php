<html>
<body>

<?php
include("../Assets/connection/connection.php");



?>

<h2 align="center"> Game Details </h2><br>

<table width="449" border="1" align="center">
  <tr>
    <th width="43">Slno</th>
    <th width="44">Date</th>
    <th width="70">Start Time</th>
    <th width="60">End Time</th>
    <th width="163">Action</th>
  </tr>

<?php
$i=0;
	$selqry="SELECT * FROM tbl_game";
	$result=$con->query($selqry);
	while($row=$result->fetch_assoc())
	{
		$i=$i+1;
  		?>
  		<tr>
    	<td> <?php echo $i; ?> </td>
    	<td><?php echo $row["game_date"]; ?></td>
    	<td><?php echo $row["game_starttime"]; ?></td>
    	<td><?php echo $row["game_endtime"]; ?></td>
        <td> <a href="AssignPosition.php?gid=<?php echo $row["game_id"]?>"> assign </a> /
        <a href="LiveReport.php?gid=<?php echo $row["game_id"]?>"> Live Report </a></td>
 

  		</tr>
        <?php
  	}
	?>	
    
</table>
</body>
</html>