<!-- como obtener una imagen en un input de una url y mostrarla -->
<?php
// URL de la imagen
$url = "https://contents.mediadecathlon.com/p1645122/k$4325a6ca56dd59e9c9518efd1f4e6b75/sq/8523398.jpg?format=auto&f=800x0";

// Obtiene los datos de la imagen
$imageData = file_get_contents($url);

// Indica que se trata de una imagen y define el tipo de contenido
header("Content-type: image/jpeg");

// Imprime los datos de la imagen
echo $imageData;
?>


