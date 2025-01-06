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
    <table width="200" border="1" class="form-table">
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
                </select>
            </td>
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
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><input type="submit" name="submit" id="submit" value="Submit"></td>
        </tr>
    </table>
</form>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-table {
        width: 100%;
        max-width: 400px;
        border-collapse: collapse;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    select {
        width: 100%;
        padding: 10px;
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
</style>

</body>
</html>