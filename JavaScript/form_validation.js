document.addEventListener("DOMContentLoaded", function() {
    const log_in_email = document.getElementById("sign_in_email");
    const log_in_password = document.getElementById("sign_in_password");
    const log_in_check = document.getElementById("sign_in_check");
    const log_in_button = document.getElementById("log_in_button");
    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const alerts = document.getElementsByClassName("alert-form");

    log_in_email.addEventListener("input", function() {
        if (log_in_email.value.length == 0) {
            alerts[0].style.display = "block";
        } else {
            alerts[0].style.display = "none";
        }
        if (!email_regex.test(log_in_email.value)) {
            alerts[1].style.display = "block";
        } else {
            alerts[1].style.display = "none";
        }
    });

    log_in_password.addEventListener("input", function() {
        if (log_in_password.value.length == 0) {
            alerts[2].style.display = "block";
        } else {
            alerts[2].style.display = "none";
        }
    });

    log_in_check.addEventListener("click", function() {
        if (log_in_check.checked) {
            log_in_password.type = "text";
        } else {
            log_in_password.type = "password";
        }
    });

    log_in_button.addEventListener("click", function(e) {
        let valid = true;
        if (log_in_email.value.length == 0 || log_in_password.value.length == 0) {
            e.preventDefault();
        } else {
            for (let i = 0; i < alerts.length; i++) {
                if (alerts[i].style.display == "block") {
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