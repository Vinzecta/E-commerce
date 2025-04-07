document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementsByTagName("form");
    const user_image = document.getElementById("user-image");
    const file_upload = document.getElementById("file-upload");
    const profile = document.getElementById("my-account");
    const purchase = document.getElementById("purchase-history");
    const reset_password = document.getElementById("reset-password");
    const hover_list = document.querySelectorAll(".list-container");
    const right_content = document.querySelectorAll(".right-content");
    
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
        hover_list[a].style.fontWeight = "bold";
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
        hover_list[a].style.fontWeight = "bold";
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
        hover_list[a].style.fontWeight = "bold";
    });
})