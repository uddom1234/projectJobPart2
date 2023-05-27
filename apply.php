<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link href="styles/style.css" rel="stylesheet" media="screen"/>
</head>
<body>
    <?php 
        require 'header.inc' ;
    ?>
    <section class= "formCard" >
        <form method="post" action="processEOI.php" novalidate=”novalidate”>
            <fieldset class="mainForm">
                <legend></legend>
                <p>
             <h3 class="applyH3"><label for="jobReferenceNumber">Job Reference</label></h3>   
           
                <input type="text" id="reference" name="jobReferenceNumber" pattern="[A-Za-z0-9]{5}" placeholder="Enter reference ID" required="required"/>
                </P><hr/>
            <div class="personalDet">
                <div>
                <fieldset class="personalContainer">
                <h3 class="applyH3">Personal Details</h3>
                 
                     <p> 
                    <label  class="applyInput"><input type="text" name="firstName" maxlength="20" pattern="[A-Za-z]{1-20}" placeholder="Please enter your first name" required="required"/> First name&nbsp;&nbsp;&nbsp;</label>
                    <label class="applyInput"><input type="text" name="lastName" maxlength="20"pattern="[A-Za-z]{1-20}"placeholder="Please enter your last name" required="required"/> Last name</label>
                    </p>
                 
                <p class="dob">
                    <label class="applyInput"><input type="date" name="dateOfBirth" required="required"/> Date of Birth</label>
                </p><hr/>
               
               
                </fieldset><hr/>
                </div>
                <div>
                <fieldset class="applyGender">
                <h3 class="applyH3">Gender</h3>
                    <p>
                        <label class="applyInput" ><input type="radio" name="gender" value="Male" required="required" Checked/>Male</label>
                        <label class="applyInput"><input type="radio" name="gender" value="Female"/>Female</label>
                        <label class="applyInput"><input type="radio" name="gender" value="Other"/>Other</label>
                    </p>
                </fieldset>
                </div>

            </div>
                <fieldset class="applyAddress">
                <h3 class="applyH3">Address</h3>
       
                    <p>
                        <label id="stateAddress" class="applyInput">
                            <input name= 'streetAddress' type="text" maxlength="40" pattern="[A-za-z0-9]{1-40}" placeholder="Enter your street address" required="required"/>Street Address&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                        <label class="applyInput">
                            <input type="text" maxlength="40" name='suburbTown' placeholder="Enter your suburb" pattern="[A-za-z0-9]{1-40}"/>Suburb/Town&nbsp;&nbsp;&nbsp;&nbsp;
                        </label><hr/>
                        <label class="applyInput">State</label>
                                   
                        <select name="state">
                            <option value="VIC" required="required">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">.WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;<label class="applyInput"><input type="text" name="postcode" placeholder="Enter your postcode" pattern="[0-9]{4}" required="required"/>Postcode</label>
                    </p>
                   
                </fieldset><hr/>
                <fieldset class="contactInfo">
                 <h3 class="applyH3">Contact Information</h3>
                    <p>
                        <label class="applyInput"><input type="text" name="emailAddress" placeholder="123456@gmail.com" required="required"/>Email Address</label>
                    </p>
                    <p>
                        <label class="applyInput"><input type="text" name="phoneNumber" pattern="[ 0-9]{8-12}" placeholder="0123456789" required="required"/>Phone Number</label>
                    </p>
                </fieldset><hr/>
                <fieldset class="skills">
                <h3 class="applyH3">Skills</h3>
                    <p>
                        <label id="checkInput" class="applyInput"><input type="checkbox" name="Bachelor" value="Bachelor in IT" required="required" checked/>Bachelor Degree in IT Field</label><hr/>
                        <label id="checkInput"  class="applyInput"><input type="checkbox" name="Network" value="Familar with networking protocols"/>Familiar with networking protocols</label><hr/>
                        <label id="checkInput"  class="applyInput"><input type="checkbox" name="IT" value="Certification in IT or programming"/> Certification in IT or programming</label><hr/>
                        <label id="checkInput"  class="applyInput"><input type="checkbox" name="English" value="Fluency in English"/> Fluency in English</label><hr/>
                    </p>
                    <p>
                        <label class="applyInput">Other Skills</label>
                        <textarea class="applyInput" name="otherSkills" placeholder="Write your other skills here"></textarea>
                    </p>
                </fieldset><hr/>
                    <div class="FinalApply">
                    <p>
                    <div>
                        <input class="applyInput" type="submit" value="Submit"/>
                    </div>
                    <div>
                        <input class="applyInput" type="reset" value="Reset"/>
                    </div>
                    </p>
                    </div>
            </fieldset>       
        </form>
    </section>
    <?php
        require_once 'processEOI.php'; 
        require 'footer.inc' ;
    ?>
</body>
</html>


