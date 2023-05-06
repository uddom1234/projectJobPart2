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

if (isset($_POST["jobReferenceNumber"])){
    $jobReferenceNumber=$_POST["jobReferenceNumber"];
}
else{
    echo "<p> Enter and match the job reference number in the <a href=\"apply.php\">form</a></p>";
    
}
if (isset($_POST["firstName"])){
    $firstName=$_POST["firstName"];
}
else{
    echo "<p> Enter first name in the <a href=\"apply.php\">form</a></p>";
}

if (isset($_POST["lastName"])){
    $lastName=$_POST["lastName"];
}

else{
    echo "<p> Enter last name in the <a href=\"apply.php\">form</a></p>";
}

if (isset($_POST["dateOfBirth"])){
    $dateOfBirth=$_POST["dateOfBirth"];
}

else{
    echo "<p> Enter date of birth in the <a href=\"apply.php\">form</a></p>";
}

if (isset($_POST["streetAddress"])){
    $streetAddress=$_POST["streetAddress"];
}
else{
    echo "<p> Enter street address in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["suburbTown"])){
    $suburbTown=$_POST["suburbTown"];
} 
else{
    echo "<p> Enter suburb/town in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["postcode"])){
    $postcode=$_POST["postcode"];
} 
else{
    echo "<p> Enter postcode in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["emailAddress"])){
    $emailAddress=$_POST["emailAddress"];
} 
else{
    echo "<p> Enter email address in the <a href=\"apply.php\">form</a></p>";
}
if (isset($_POST["phoneNumber"])){
    $phoneNumber=$_POST["phoneNumber"];
} 
else{
    echo "<p> Enter phone number in the <a href=\"apply.php\">form</a></p>";
}

$otherSkills=$_POST["otherSkills"];

if (isset ($_POST["gender"])){
    $gender=$_POST["gender"];
}
else{
    echo "<p> Enter gender in the <a href=\"apply.php\">form</a></p>";
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

$error='';
if ($jobReferenceNumber==''){
$error.="<p>Enter Job reference number in the <a href=\"apply.php\">form</a>.</p>";
}
else if (!preg_match("/[abc12][abc13]/",$jobReferenceNumber)){
    $error.= "<p> Please match the job reference number in the <a href=\"apply.php\">form</a>.</p>";
}
if($firstName==''){
    $error.="<p> Enter your first name in the <a href=\"apply.php\">form</a></p>";
}
else if (!preg_match("/^[a-zA-Z]{1,20}$/",$firstName)){
    $error.="<p>Only letters are allowed in first name in the <a href=\"apply.php\">form</a></p>";
    
}
if($lastName==''){
    $error.="<p> Enter your last name in the <a href=\"apply.php\">form</a>.</p>";
}
else if (!preg_match("/^[a-zA-Z\s]{1,20}$/",$lastName)){
    $error.="<p>Only letters are allowed in last name in the <a href=\"apply.php\">form</a>.</p>";
}
if($streetAddress==''){
    $error.="<p> Enter your Street Address in the <a href=\"apply.php\">form</a>.</p>";
}
else if (!preg_match('/^[a-zA-Z0-9\s\/]{1,40}$/',$streetAddress)){
    $error.="<p>Only letters and numbers are allowed in street address in the <a href=\"apply.php\">form</a>.</p>";
} 
if($suburbTown==''){
    $error.="<p> Enter your suburb/town in the <a href=\"apply.php\">form</a>.</p>";
}
else if(!preg_match("/^[a-zA-Z]{1,40}$/",$suburbTown)){
    $error.="<p>Only letters and numbers are allowed in suburb/town in the <a href=\"apply.php\">form</a>.</p>";
}
if($postcode==''){
    $error.="<p> Enter your postcode in the <a href=\"apply.php\">form</a>.</p>";
}
else if(!preg_match('/^[0-9]{4}$/',$postcode)){
    $error.="<p>Only four numbers are allowed in postcode in the <a href=\"apply.php\">form</a>.</p>";
}
if($emailAddress==''){
    $error.="<p> Enter your email address in the <a href=\"apply.php\">form</a>.</p>";
}
else if(!filter_var($emailAddress,FILTER_VALIDATE_EMAIL)){
    $error.="<p>Email format is invalid in the <a href=\"apply.php\">form</a>.</p>";
}   
if($phoneNumber==''){
    $error.="<p> Enter your phone number in the <a href=\"apply.php\">form</a>.</p>";
}
else if(!preg_match("/^[0-9]{8,12}$/",$phoneNumber)){
    $error.="<p>Only 8-12 numbers are allowed in phone number in the <a href=\"apply.php\">form</a></p>";
} 
if($state==''){
    $error.="<p> Select your state in the <a href=\"apply.php\">form</a>.</p>";
}  
if($skills==''){
    $error.="<p> Please select your skill in the <a href=\"apply.php\">form</a>.</p>";
}
if ($error !=""){
    echo "<p> $error </p>";
} 

function sanitise_input ($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
    
    
    $firstName=sanitise_input($firstName);
    $lastName=sanitise_input($lastName);
    $dateOfBirth=sanitise_input($dateOfBirth);
    $gender=sanitise_input($gender);
    $skills=sanitise_input($skills);
    $state=sanitise_input($state);
    $phoneNumber=sanitise_input($phoneNumber);
    $emailAddress=sanitise_input($emailAddress);
    $streetAddress=sanitise_input($streetAddress);
    $suburbTown=sanitise_input($suburbTown);
    $postcode=sanitise_input($postcode);
    $jobReferenceNumber=sanitise_input($jobReferenceNumber);





// Insert the record into the eoi table

if($error == 0) {
    $sql_insert = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skills, OtherSkills, Status)
    VALUES ('$jobReferenceNumber', '$firstName', '$lastName', '$dateOfBirth', '$gender', '$streetAddress', '$suburbTown', '$state', '$postcode', '$emailAddress', '$phoneNumber', '$skills', '$otherSkills', 'New')";
} else {
    echo "There's an error dumbass!";
}

if (mysqli_query($conn, $sql_insert)) {
    echo "EOI record created successfully.";
} else {
    echo "Submission Failed: " . mysqli_error($conn);
}


// Close the connection
mysqli_close($conn);

?>
