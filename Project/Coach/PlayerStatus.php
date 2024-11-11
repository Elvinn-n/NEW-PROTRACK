<?php
include("../Assets/connection/connection.php");
session_start();

$sid=$_GET['sid'];

$selQry="select * from tbl_student where student_id='".$sid."'";
$result=$con->query($selQry);
$data=$result->fetch_assoc();

// course name
$courseqry="select course_name from tbl_course where course_id='".$data['course_id']."'";
$courseresult=$con->query($courseqry);
$coursedata=$courseresult->fetch_assoc();

// count of games played
$gameqry="SELECT COUNT(DISTINCT game_id) AS unique_games_count FROM tbl_livereport WHERE student_id = '".$sid."'";
$gameresult = $con->query($gameqry);
$gamedata = $gameresult->fetch_assoc();

// count of actions
$actionqry="SELECT tbl_livereport.*, tbl_action.action_name FROM tbl_livereport JOIN tbl_action ON tbl_livereport.action_id = tbl_action.action_id WHERE tbl_livereport.student_id = '".$sid."'";
$actionresult = $con->query($actionqry);
$goals=0;
$assists=0;
$passes=0;
$crosses=0;
$lofted_passes=0;
$through=0;
$shot=0;
$saves=0;
$interceptions=0;
while($actiondata = $actionresult->fetch_assoc()) {
  if($actiondata['action_name'] == "Goal")                       // No of goals scored
  {
    $goals = $goals+1;
  }
  else if($actiondata['action_name'] == "Assist")                  // No of assists
  {
    $assists = $assists+1;
  }
  else if($actiondata['action_name'] == "Pass")                         // No of passes
  {
    $passes = $passes+1;                                  
  } 
  else if($actiondata['action_name'] == "Cross")                         // No of crosses   
  {
    $crosses = $crosses+1;
  } 
  else if($actiondata['action_name'] == "lofted Pass")                   // No of lofted passes        
  {
    $lofted_passes = $lofted_passes+1;  
  } 
  else if($actiondata['action_name'] == "through")                       // No of through passes
  {
    $through = $through+1;
  } 
  else if($actiondata['action_name'] == "shot")                          // No of shots   
  {
    $shot = $shot+1;
  } 
  else if($actiondata['action_name'] == "save")                          // No of saves
  {
    $saves = $saves+1;
  } 
  else if($actiondata['action_name'] == "interception")                  // No of interceptions
  {
    $interceptions = $interceptions+1;
  }
  else
  { 
    null;
  }
}

// positions
$posqry="SELECT tbl_assignposition.*, tbl_position.position_name
FROM tbl_assignposition
JOIN tbl_position ON tbl_assignposition.position_id = tbl_position.position_id
WHERE tbl_assignposition.student_id = '".$sid."'";
$posresult = $con->query($posqry);
$positions=$posresult->fetch_assoc();



?>





<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Football Player Stats Dashboard</title>
  <link rel="stylesheet" href="PlayerStatus.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="player-card">
    <!-- Player Info Section -->
    <div class="player-info">
      <img src='../Assets/files/student/<?php echo $data['student_photo'] ?>' width="100px" height="100px" ></img>
      <h2><?php echo $data['student_name'] ?></h2>
      <div class="details">
        <p><span><i class="fas fa-hashtag"></i> Number:</span> <?php echo $data['student_number'] ?></p>
        <p><span><i class="fas fa-futbol"></i> Position:</span> <?php echo $positions['position_name'] ?></p>
        <p><span><i class="fas fa-ruler-vertical"></i> Height:</span> <?php echo $data['student_height'] ?> cm</p>
        <p><span><i class="fas fa-weight"></i> Weight:</span> <?php echo $data['student_weight'] ?> kg</p>
        <p><span><i class="fas fa-birthday-cake"></i> DOB:</span> <?php echo $data['student_dob'] ?></p>
        <p><span><i class="fas fa-flag"></i> Course:</span> <?php echo $coursedata['course_name'] ?> </p>
      </div>
    </div>
    
    <!-- Player Stats Section -->
    <div class="player-stats">
      <div class="stat-header">Season Stats</div>
      <div class="stat">
        <span>Total Games</span>
        <span class="stat-value"><?php echo $gamedata['unique_games_count'];?></span>
      </div>
      <?php
        if($positions['position_name'] == "Forward"||$positions['position_name'] == "Midfielder")
        {
      ?>  
        
      <div class="stat">
        <span>Total Goals</span>
        <span class="stat-value"><?php echo $goals ?></span>
      </div>
      <div class="stat">
        <span>Total Assists</span>
        <span class="stat-value"><?php echo $assists ?></span>
      </div>
      
      <?php
        }
        elseif($positions['position_name'] == "Defender"||$positions['position_name'] == "Defensive Midfielder")
        {
      ?>  
        
      <div class="stat">
        <span>Total Interceptions</span>
        <span class="stat-value"><?php echo $interceptions ?></span>
      </div>
      <div class="stat">
        <span>Total Passes</span>
        <span class="stat-value"><?php echo $passes ?></span>
      </div>
      
      <?php
        }
      else if($positions['position_name'] == "Goal Keeper")
      {
    ?>  
      
    <div class="stat">
      <span>Total Saves</span>
      <span class="stat-value"><?php echo $saves ?></span>
    </div>
    <div class="stat">
      

    </div>
    
    <?php
      }
    ?>
      
      <!-- Chart Section -->
      <div class="chart">
        <h3>Goals by Season</h3>
        <div class="bar-chart" id="barChart"></div>
        <div class="bar-labels">
          <span>2010/11</span>
          <span>2011/12</span>
          <span>2012/13</span>
          <span>2013/14</span>
          <span>2014/15</span>
          <span>2015/16</span>
          <span>2016/17</span>
        </div>
      </div>
    </div>
  </div>

  <script src="PlayerStatus.js"></script>
</body>
</html>
