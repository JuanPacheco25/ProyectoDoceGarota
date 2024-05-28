const stars = document.querySelectorAll(".star");
let rating = 0;

stars.forEach(star => {
    star.addEventListener("click", () => {
        const value = parseInt(star.getAttribute("data-value"));
        rating = value;
        updateRating();
    });
});

function updateRating() {
    stars.forEach(star => {
        const value = parseInt(star.getAttribute("data-value"));
        if (value <= rating) {
            star.classList.add("active");
        } else {
            star.classList.remove("active");
        }
    });
}


// Función para mostrar/ocultar la lista al hacer clic en el botón
const botonMostrar = document.getElementById("mostrarLista");
const lista = document.getElementById("todos");
let visible = false;

botonMostrar.addEventListener("click", () => {
    if (!visible) {
        lista.style.display = "block";
        visible = true;
    } else {
        lista.style.display = "none";
        visible = false;
    }
});

