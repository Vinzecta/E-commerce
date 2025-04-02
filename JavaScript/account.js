document.addEventListener("DOMContentLoaded", function() {
    const login = document.getElementById("login");
    const signup = document.getElementById("signup");
    const loginform = document.getElementById("sign-in");
    const signupform = document.getElementById("sign-up");
    const show_pass = document.getElementsByClassName("show-password");
    const password = document.getElementsByClassName("password");
    const repassword = document.getElementsByClassName("re-type-password");
    const login_return = document.getElementById("login-return");
    const option = document.getElementById("option");
    const forgot = document.getElementById("forgot-password");
    const forgot_password = document.getElementById("forgot");
    const form = document.getElementsByTagName("form");

    function reset_input(input) {
        for (let i = 0; i < input.length; i++) {
            input[i].reset();
        }
    }

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
        if (password[0].type === "password") {
            password[0].type = "text";
        } else {
            password[0].type = "password";
        }
    });

    show_pass[1].addEventListener("click", function() {
        if (password[1].type === "password") {
            password[1].type = "text";
            repassword[0].type = "text";
        } else {
            password[1].type = "password";
            repassword[0].type = "password";
        }
    });

    show_pass[2].addEventListener("click", function() {
        if (password[2].type === "password") {
            password[2].type = "text";
            repassword[1].type = "text";
        } else {
            password[2].type = "password";
            repassword[1].type = "password";
        }
    });

    login_return.addEventListener("click", function() {
        option.style.display = "flex";
        loginform.style.display = "flex";
        forgot.style.display = "none";
        reset_input(form);
    });

    forgot_password.addEventListener("click", function() {
        forgot.style.display = "flex";
        loginform.style.display = "none";
        reset_input(form);
    });
});