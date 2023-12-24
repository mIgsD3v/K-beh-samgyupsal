function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var email = document.forms["myForm"]["email"].value;
    var security = document.forms["myForm"]["security"].value;
    var valid = true;

    if (name == "") {
        document.getElementById("nameErr").innerHTML = "*This field is required";
        valid = false;

        setTimeout(function() {
            document.getElementById("nameErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds

    } else {
        document.getElementById("nameErr").innerHTML = "";
    }

    if (email == "") {
        document.getElementById("emailErr").innerHTML = "*This field is required";
        valid = false;

        setTimeout(function() {
            document.getElementById("emailErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds

    } else {
        document.getElementById("emailErr").innerHTML = "";
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