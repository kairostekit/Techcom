/*
  Author: Pornkanok Tantewee 103503476
 Target: What html file are reference by the JS file.
 Purpose: Checking Form DatawithJavaScriptand Transferring data between HTML pages.
 Created: 17/09/2023
 last updated: 29/09/2023

/* Code References from lectures and workshops . 
Also https://stackoverflow.com/ and https://www.w3schools.com/.*/

"use strict"; // To prevent the creation of global variables in functions
var DEBUG = true;

document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".jobReferenceButton");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      const buttonId = this.id;
      let valueToStore = "";

      if (buttonId === "B5412") {
        valueToStore = "B5412";
      } else if (buttonId === "B5687") {
        valueToStore = "B5687";
      }

      // Delete storing value in Session Storage before redirect
      localStorage.removeItem("JobReference");

      // Storage value in Session Storage by key "JobReference"
      localStorage.setItem("JobReference", valueToStore);

      // Create URL Parameter redirect to apply.php
      const url = "apply.php";
      window.location.href = url;
    });
  });

  document.getElementById("Firstname").value =
    sessionStorage.getItem("Firstname") || "";
  document.getElementById("Lastname").value =
    sessionStorage.getItem("Lastname") || "";

  // Storage value in Session Storage for input that is id="jobReference" and name="jobReference"
  document.getElementById("jobReference").value =
    localStorage.getItem("JobReference") || "";

  document.getElementById("dob").value = sessionStorage.getItem("dob") || "";
  var gender = sessionStorage.getItem("gender");
  if (gender) {
    document.querySelector(
      'input[name="gender"][value="' + gender + '"]'
    ).checked = true;
  }
  document.getElementById("email").value =
    sessionStorage.getItem("email") || "";
  document.getElementById("phoneNumber").value =
    sessionStorage.getItem("phoneNumber") || "";
  document.getElementById("streetAddress").value =
    sessionStorage.getItem("streetAddress") || "";
  document.getElementById("suburb").value =
    sessionStorage.getItem("suburb") || "";
  document.getElementById("state").value =
    sessionStorage.getItem("state") || "";
  document.getElementById("postcode").value =
    sessionStorage.getItem("postcode") || "";
  var skills = JSON.parse(sessionStorage.getItem("skills")) || [];
  skills.forEach(function (skill) {
    document.querySelector(
      'input[name="skill"][value="' + skill + '"]'
    ).checked = true;
  });
  document.getElementById("otherSkillsText").value =
    sessionStorage.getItem("otherSkillsText") || "";
});

// When form is submitted
document.querySelector("form").addEventListener("submit", function (event) {
  event.preventDefault(); // stop submmit

  // Call function  validateForm to validate
  if (validateForm()) {
    // If follow condition, it will be stored in Session Storage
    this.action = "processEOI.php"; // determine URL that form will be sent
    sessionStorage.setItem(
      "Firstname",
      document.getElementById("Firstname").value
    );
    sessionStorage.setItem(
      "Lastname",
      document.getElementById("Lastname").value
    );
    sessionStorage.setItem(
      "jobReference",
      document.getElementById("jobReference").value
    );
    sessionStorage.setItem("dob", document.getElementById("dob").value);
    var gender = document.querySelector('input[name="gender"]:checked');
    if (gender) {
      sessionStorage.setItem("gender", gender.value);
    }
    sessionStorage.setItem("email", document.getElementById("email").value);
    sessionStorage.setItem(
      "phoneNumber",
      document.getElementById("phoneNumber").value
    );
    sessionStorage.setItem(
      "streetAddress",
      document.getElementById("streetAddress").value
    );
    sessionStorage.setItem("suburb", document.getElementById("suburb").value);
    sessionStorage.setItem("state", document.getElementById("state").value);
    sessionStorage.setItem(
      "postcode",
      document.getElementById("postcode").value
    );
    var skills = Array.from(
      document.querySelectorAll('input[name="skill"]:checked')
    ).map(function (skill) {
      return skill.value.replace(/\s+/g, ""); //remove space between skill value
    });
    sessionStorage.setItem("Python", document.getElementById("Python").value);
    sessionStorage.setItem("C++", document.getElementById("C++").value);
    sessionStorage.setItem("SQL", document.getElementById("SQL").value);
    sessionStorage.setItem("skills", JSON.stringify(skills));
    sessionStorage.setItem(
      "otherSkillsText",
      document.getElementById("otherSkillsText").value
    );

    // submit form to server
    this.submit();
  }
});

function validateForm() {

  //  data validate and show error
  var isValid = true;
  if (!DEBUG) {

    // check Given Name
    var Firstname = document.getElementById("Firstname");
    var FirstnameValue = Firstname.value.trim();

    // set Family Name
    var Lastname = document.getElementById("Lastname");
    var LastnameValue = Lastname.value.trim();

    var isValid = true; // The data true

    // check Given Name length
    if (FirstnameValue.length > 20) {
      document.getElementById("FirstnameError").textContent =
        "Given Name must not exceed 20 characters";
      Firstname.classList.add("error");
      Firstname.focus();
      isValid = false;
    } else if (FirstnameValue === "") {
      document.getElementById("FirstnameError").textContent =
        "Please enter Given Name";
      Firstname.classList.add("error");
      Firstname.focus();
      isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(FirstnameValue)) {
      document.getElementById("FirstnameError").textContent =
        "Given Name must be A-Z or a-z ";
      Firstname.classList.add("error");
      Firstname.focus();
      isValid = false;
    } else {
      document.getElementById("FirstnameError").textContent = "";
      Firstname.classList.remove("error");
    }


    // validate isValid that is set above
    if (isValid) {
      // if the data corect, it work
    } else {
      // work when data is incorrect.
    }

    // check Family Name length
    if (LastnameValue.length > 20) {
      document.getElementById("LastnameError").textContent =
        "Family Name must not exceed 20 characters";
      Lastname.classList.add("error");
      Lastname.focus();
      isValid = false;
    } else if (LastnameValue === "") {
      document.getElementById("LastnameError").textContent =
        "Please enter Family Name";
      Lastname.classList.add("error");
      Lastname.focus();
      isValid = false;
    } else if (!/^[a-zA-Z]+$/.test(LastnameValue)) {
      document.getElementById("LastnameError").textContent =
        "Family Name must be A-Z or a-z ";
      Lastname.classList.add("error");
      Lastname.focus();
      isValid = false;
    } else {
      document.getElementById("LastnameError").textContent = "";
      Lastname.classList.remove("error");
    }

    // set Job Reference
    var jobReference = document.getElementById("jobReference");
    if (jobReference.value.trim() === "") {
      document.getElementById("jobReferenceError").textContent =
        "Please enter Job Reference No";
      jobReference.classList.add("error");
      jobReference.focus();
      isValid = false;
    } else {
      document.getElementById("jobReferenceError").textContent = "";
      jobReference.classList.remove("error");
    }

    // set Date of Birth
    var dob = document.getElementById("dob");
    if (dob.value.trim() === "") {
      document.getElementById("dobError").textContent =
        "Please enter Date of Birth";
      dob.classList.add("error");
      dob.focus();
      isValid = false;
    } else {
      // conver date of birth in Date object
      var dobDate = new Date(dob.value);

      // calculate age
      var currentDate = new Date();
      var age = currentDate.getFullYear() - dobDate.getFullYear();

      // Age validate in 15-80 years
      if (age < 15 || age > 80) {
        document.getElementById("dobError").textContent =
          "Appicant is 15-80 years old";
        dob.classList.add("error");
        dob.focus();
        isValid = false;
      } else {
        document.getElementById("dobError").textContent = "";
        dob.classList.remove("error");
      }
    }

    // Check gender
    var gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
      document.getElementById("genderError").textContent = "Please enter Gender";
      document.getElementById("genderError").classList.add("error");
      isValid = false;
    } else {
      document.getElementById("genderError").textContent = "";
      document.getElementById("genderError").classList.remove("error");
    }

    // Check email
    var email = document.getElementById("email");
    var emailValue = email.value.trim();

    if (emailValue === "") {
      document.getElementById("emailError").textContent =
        "Please enter Email Address";
      email.classList.add("error");
      email.focus();
      isValid = false;
    } else if (!isValidEmail(emailValue)) {
      document.getElementById("emailError").textContent =
        "Please enter Email Address ";
      email.classList.add("error");
      email.focus();
      isValid = false;
    } else {
      document.getElementById("emailError").textContent = "";
      email.classList.remove("error");
    }

    var phoneNumber = document.getElementById("phoneNumber");
    var phoneNumberPattern = /^\d{8,12}$/;

    if (!phoneNumberPattern.test(phoneNumber.value)) {
      document.getElementById("phoneNumberError").textContent =
        "Please fill in Phone Number with 8 to 12 digits";
      phoneNumber.classList.add("error");
      phoneNumber.focus();
      isValid = false;
    } else {
      document.getElementById("phoneNumberError").textContent = "";
      phoneNumber.classList.remove("error");
    }

    // check Street Address
    var streetAddress = document.getElementById("streetAddress");
    var streetAddressValue = streetAddress.value.trim();

    if (streetAddressValue === "") {
      document.getElementById("streetAddressError").textContent =
        "Please enter Street Address";
      streetAddress.classList.add("error");
      streetAddress.focus();
      isValid = false;
    } else if (streetAddressValue.length > 40) {
      document.getElementById("streetAddressError").textContent =
        "Street Address must not exceed 40 characters";
      streetAddress.classList.add("error");
      streetAddress.focus();
      isValid = false;
    } else {
      document.getElementById("streetAddressError").textContent = "";
      streetAddress.classList.remove("error");
    }

    // check Suburb/Town
    var suburb = document.getElementById("suburb");
    if (suburb.value.trim() === "") {
      document.getElementById("suburbError").textContent =
        "Please enter Suburb/Town";
      suburb.classList.add("error");
      suburb.focus();
      isValid = false;
    } else {
      document.getElementById("suburbError").textContent = "";
      suburb.classList.remove("error");
    }

    // check State
    var state = document.getElementById("state");
    var selectedState = state.value;

    // check Postcode
    var postcode = document.getElementById("postcode");
    var postcodeValue = postcode.value.trim();

    var postcode = document.getElementById("postcode");
    if (postcode.value.trim() === "") {
      document.getElementById("postcodeError").textContent =
        "Please enter Postcode";
      postcode.classList.add("error");
      postcode.focus();
      isValid = false;
    } else {
      document.getElementById("postcodeError").textContent = "";
      postcode.classList.remove("error");
    }

    // check blank value in State
    if (selectedState === "") {
      document.getElementById("stateError").textContent = "Please select State";
      state.classList.add("error");
      state.focus();
      return false;
      isValid = false;
    } else {
      document.getElementById("stateError").textContent = "";
      state.classList.remove("error");
    }

    //  check blank value in Postcode
    if (postcodeValue === "") {
      document.getElementById("postcodeError").textContent =
        "Please enter postcode";

      postcode.classList.add("error");
      postcode.focus();
      return false;
      isValid = false;
    } else {
      //  switch is used to validate State value in condition
      switch (selectedState) {
        case "VIC":
          if (!(postcodeValue.startsWith("3") || postcodeValue.startsWith("8"))) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        case "NSW":
          if (!(postcodeValue.startsWith("1") || postcodeValue.startsWith("2"))) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        // check Postcode match
        case "QLD":
          if (!(postcodeValue.startsWith("4") || postcodeValue.startsWith("9"))) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        case "NT":
          if (!postcodeValue.startsWith("0")) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        case "WA":
          if (!postcodeValue.startsWith("6")) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        case "SA":
          if (!postcodeValue.startsWith("5")) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        case "TAS":
          if (!postcodeValue.startsWith("7")) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        case "ACT":
          if (!postcodeValue.startsWith("0")) {
            handlePostcodeError();
            return false;
          } else {
            clearPostcodeError();
          }
          break;
        default:
          // if State no match, no validate Postcode
          clearPostcodeError();
          break;
      }
    }

    // check Skills
    var Python = document.getElementById("Python");
    var collaborateSkill = document.getElementById("C++");
    var SQL = document.getElementById("SQL");
    var otherSkillsCheckbox = document.getElementById("otherSkillsCheckbox");
    var otherSkillsText = document.getElementById("otherSkillsText");
    var skillError = document.getElementById("skillError");
    var otherSkillsTextError = document.getElementById("otherSkillsTextError");

    if (
      !Python.checked &&
      !collaborateSkill.checked &&
      !SQL.checked &&
      !otherSkillsCheckbox.checked
    ) {
      skillError.textContent = "Please select 1 skill";
      skillError.classList.add("error");
      skillError.focus();
      isValid = false;
    } else {
      skillError.textContent = "";
      skillError.classList.remove("error");
    }

    if (otherSkillsCheckbox.checked && otherSkillsText.value.trim() === "") {
      otherSkillsTextError.textContent = "Please enter Other Skills";
      otherSkillsTextError.classList.add("error");
      otherSkillsTextError.focus();
      isValid = false;
    } else {
      otherSkillsTextError.textContent = "";
      otherSkillsTextError.classList.remove("error");
    }

    function handlePostcodeError() {
      document.getElementById("postcodeError").textContent =
        "Postcode does not match State";
      postcode.classList.add("error");
      postcode.focus();
      isValid = false;
    }

    function clearPostcodeError() {
      document.getElementById("postcodeError").textContent = "";
      postcode.classList.remove("error");
    }

    function isValidEmail(email) {
      var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

      if (email.length > 255) {
        return false;
      }

      if (!email.includes("@")) {
        return false;
      }

      if (!emailPattern.test(email)) {
        return false;
      }

      return true;
    }

    document.getElementById("phoneNumber").addEventListener("input", function () {
      var phoneNumber = this.value.replace(/\D/g, "");

      if (phoneNumber.length > 12) {
        phoneNumber = phoneNumber.slice(8, 12);
      }

      var formattedPhoneNumber = formatPhoneNumber(phoneNumber);

      this.value = formattedPhoneNumber;
    });
  }
  return isValid;
}
