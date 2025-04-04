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
    const user_image = document.getElementById("user-image");
    const file_upload = document.getElementById("file-upload");
    const profile = document.getElementById("my-account");
    const purchase = document.getElementById("purchase-history");
    const reset_password = document.getElementById("reset-password");
    const hover_list = document.querySelectorAll(".list-container");
    const right_content = document.querySelectorAll(".right-content");

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
        option.style.display = "none";
        reset_input(form);
    });
    
    file_upload.addEventListener("change", function() {
        const reader = new FileReader();
        reader.onload = function () {
            user_image.src = reader.result;
        };
        if (file_upload.files[0]) {
            reader.readAsDataURL(file_upload.files[0]);
        }
    });

    profile.addEventListener("click", function() {
        let a = 0;
        for (let i = 0; i < hover_list.length; i++) {
            if (i === a) {
                continue;
            }
            if (hover_list[i].style.backgroundColor != "white") {
                hover_list[i].style.backgroundColor = "white";
            }
            if (right_content[i].style.display != "none") {
                right_content[i].style.display = "none";
            }
        }
        right_content[a].style.display = "flex";
        hover_list[a].style.backgroundColor = "#f2f2f2";
    });

    purchase.addEventListener("click", function() {
        let a = 1;
        for (let i = 0; i < hover_list.length; i++) {
            if (i === a) {
                continue;
            }
            if (hover_list[i].style.backgroundColor != "white") {
                hover_list[i].style.backgroundColor = "white";
            }
            if (right_content[i].style.display != "none") {
                right_content[i].style.display = "none";
            }
        }
        right_content[a].style.display = "flex";
        hover_list[a].style.backgroundColor = "#f2f2f2";
    });

    reset_password.addEventListener("click", function() {
        let a = 2;
        for (let i = 0; i < hover_list.length; i++) {
            if (i === a) {
                continue;
            }
            if (hover_list[i].style.backgroundColor != "white") {
                hover_list[i].style.backgroundColor = "white";
            }
            if (right_content[i].style.display != "none") {
                right_content[i].style.display = "none";
            }
        }
        right_content[a].style.display = "flex";
        hover_list[a].style.backgroundColor = "#f2f2f2";
    });
});