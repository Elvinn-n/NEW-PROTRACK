<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reply Form</title>
</head>
<body>

<form action="/submit_reply.php" method="post">
    <label for="reply">Your Reply:</label><br>
    <!-- Textarea for multi-line input -->
    <textarea id="reply" name="reply" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>