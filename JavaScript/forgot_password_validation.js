document.addEventListener("DOMContentLoaded", function() {
    const email = document.getElementById("forgot-email");
    const alert = document.getElementsByClassName("alert-form");
    const password = document.getElementById("forgot-password-form");
    const repassword = document.getElementById("forgot-retype");
    const show_pass = document.getElementById("forgot-show");
    const forgot_button = document.getElementById("forgot-button");
    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    email.addEventListener("input", function() {
        if (email.value.length == 0) {
            alert[0].style.display = "block";
        } else {
            alert[0].style.display = "none";
        }
        if (!email_regex.test(email.value)) {
            alert[1].style.display = "block";
        } else {
            alert[1].style.display = "none";
        }
    });

    password.addEventListener("input", function() {
        if (password.value.length == 0) {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }
        if (alert[4].style.display == "block") {
            if (password.value == repassword.value) {
                alert[4].style.display = "none";
            }
        }
    });

    repassword.addEventListener("input", function() {
        if (repassword.value.length == 0) {
            alert[3].style.display = "block";
        } else {
            alert[3].style.display = "none";
        }
        if (repassword.value != password.value) {
            alert[4].style.display = "block";
        } else {
            alert[4].style.display = "none";
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

    forgot_button.addEventListener("click", function(e) {
        let valid = true;
        if (email.value.length == 0 || password.value.length == 0 || repassword.value.length == 0) {
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