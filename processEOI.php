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
    echo "Error creating table: " . mysqli_error($conn);
}

    $job_reference_number = $_POST['job_reference_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    $street_address = $_POST['street_address'];
    $suburb_town = $_POST['suburb_town'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $skills = $_POST['skills'];
    $other_skills = $_POST['other_skills'];


//need to add validation

// Insert the record into the eoi table
$sql_insert = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender, StreetAddress, SuburbTown, State, Postcode, EmailAddress, Skills, PhoneNumber, OtherSkills)
VALUES ('$job_reference_number', '$first_name', '$last_name', '$date_of_birth', '$gender', '$street_address', '$suburb_town', '$state', '$postcode', '$email_address', '$phone_number', '$other_skills')";

if (mysqli_query($conn, $sql_insert)) {
    echo "EOI record created successfully.";
} else {
    echo "Submission Failed!";
}

// Close the connection
mysqli_close($conn);

?>