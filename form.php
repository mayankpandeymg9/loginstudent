<?php
include('formsub.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print form data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    if (isset($_POST["student_name"]) && isset($_POST["roll_number"]) && isset($_POST["year"])) {
        // Process high school marks form data
        $student_name = $_POST["student_name"];
        $roll_number = $_POST["roll_number"];
        $year = $_POST["year"];
        $hindi = $_POST["hindi"];
        $maths = $_POST["maths"];
        $social_science = $_POST["social_science"];
        $english = $_POST["english"];
        $science = $_POST["science"];
        $query=mysqli_query($conn,"INSERT INTO form(student_name,roll_number,year,hindi,maths,social_science,english,science) VALUES('$student_name','$roll_number','$year','$hindi','$maths','$social_science','$english','$science')");
        if ($query) {
            echo "alert<script>('submitted')</script>";
        } else {
            echo "alert<script>('Error')</script>";
        }

        // Close the statement
        // $query->close();
    } else {
        echo "Invalid form submission!";
    }
} else {
    echo "No form submitted!";
}

// Close the database connection
$conn->close();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Form</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 200px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>High School Marks Form</h2>
    <form method="POST">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required/>

        <label for="roll_number">Roll Number:</label>
        <input type="text" id="roll_number" name="roll_number" required/>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" required/>

        <label>Subjects:</label>
        <label for="hindi">Hindi:</label>
        <input type="text" id="hindi" name="hindi" required/>
        
        <label for="maths">Maths:</label>
        <input type="text" id="maths" name="maths" required/>
        
        <label for="social_science">Social Science:</label>
        <input type="text" id="social_science" name="social_science" required/>
        
        <label for="english">English:</label>
        <input type="text" id="english" name="english" required/>
        
        <label for="science">Science:</label>
        <input type="text" id="science" name="science" required/>

        <button id="submit">Submit</button>
    </form>
</html>
