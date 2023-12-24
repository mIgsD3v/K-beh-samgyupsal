function validateForm() {
    var email = document.forms["myForm"]["email"].value;
    var name = document.forms["myForm"]["name"].value;
    var Lname = document.forms["myForm"]["Lname"].value;
    var pass = document.forms["myForm"]["pass"].value;
    var confirm = document.forms["myForm"]["confirm"].value;
    var security = document.forms["myForm"]["security"].value;
    var valid = true;

    if (email == "") {
        document.getElementById("emailErr").innerHTML = "*This field is required";
        valid = false;

        setTimeout(function() {
            document.getElementById("emailErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds

    } else {
        document.getElementById("emailErr").innerHTML = "";
    }

    if (name == "") {
        document.getElementById("nameErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("nameErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("nameErr").innerHTML = "";
    }


    if (Lname == "") {
        document.getElementById("LnameErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("LnameErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("LnameErr").innerHTML = "";
    }

    if (pass == "") {
        document.getElementById("passErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("passErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("passErr").innerHTML = "";
    }

    if (confirm == "") {
        document.getElementById("confirmErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("confirmErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("confirmErr").innerHTML = "";
    }


    if (security == "") {
        document.getElementById("securityErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("securityErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("securityErr").innerHTML = "";
    }

    return valid;
}