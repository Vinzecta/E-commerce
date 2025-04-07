document.addEventListener("DOMContentLoaded", function() {
    const phone_number = document.getElementById("phone_number");
    const alert = document.getElementsByClassName("alert-profile");
    const button = document.getElementById("save-profile");
    const password = document.getElementById("profile-password");
    const repassword = document.getElementById("profile-re-password");
    const pass_button = document.getElementById("change-pass-button");
    const show_pass = document.getElementById("profile-show");
    let valid = true;

    phone_number.addEventListener("input", function() {
        if (phone_number.value.length < 10 || phone_number.value.length > 11) {
            alert[0].style.display = "block";
            valid = false;
        } else {
            alert[0].style.display = "none";
            valid = true;
        }
    });

    password.addEventListener("input", function() {
        if (password.value.length === 0) {
            alert[1].style.display = "block";
            valid = false;
        } else {
            alert[1].style.display = "none";
            valid = true;
        }
    });

    repassword.addEventListener("input", function() {
        if (password.value.length === 0) {
            alert[2].style.display = "block";
            valid = false;
        } else {
            alert[2].style.display = "none";
            valid = true;
        }
        if (repassword.value != password.value) {
            alert[3].style.display = "block";
            valid = false
        } else {
            alert[3].style.display = "none";
            valid = true;
        }
    });

    show_pass.addEventListener("click", function() {
        if (show_pass.checked) {
            password.type = "text";
            repassword.type = "text";
        } else {
            password.type = "password";
            repassword.type = "password";
        }
    });

    button.addEventListener("click", function(e) {
        if (!valid) {
            e.preventDefault();
        }
    });

    pass_button.addEventListener("click", function(e) {
        if(!valid) {
            e.preventDefault();
        }
    })
});