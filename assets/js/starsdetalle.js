const stars = document.querySelectorAll(".star1");
let rating = 0;

stars.forEach(star => {
    star.addEventListener("click", () => {
        const value = parseInt(star.getAttribute("data-value"));
        setRating(value);
    });
});

function setRating(value) {
    rating = value;
    stars.forEach(star => {
        const starValue = parseInt(star.getAttribute("data-value"));
        star.classList.toggle("active", starValue <= value);
    });
}
