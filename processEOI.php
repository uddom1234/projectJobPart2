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


//need to add validation
$error = array;
if (isset($_POST["jobReferenceNumber"])){
    $jobReferenceNumber=$_POST["jobReferenceNumber"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
    array_push($error,)
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
if (isset ($_POST["gender"])){
    $gender=$_POST["gender"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
if (isset ($_POST["state"])){
    $state=$_POST["state"];
}
else{
    echo "<p> Enter data in the <a href=\"apply.php\">form</a></p>";
}
$skills='';
if (isset($_POST["Bachelor"])) $skills=$skills."Bachelor in IT";
if (isset($_POST["Network"])) $skills=$skills."Familiar with networking protocol";
if (isset($_POST["IT"])) $skills=$skills."Certification in IT or programming";
if (isset($_POST["English"])) $skills=$skills."Fluency in English";



// Insert the record into the eoi table

if($error == 0) {
    $sql_insert = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skills, OtherSkills, Status)
    VALUES ('$jobReferenceNumber', '$firstName', '$lastName', '$dateOfBirth', '$gender', '$streetAddress', '$suburbTown', '$state', '$postcode', '$emailAddress', '$phoneNumber', '$skills', '$otherSkills', 'New')";
} else {
    echo "There's an error dumbass!"
}

if (mysqli_query($conn, $sql_insert)) {
    echo "EOI record created successfully.";
} else {
    echo "Submission Failed: " . mysqli_error($conn);
}


// Close the connection
mysqli_close($conn);

?>
