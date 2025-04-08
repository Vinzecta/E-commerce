document.addEventListener("DOMContentLoaded", function() {
    const phone_number = document.getElementById("phone_number");
    const alert = document.getElementsByClassName("alert-profile");
    const button = document.getElementById("save-profile");

    phone_number.addEventListener("input", function() {
        if (phone_number.value.length < 10 || phone_number.value.length > 11) {
            alert[0].style.display = "block";
            valid = false;
        } else {
            alert[0].style.display = "none";
            valid = true;
        }
    });

    button.addEventListener("click", function(e) {
        let valid = true;
        if (phone_number.value.length == 0) {
            e.preventDefault();
        } else {
            for (let i = 0; i < alert.length; i++) {
                if (alert[i].style.display == "block") {
                    valid = false;
                    break;
                }
            }
            if (!valid) {
                e.preventDefault();
            }
        }
    });
});