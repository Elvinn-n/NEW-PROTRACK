<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DateTime Input Form</title>
</head>
<body>

<form action="../Admin/process_datetime.php" method="post">
    <label for="event_date">Event Date:</label><br>
    <input type="date" id="event_date" name="event_date"><br>
    
    <label for="start_time">Start Time:</label><br>
    <!-- datetime-local input for selecting both date and time for the start time -->
    <input type="datetime-local" id="start_time" name="start_time"><br>
    
    <label for="end_time">End Time:</label><br>
    <!-- datetime-local input for selecting both date and time for the end time -->
    <input type="datetime-local" id="end_time" name="end_time"><br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>