<?php
include("Head.php");
?>

<?php
    include("../Assets/connection/connection.php");

    ?>
    
    <table align="center" border="1">
        <tr>
            <th>Slno</th>
            <th>Feedback</th>
        </tr>
        <?php

            $i=1; 
            $selqry="select * from tbl_feedback";
            $result = $con->query($selqry);
                while($row=$result->fetch_assoc())
	            {
  		            ?>
  		            <tr>
    	                <td> <?php echo $i++; ?> </td>
                        <td><?php echo $row["feedback_content"]; ?></td>
                        
  		            </tr>
  		            <?php
                }

        ?>
    </table>
    <?php
include("Foot.php");
?>
