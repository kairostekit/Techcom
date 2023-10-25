<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Job Application" />
    <meta name="keywords" content=" Assignment1" />
    <meta name="author" content="PORNKANOK" />
    <title>Job Application</title>
    <link rel="stylesheet" href="styles/style.css" />

    <script src="scripts/enhancements.js"></script>

</head>

<body>
    <?php include_once("header.inc"); ?>
    <?php include_once("menu.inc"); ?>

    <fieldset class="f">
        <h1>Job Application</h1>
        <!-- <form novalidate="novalidate" method="post" action="http://mercury.swin.edu.au/it000000/formtest.php"> -->
        <form method="post" action="processEOI.php" novalidate="novalidate">
            <fieldset>
                <legend>Candidate details</legend>
                <p>
                    <label for="jobReference">Job reference number:</label>
                    <span class="error" id="jobReferenceError"></span>
                    <input type="text" id="jobReference" name="job_ref"  />
                </p>
                <p>
                    <label for="Firstname">First Name:</label>
                    <span class="error" id="FirstnameError"></span>
                    <input type="text" name="first_name" id="Firstname" size="20"  />
                    <label for="Lastname">Last Name:</label>
                    <span class="error" id="LastnameError"></span>
                    <input type="text" name="last_name" id="Lastname" size="20"  />
                </p>
                <p>
                    <label for="dob">Date of Birth:</label>
                    <span class="error" id="dobError"></span>
                    <input type="date" id="dob" name="dob" /><br />
                </p>
                <p><b>Gender:</b></p>
                <span class="error" id="genderError"></span>
                <label><input type="radio" name="gender"    value="male" />Male</label>
                <label><input type="radio" name="gender"   value="female" />Female</label>
                <label><input type="radio" name="gender"   value="other" />Other</label>
            </fieldset>
            <fieldset>
                <legend>Contact detail</legend>
                <p>
                    <label for="streetAddress">Street Address:</label>
                    <span class="error" id="streetAddressError"></span>
                    <input type="text" id="streetAddress" name="address"  />
                </p>
                <p>
                    <label for="suburb">Suburb/Town:</label>
                    <span class="error" id="suburbError"></span>
                    <input type="text" id="suburb" name="suburb_town"  />
                </p>
                <p>
                    <label for="state">State:</label>
                    <span class="error" id="stateError"></span>
                    <select id="state" name="state" >
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </p>
                <p>
                    <label for="postcode">Postcode:</label>
                    <span class="error" id="postcodeError"></span>
                    <input type="text" id="postcode" name="postcode" maxlength="4"  />
                </p>
                <p>
                    <label for="email">Email Address:</label>
                    <span class="error" id="emailError"></span>
                    <input type="email" id="email" name="email" placeholder="name@domain.company"  />
                </p>
                <p>
                    <label for="phoneNumber">Phone Number:</label>
                    <span class="error" id="phoneNumberError"></span>
                    <input type="tel" id="phoneNumber" name="phone"  />
                </p>
            </fieldset>
            <br />
            <fieldset>
                <legend>Another information</legend>
                <span class="error" id="skillError"></span>
                <p>
                    <label>Python:</label>
                    <input type="checkbox" id="Python" name="issues[]" value="Python" />
                </p>
                <p>
                    <label>C++:</label>
                    <input type="checkbox" id="C++" name="issues[]" value="C++" />
                </p>
                <p>
                    <label>SQL:</label>
                    <input type="checkbox" id="SQL" name="issues[]" value="SQL" />
                </p>
                <p>
                    <label>Other Skills:</label>
                    <input type="checkbox" id="otherSkillsCheckbox" name="issues[]" value="OtherSkills" />
                </p>
                <p>
                    <label for="otherSkillsText">Other Skills</label>
                    <span class="error" id="otherSkillsTextError"></span>
                    <textarea id="otherSkillsText" name="other_skills" rows="5" cols="50" placeholder="Put your other skills"></textarea>
                </p>
            </fieldset>
            <input type="submit" value="Apply" />
            <input type="hidden" name="status" value="NEW">
        </form>

    </fieldset>

	<?php include_once("footer.inc"); ?>
    <script src="scripts/apply.js?v=29"></script>
</body>

</html>