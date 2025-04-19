document.addEventListener("DOMContentLoaded", function() {
    const user_image = document.getElementById("user-image");
    const file_upload = document.getElementById("file-upload");
    const new_category = document.getElementById("new-category");
    const selection_return = document.getElementById("selection-return");
    const new_cate_lead = document.getElementById("to-new-cate");
    const old_cate = document.getElementById("old-cate");
    const alert = document.querySelectorAll(".alert");
    const product_name = document.getElementById("product-name");
    const new_cate = document.getElementById("new-cate");

    file_upload.addEventListener("change", function() {
        const reader = new FileReader();
        reader.onload = function () {
            user_image.src = reader.result;
        };
        if (file_upload.files[0]) {
            reader.readAsDataURL(file_upload.files[0]);
        }
    });

    new_cate_lead.addEventListener("click", function() {
        old_cate.style.display = "none";
        new_category.style.display = "flex";
    });

    selection_return.addEventListener("click", function() {
        old_cate.style.display = "flex";
        new_category.style.display = "none";
    });

    product_name.addEventListener("input", function() {
        if (product_name.value.trim() === "") {
            alert[0].style.display = "block";
        } else {
            alert[0].style.display = "none";
        }

        if (product_name.value.trim().length < 1 || product_name.value.trim().length > 30) {
            alert[1].style.display = "block";
        } else {
            alert[1].style.display = "none";
        }
    });

    new_cate.addEventListener("input", function() {
        if (new_cate.value.trim() === "") {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }

        if (new_cate.value.trim().length < 1 || new_cate.value.trim().length > 30) {
            alert[3].style.display = "block";
        } else {
            alert[3].style.display = "none";
        }
    });
});