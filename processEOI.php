<?php
// processEOI.php

// Include the settings file
require_once 'settings.php';

// Create the eoi table if it doesn't exist
$sql_create_table = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(5) NOT NULL,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Gender ENUM('Male', 'Female', 'Other') NOT NULL,
    StreetAddress VARCHAR(40) NOT NULL,
    SuburbTown VARCHAR(40) NOT NULL,
    State ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    Postcode VARCHAR(4) NOT NULL,
    EmailAddress VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR(15) NOT NULL,
    Skills TEXT NOT NULL,
    OtherSkills TEXT NOT NULL,
    Status ENUM('New', 'Current', 'Final') NOT NULL DEFAULT 'New'
)";

if (mysqli_query($conn, $sql_create_table) === FALSE) {
    echo "Error creating table";
}

    $jobReferenceNumber = $_POST['jobReferenceNumber'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $streetAddress = $_POST['streetAddress'];
    $suburbTown = $_POST['suburbTown'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $skills = implode(", ", $_POST['skills']);
    $otherSkills = $_POST['otherSkills'];


//need to add validation
$error = [];
if (isset($_POST["Job Reference"])){
    $Jobref=$_POST["Job Reference"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["firstname"])){
    $firstname=$_POST["firstname"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["lastname"])){
    $lastname=$_POST["lastname"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["dateofBirth"])){
    $fname=$_POST["dateofBirth"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["streetAddress"])){
    $streetAddress=$_POST["streetAddress"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["suburbTown"])){
    $suburbTown=$_POST["suburbTown"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["postcode"])){
    $postcode=$_POST["postcode"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["emailAddress"])){
    $emailAddress=$_POST["emailAddress"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["phoneNumber"])){
    $phoneNumber=$_POST["phoneNumber"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["otherSkills"])){
    $otherSkills=$_POST["otherSkills"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}

// Insert the record into the eoi table
$sql_insert = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skills, OtherSkills, Status)
    VALUES ('$jobReferenceNumber', '$firstName', '$lastName', '$dateOfBirth', '$gender', '$streetAddress', '$suburbTown', '$state', '$postcode', '$emailAddress', '$phoneNumber', '$skills', '$otherSkills', 'New')";

if (mysqli_query($conn, $sql_insert)) {
    echo "EOI record created successfully.";
} else {
    echo "Submission Failed: " . mysqli_error($conn);
}


// Close the connection
mysqli_close($conn);

?>
