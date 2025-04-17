document.addEventListener("DOMContentLoaded", function() {
    const plus_icon = document.getElementById("plus-icon");
    const drop_down = document.getElementById("drop-down");
    let clickCount = 0;

    plus_icon.addEventListener("click", function() {
        clickCount++;
        if (clickCount % 2 != 0) {
            drop_down.style.display = "block";
        } else {
            drop_down.style.display = "none";
        }
    });
});