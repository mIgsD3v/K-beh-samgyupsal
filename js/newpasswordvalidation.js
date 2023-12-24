function validateForm() {
    var pass = document.forms["myForm"]["pass"].value;
    var confirm = document.forms["myForm"]["confirm"].value;
    var valid = true;

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


    return valid;
}