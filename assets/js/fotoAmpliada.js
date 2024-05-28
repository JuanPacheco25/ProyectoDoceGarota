// Obtén todas las miniaturas de imágenes
var fotosMiniatura = document.querySelectorAll('.foto1');

// Obtén el contenedor de la imagen ampliada
var imagenAmpliada = document.querySelector('.imagen-ampliada');
var imagenAmpliadaContenido = document.getElementById('imagenAmpliada');
var cerrarAmpliada = document.getElementById('cerrarAmpliada');

// Agrega un evento de clic a cada miniatura de imagen
fotosMiniatura.forEach(function(foto) {
    foto.addEventListener('click', function() {
        // Establece la fuente de la imagen ampliada como la fuente de la miniatura clicada
        imagenAmpliadaContenido.src = this.src;
        
        // Muestra la imagen ampliada
        imagenAmpliada.style.display = 'block';

        // Agrega la clase 'abierta' para cambiar el cursor
        imagenAmpliada.classList.add('abierta');
    });
});

// Agrega un evento de clic para cerrar la imagen ampliada
cerrarAmpliada.addEventListener('click', function() {
    // Oculta la imagen ampliada
    imagenAmpliada.style.display = 'none';

    // Remueve la clase 'abierta' para restaurar el cursor normal
    imagenAmpliada.classList.remove('abierta');
});
