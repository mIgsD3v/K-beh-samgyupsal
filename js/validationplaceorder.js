function validateForm() {
    var name = document.forms["myForm"]["name"].value;
    var contact = document.forms["myForm"]["contact"].value;
    var address = document.forms["myForm"]["address"].value;
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

    if (contact == "") {
        document.getElementById("contactErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("contactErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("contactErr").innerHTML = "";
    }

    if (address == "") {
        document.getElementById("addressErr").innerHTML = "*This field is required";
        valid = false;
        setTimeout(function() {
            document.getElementById("addressErr").innerHTML = "";
        }, 5000); // Hide the error message after 5 seconds
    } else {
        document.getElementById("addressErr").innerHTML = "";
    }

    return valid;
}