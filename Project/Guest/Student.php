<?php
include("../Assets/Connection/Connection.php");

if (isset($_POST["Submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $course = $_POST["selcourse"];
    $year = $_POST["selyear"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $dob = $_POST["date"];

    $photo = $_FILES["photo"]["name"];
    $temp = $_FILES["photo"]["tmp_name"];
    $proof = $_FILES["proof"]["name"];
    $tempProof = $_FILES["proof"]["tmp_name"];

    // Server-side validation
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }
    if ($course == "Select") {
        $errors[] = "Please select a course.";
    }
    if ($year == "Select") {
        $errors[] = "Please select an academic year.";
    }
    if (!is_numeric($weight) || $weight <= 0) {
        $errors[] = "Weight must be a positive number.";
    }
    if (!is_numeric($height) || $height <= 0) {
        $errors[] = "Height must be a positive number.";
    }
    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }
    if (empty($photo)) {
        $errors[] = "Photo is required.";
    }
    if (empty($proof)) {
        $errors[] = "Proof is required.";
    }

    if (empty($errors)) {
        move_uploaded_file($temp, "../Assets/files/student/" . $photo);
        move_uploaded_file($tempProof, "../Assets/files/student/" . $proof);

        $insQry = "INSERT INTO tbl_student(student_name, student_email, student_password, student_dob, student_height, student_weight, course_id, acyear_id, student_photo, student_proof) VALUES ('$name', '$email', '$password', '$dob', '$height', '$weight', '$course', '$year', '$photo', '$proof')";

        if ($con->query($insQry)) {
            echo "Inserted";
        } else {
            echo "Error: " . $con->error;
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Registration Form</title>
<style>
  /* Reset some default margins and paddings */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  background-color: #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

form {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
}

table {
  width: 100%;
  border: none;
}

td {
  padding: 10px;
  vertical-align: top;
}

input[type="text"],
input[type="file"],
select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="file"] {
  padding: 3px;
}

select {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  width: 45%;
  padding: 10px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  margin-right: 10px;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

input[name="Cancel"] {
  background-color: #f44336;
}

input[name="Cancel"]:hover {
  background-color: #d32f2f;
}

td:first-child {
  font-weight: bold;
  color: #333;
}

td[colspan="2"] {
  text-align: center;
}
</style>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function validateForm() {
  let name = document.getElementById('name').value;
  let email = document.getElementById('email').value;
  let password = document.getElementById('password').value;
  let dob = document.getElementById('date').value;
  let height = document.getElementById('height').value;
  let weight = document.getElementById('Weight').value;
  let course = document.getElementById('selcourse').value;
  let year = document.getElementById('selyear').value;
  let photo = document.getElementById('photo').value;
  let proof = document.getElementById('proof').value;

  if (name === '') {
    alert('Name is required.');
    return false;
  }
  if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
    alert('Invalid email format.');
    return false;
  }
  if (password.length < 6) {
    alert('Password must be at least 6 characters long.');
    return false;
  }
  if (dob === '') {
    alert('Date of birth is required.');
    return false;
  }
  if (isNaN(height) || height <= 0) {
    alert('Height must be a positive number.');
    return false;
  }
  if (isNaN(weight) || weight <= 0) {
    alert('Weight must be a positive number.');
    return false;
  }
  if (course === 'Select') {
    alert('Please select a course.');
    return false;
  }
  if (year === 'Select') {
    alert('Please select an academic year.');
    return false;
  }
  if (photo === '') {
    alert('Photo is required.');
    return false;
  }
  if (proof === '') {
    alert('Proof is required.');
    return false;
  }
  return true;
}
</script>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validateForm()">
  <table>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" id="email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>dob</td>
      <td><input type="date" name="date" id="date" /></td>
    </tr>
    <tr>
      <td>Height</td>
      <td><input type="text" name="height" id="height" /> cm</td>
    </tr>
    <tr>
      <td>Weight</td>
      <td><input type="text" name="weight" id="Weight" /> kg</td>
    </tr>
    <tr>
      <td>Course</td>
      <td>
        <select name="selcourse" id="selcourse">
          <option>Select</option>
          <?php
          $SelQry1 = "SELECT * FROM tbl_course";
          $resultOne = $con->query($SelQry1);
          while ($data = $resultOne->fetch_assoc()) {
          ?>
            <option value="<?php echo $data["course_id"] ?>">
              <?php echo $data["course_name"]; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>AcademicYear</td>
      <td>
        <select name="selyear" id="selyear">
          <option>Select</option>
          <?php
          $SelQry1 = "SELECT * FROM tbl_academicyear";
          $resultOne = $con->query($SelQry1);
          while ($data = $resultOne->fetch_assoc()) {
          ?>
            <option value="<?php echo $data["acyear_id"] ?>">
              <?php echo $data["acyear_name"]; ?>
            </option>
          <?php
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><input type="file" name="proof" id="proof" /></td>
    </tr>
    <tr>
      <td colspan="2">
        <div align="center">
          <input type="submit" name="Submit" id="Submit" value="Submit" />
          <input name="Cancel" type="submit" id="Cancel" value="Cancel" />
        </div>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
