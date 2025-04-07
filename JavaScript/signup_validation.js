document.addEventListener("DOMContentLoaded", function() {
    const sign_up_username = document.getElementById("signup_username");
    const alert = document.getElementsByClassName("alert-form");
    const email = document.getElementById("sign-up-email");
    const password = document.getElementById("sign-up-password");
    const repassword = document.getElementById("sign-up-confirm-password");
    const show_pass = document.getElementById("sign-up-show");
    const sign_up_button = document.getElementById("sign-up-button");
    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    sign_up_username.addEventListener("input", function() {
        if (sign_up_username.value.length == 0) {
            alert[0].style.display = "block";
        } else {
            alert[0].style.display = "none";
        }
    });

    email.addEventListener("input", function() {
        if (email.value.length == 0) {
            alert[1].style.display = "block";
        } else {
            alert[1].style.display = "none";
        }
        if (!email_regex.test(email.value)) {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }
    });

    password.addEventListener("input", function() {
        if (password.value.length == 0) {
            alert[3].style.display = "block";
        } else {
            alert[3].style.display = "none";
        }
        if (alert[5].style.display = "block") {
            if (password.value == repassword.value) {
                alert[5].style.display = "none";
            }
        }
    });

    repassword.addEventListener("input", function() {
        if (repassword.value.length == 0) {
            alert[4].style.display = "block";
        } else {
            alert[4].style.display = "none";
        }
        if (repassword.value != password.value) {
            alert[5].style.display = "block";
        } else {
            alert[5].style.display = "none";
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

    sign_up_button.addEventListener("click", function(e) {
        let valid = true;
        if (sign_up_username.value.length == 0 || email.value.length == 0 || password.value.length == 0 || repassword.value.length == 0) {
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