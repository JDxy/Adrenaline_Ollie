let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  const slides = document.querySelectorAll('.section-2 .slider img');
  for (i = 0; i < slides.length; i++) {
    slides[i].classList.remove('active');
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].classList.add('active');
  setTimeout(showSlides, 3000); // Cambiar imagen cada 3 segundos
}

document.addEventListener("DOMContentLoaded", function() {
  const aviso = document.getElementById("aviso");
  const cerrar = document.getElementById("cerrar");

  function mostrarAviso() {
    aviso.style.display = "flex";
  }

  function cerrarAviso() {
    aviso.style.display = "none";
  }

  setTimeout(mostrarAviso, 2000); // muestra el aviso después de 2 segundos

  cerrar.addEventListener("click", cerrarAviso);
});



  