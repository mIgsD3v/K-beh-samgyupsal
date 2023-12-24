function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var Lname = document.forms["myForm"]["Lname"].value;
    var pass = document.forms["myForm"]["pass"].value;
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


    return valid;
}