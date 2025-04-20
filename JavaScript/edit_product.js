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
    const description = document.getElementById("product-description");
    const price = document.getElementById("product-price");
    const button = document.getElementById("submit-product");
    const input = document.getElementsByTagName("input");
    const textarea = document.getElementsByTagName("textarea");

    file_upload.addEventListener("change", function() {
        const reader = new FileReader();
        reader.onload = function () {
            user_image.src = reader.result;
        };
        if (file_upload.files[0]) {
            reader.readAsDataURL(file_upload.files[0]);
        }
    });

    // new_cate_lead.addEventListener("click", function() {
    //     old_cate.disabled = true;
    //     new_category.disabled = false;
    //     old_cate.style.display = "none";
    //     new_category.style.display = "flex";
    // });

    // selection_return.addEventListener("click", function() {
    //     old_cate.disabled = false;
    //     new_category.disabled = true;
    //     old_cate.style.display = "flex";
    //     new_category.style.display = "none";
    //     alert[2].style.display = "none";
    //     alert[3].style.display = "none";
    // });

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

    // new_cate.addEventListener("input", function() {
    //     if (new_cate.value.trim() === "") {
    //         alert[2].style.display = "block";
    //     } else {
    //         alert[2].style.display = "none";
    //     }

    //     if (new_cate.value.trim().length < 1 || new_cate.value.trim().length > 30) {
    //         alert[3].style.display = "block";
    //     } else {
    //         alert[3].style.display = "none";
    //     }
    // });

    description.addEventListener("input", function() {
        if (description.value.trim() === "") {
            alert[2].style.display = "block";
        } else {
            alert[2].style.display = "none";
        }

        if (description.value.trim().length < 1 || description.value.trim().length > 200) {
            alert[3].style.display = "block";
        } else {
            alert[3].style.display = "none";
        }
    });

    price.addEventListener("keydown", function(e) {
        if (["e", "E", "+", "-"].includes(e.key)) {
            e.preventDefault();
        }
    });

    price.addEventListener('paste', function (e) {
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        if (/[eE\+\-]/.test(paste)) {
          e.preventDefault();
        }
      });

    price.addEventListener("input", function() {
        if (price.value.trim() === '') {
            alert[4].style.display = "block";
        } else {
            alert[4].style.display = "none";
        }

        if (price.value < 0) {
            alert[5].style.display = "block";
        } else {
            alert[5].style.display = "none";
        }
    });

    button.addEventListener("click", function(e) {
        let valid = true;
        for (let i = 1; i < input.length; i++) {
            if (input[i].value.trim() === '') {
                console.log(i);
                valid = false;
                break;
            }
        }
        
        for (let i = 0; i < textarea.length; i++) {
            if (textarea[i].value.trim() === '') {
                valid = false;
                break;
            }
        }

        for (let i = 0; i < alert.length; i++) {
            if (alert[i].style.display === "block") {
                console.log("OK");
                valid = false;
                break;
            }
        }

        if (!valid) {
            e.preventDefault();
        }
    });
});