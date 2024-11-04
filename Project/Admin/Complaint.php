<?php
    include("../Assets/connection/connection.php");

    session_start();

    $user=$_SESSION['complaint'];
    ?>
    
    <table align="center" border="1">
        <tr>
            <th>Slno</th>
            <th>Name</th>
            <th>Role</th>
            <th>Complaint Title</th>
            <th>Complaint Content</th>
            <th>Complaint Date</th>
            <th>Action</th>
        </tr>
        <?php

            $i=1;
            if($user=="student")
            {   
                
                $selqry="select c.*,s.student_name from tbl_complaint c join tbl_student s on c.student_id=s.student_id where coach_id = 0";
                $result = $con->query($selqry);
                while($row=$result->fetch_assoc())
	            {
  		            ?>
  		            <tr>
    	                <td> <?php echo $i++; ?> </td>
                        <td><?php echo $row["student_name"]; ?></td>
                        <td>student</td>
    	                <td><?php echo $row["complaint_title"]; ?></td>
    	                <td><?php echo $row["complaint_content"]; ?></td>
    	                <td><?php echo $row["complaint_date"]; ?></td>
                        <td>
                            <form action="" method="post">                                
    	                        <input type="submit" value="reply" name="reply" id="reply">
                                <input type="hidden" value="<?php echo $row["complaint_id"]; ?>" name="complaint_id" id="complaint_id"></td>
                            </form>
                        </td>
  		            </tr>
  		            <?php
                }
            }
            if($user=="coach")
            {
                $selqry="select c.*,s.coach_name from tbl_complaint c join tbl_coach s on c.coach_id=s.coach_id where student_id = 0";
                $result = $con->query($selqry);
                while($row=$result->fetch_assoc())
	            {
  		            ?>
  		            <tr>
    	                <td> <?php echo $i++; ?> </td>
                        <td><?php echo $row["coach_name"]; ?></td>
                        <td>student</td>
    	                <td><?php echo $row["complaint_title"]; ?></td>
    	                <td><?php echo $row["complaint_content"]; ?></td>
    	                <td><?php echo $row["complaint_date"]; ?></td>
                        <td>
                            <form action="" method="post">
    	                        <input type="submit" value="reply" name="reply" id="reply">
                                <input type="hidden" value="<?php echo $row["complaint_id"]; ?>" name="complaint_id" id="complaint_id"></td>
                            </form>
                        </td>
  		            </tr>
  		            <?php
                }
            }

        ?>
    </table>


    <?php
    if(isset($_POST["reply"]))
    {   
        $complaint_id=$_POST["complaint_id"];
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
                        <td>
                            <input type='hidden' id='complaint_id' name='complaint_id' value='<?php echo $complaint_id; ?>'>
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

    
    
    
    if(isset($_POST["btn_msg"]))
    {
        $complaint_id=$_POST["complaint_id"];
        $message=$_POST["message"];
        
        $updQry="UPDATE tbl_complaint SET complaint_reply='".$message."' WHERE complaint_id='".$complaint_id."'";
        if($con->query($updQry))
            echo "Reply Successful";
    }