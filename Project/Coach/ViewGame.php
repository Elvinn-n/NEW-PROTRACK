<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Game Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #60baaf;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .button {
            background-color: #60baaf;
            color: #ffffff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }

        .button:hover {
            background-color: #50a79a;
        }
    </style>
</head>
<body>
    <?php include("../Assets/connection/connection.php"); ?>

    <h2 align="center">Game Details</h2><br>

    <table width="449" border="1" align="center">
        <tr>
            <th width="43">Slno</th>
            <th width="44">Date</th>
            <th width="70">Start Time</th>
            <th width="60">End Time</th>
            <th width="163">Action</th>
        </tr>

        <?php
        $i = 0;
        $selqry = "SELECT * FROM tbl_game";
        $result = $con->query($selqry);
        while($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td> <?php echo $i; ?> </td>
                <td><?php echo $row["game_date"]; ?></td>
                <td><?php echo $row["game_starttime"]; ?></td>
                <td><?php echo $row["game_endtime"]; ?></td>
                <td>
                    <a href="AssignPosition.php?gid=<?php echo $row["game_id"]?>" class="button">Assign Position</a>
                    <a href="LiveReport.php?gid=<?php echo $row["game_id"]?>" class="button">Live Report</a>
                </td>
            </tr>
            <?php
        }
        ?>	
    </table>
</body>
</html>