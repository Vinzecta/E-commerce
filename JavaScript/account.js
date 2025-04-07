document.addEventListener("DOMContentLoaded", function() {
    const login = document.getElementById("login");
    const signup = document.getElementById("signup");
    const loginform = document.getElementById("sign-in");
    const signupform = document.getElementById("sign-up");
    const show_pass = document.getElementsByClassName("pass-show");
    const password = document.getElementsByClassName("password");
    const login_return = document.getElementById("login-return");
    const option = document.getElementById("option");
    const forgot = document.getElementById("forgot-password");
    const forgot_password = document.getElementById("forgot");
    const alert = document.querySelectorAll(".alert");
    const username = document.querySelectorAll(".username");
    const email = document.querySelectorAll(".email");
    const email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function reset_input(input) {
        for (let i = 0; i < input.length; i++) {
            input[i].reset();
        }
    }

    login_return.addEventListener("click", function() {
        option.style.display = "flex";
        loginform.style.display = "flex";
        forgot.style.display = "none";
        reset_input(form);
    });

    forgot_password.addEventListener("click", function() {
        forgot.style.display = "flex";
        loginform.style.display = "none";
        option.style.display = "none";
        reset_input(form);
    });
    
    login.addEventListener("click", function() {
        signup.style.color = "black";
        signupform.style.display = "none";
        login.style.color = "#d3dde7"
        loginform.style.display = "flex";
        reset_input(form);
    });

    signup.addEventListener("click", function() {
        login.style.color = "black";
        loginform.style.display = "none";
        signup.style.color = "#d3dde7"
        signupform.style.display = "flex";
        reset_input(form);
    });

    show_pass[0].addEventListener("click", function() {
        if (password[0].type == "password") {
            password[0].type = "text";
            password[1].type = "text";
        } else {
            password[0].type = "password";
            password[1].type = "password";
        }
    });

    show_pass[1].addEventListener("click", function() {
        if (password[2].type == "password") {
            password[2].type = "text";
        } else {
            password[2].type = "password";
        }
    });

    show_pass[2].addEventListener("click", function() {
        if (password[3].type == "password") {
            password[3].type = "text";
            password[4].type = "text";
        } else {
            password[3].type = "password";
            password[4].type = "password";
        }
    });

    show_pass[3].addEventListener("click", function() {
        if (password[5].type == "password") {
            password[6].type = "text";
            password[5].type = "text";
        } else {
            password[5].type = "password";
            password[6].type = "password";
        }
    });

    username[0].addEventListener("input", function() {
        if (username[0].value.length === 0) {
            alert[0].style.display = "block";
        } else {
            alert[0].style.display = "none";
        }
    });

    password[2].addEventListener("input", function() {
        if (password[2].value.length === 0) {
            alert[1].style.display = "block";
        } else {
            alert[1].style.display = "none";
        }
    });

    username[1].addEventListener("input", function() {
        if (username[1].value.length === 0) {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }
    });

    email[0].addEventListener("input", function() {
        if (!email_regex.test(email[0].value)) {
            alert[4].style.display = "block";
        } else {
            alert[4].style.display = "none";
        }
        if (email[0].value.length === 0) {
            alert[3].style.display = "block";
            if (alert[4].style.display === "block") {
                alert[4].style.display = "none";
            }
        } else {
            alert[3].style.display = "none";
        }
    });

    password[3].addEventListener("input", function() {
        if (password[3].value.length === 0) {
            alert[5].style.display = "block";
        } else {
            alert[5].style.display = "none";
        }
    });

    password[4].addEventListener("input", function() {
        if (password[4].value.length === 0) {
            alert[6].style.display = "block";
            if (alert[7].style.display === "block") {
                alert[7].style.display = "none";
            }  
        } else {
            alert[6].style.display = "none";
        }

        if (password[4].value != password[3].value) {

            alert[7].style.display = "block";
        } else {
            alert[7].style.display = "none";
        }
    })
});