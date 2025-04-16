document.addEventListener("DOMContentLoaded", function() {
    const left_slideshow = document.querySelectorAll(".slideshow-title");
    const slideshow = document.getElementsByClassName("left-slideshow-content");
    const img = document.querySelectorAll(".left-slideshow-content img");

    left_slideshow.forEach(function(i) {
        i.addEventListener("click", function() {
            for (let y = 0; y < 4; y++) {
                if (left_slideshow[y] == i) {
                    i.style.color = "#d3dde7";
                    slideshow[y].style.display = "block";
                    continue;
                }
                if (left_slideshow[y].style.color != "black") {
                    left_slideshow[y].style.color = "black";
                    slideshow[y].style.display = "none";
                }
            }
        });
    });
});

