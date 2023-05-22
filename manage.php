<?php
// manage.php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit;
}

// Include the settings file
require_once 'settings.php';

// Function to display query results
function display($result) {
    echo "<table border='1' class=\"table\">";
    echo "<tr class=\"table\" >
            <th>EOInumber</th>
            <th>JobReferenceNumber</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>DateOfBirth</th>
            <th>Gender</th>
            <th>StreetAddress</th>
            <th>SuburbTown</th>
            <th>State</th>
            <th>Postcode</th>
            <th>EmailAddress</th>
            <th>PhoneNumber</th>
            <th>Skills</th>
            <th>OtherSkills</th>
            <th>Status</th>
        </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }       
        echo "</tr>";
    }
    echo "</table>";
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    if($action == 'listAll'){
        $query = "SELECT * FROM eoi";
        $result = mysqli_query($conn, $query);
        display($result);
    } elseif ($action == 'listByJobRef') {
        $jobReferenceNumber = $_POST['jobReferenceNumber'];
        $query = "SELECT * FROM eoi WHERE JobReferenceNumber = '$jobReferenceNumber'";
        $result = mysqli_query($conn, $query);
        display($result);
    } elseif ($action == 'listByApplicant') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $sql = "SELECT * FROM eoi WHERE FirstName LIKE '%$firstName%' AND LastName LIKE '%$lastName%'";
        $result = mysqli_query($conn, $sql);
        display($result);
    } elseif ($action == 'deleteByJobRef') {
        $jobReferenceNumber = $_POST['jobReferenceNumber'];
        $query = "DELETE FROM eoi WHERE JobReferenceNumber = '$jobReferenceNumber'";
        ;
        if(mysqli_query($conn, $query)) {
            echo "EOIs with Job Reference Number '$jobReferenceNumber' deleted successfully.";
        } else {
            echo "Error deleting EOIs with Job Reference Number '$jobReferenceNumber'.";
        }
        
    } elseif ($action == 'changeStatus') {
        $EOInumber = $_POST['EOInumber'];
        $newStatus = $_POST['newStatus'];
        $query = "UPDATE eoi SET Status = '$newStatus' WHERE EOInumber = '$EOInumber'";
        if(mysqli_query($conn, $query)) {
            echo "Status updated successfully for EOI number '$EOInumber'.";
        } else {
            echo "Error updating EOI with number '$EOInumber'.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>EOI Management</title>
    <link rel="stylesheet" href="styles/manage.css">
</head>
<body>
    <h1 class='pageTitle'>EOI Management</h1>
<div class='manageForm'>
<div>
    <form action="manage.php" method="post" class='container'>
        
        <input type="hidden" name="action" value="listAll">
        <input type="submit" value="List all EOIs" class='formButton'>
    </form>
    <br>
</div>
<div>
    <form action="manage.php" method="post" class='container'>
        <input type="hidden" name="action" value="listByJobRef">
        <label for="jobReferenceNumber">Job Reference Number:</label>
        <input type="text" name="jobReferenceNumber" id="jobReferenceNumber">
        <input type="submit" value="List EOIs by Job Reference Number" class='formButton'>
    </form>
    <br>
</div>

<div>
    <form action="manage.php" method="post" class='container'>
        <input type="hidden" name="action" value="listByApplicant">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName">
        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName">
        <input type="submit" value="List EOIs by Applicant Name" class='formButton'>
    </form>
    <br>
</div>
<div>
    <form action="manage.php" method="post" class='container'>
        <input type="hidden" name="action" value="deleteByJobRef">
        <label for="jobReferenceNumber">Job Reference Number:</label>
        <input type="text" name="jobReferenceNumber" id="jobReferenceNumber">
        <input type="submit" value="Delete EOIs by Job Reference Number" class='formButton'>
    </form>
    <br>
</div>
<div>
    <form action="manage.php" method="post" class='container'>
        <input type="hidden" name="action" value="changeStatus">
        <label for="EOInumber">EOI Number:</label>
        <input type="text" name="EOInumber" id="EOInumber">
        <label for="newStatus">New Status:</label>
        <select name="newStatus" id="newStatus">
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
        </select>
        <input type="submit" value="Change EOI Status" class='formButton'>
    </form>
</div>
</div>
    <form action="logout.php" method="post" style="display: inline;" class='container'>
        <input type="submit" class="logout" value="Logout" class='formButton'>
    </form>

</body>
</html>
