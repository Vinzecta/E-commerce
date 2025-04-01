document.addEventListener("DOMContentLoaded", function() {
    const login = document.getElementById("login");
    const signup = document.getElementById("signup");
    const loginform = document.getElementById("sign-in");
    const signupform = document.getElementById("sign-up");
    const show_pass = document.getElementsByClassName("show-password");
    const password = document.getElementsByClassName("password");
    const repassword = document.getElementsByClassName("re-type-password")

    login.addEventListener("click", function() {
        signup.style.color = "black";
        signupform.style.display = "none";
        login.style.color = "#d3dde7"
        loginform.style.display = "flex";
    });

    signup.addEventListener("click", function() {
        login.style.color = "black";
        loginform.style.display = "none";
        signup.style.color = "#d3dde7"
        signupform.style.display = "flex";
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
    })
});