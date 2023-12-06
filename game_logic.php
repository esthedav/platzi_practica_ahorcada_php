<?php

// function hangmanImg($attemps) {
//     switch ($attemps) {
//         case 6:
//             return '<img src="./img/6.png" alt="intento-6">';
//         case 5:
//             return '<img src="./img/5.png" alt="intento-5">';
//         case 4:
//             return '<img src="./img/4.png" alt="intento-4">';
//         case 3:
//             return '<img src="./img/3.png" alt="intento-3">';
//         case 2:
//             return '<img src="./img/2.png" alt="intento-2">';
//         case 1:
//             return '<img src="./img/1.png" alt="intento-1">';
//         case 0:
//             return '<img src="./img/0.png" alt="intento-0">';
//         default:
//             return "Some mistake happens";
//     }
// }

function hangmanImg($attempts) {
    $imageName = ($attempts >= 0 && $attempts <= 6) ? $attempts : 404; // Imagen por defecto para errores
    return "<img src=\"./img/{$imageName}.png\" alt=\"intento-{$imageName}\">";
}


$words = array(
    "computadora", "internet", "telefono", "teclado", "raton", "pantalla", "ventana",
    "musica", "video", "juego", "archivo", "carpeta", "lenguaje", "codigo", "aplicacion", "software",
    "hardware", "conexion", "red", "correo", "usuario", "seguridad", "tecnologia",
    "usb", "bluetooth", "inalambrico"
);


session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset'])) {
    session_unset();
    session_destroy();

    $_SESSION['randomWord'] = $words[array_rand($words)];
    $_SESSION['letters'] = str_split($_SESSION['randomWord']);
    $_SESSION['attempts'] = 6;
    $_SESSION['correctGuesses'] = [];
    $_SESSION['lenWord'] = count(array_unique($_SESSION['letters']));
    session_start();
}

// Inicializar variables de sesión si no están definidas
if (!isset($_SESSION['randomWord'])) {
    $_SESSION['randomWord'] = $words[array_rand($words)];
    $_SESSION['letters'] = str_split($_SESSION['randomWord']);
    $_SESSION['attempts'] = 6;
    $_SESSION['correctGuesses'] = [];
    $_SESSION['lenWord'] = count(array_unique($_SESSION['letters']));
}

// Validar la letra ingresada
if ($_SERVER["REQUEST_METHOD"] === "POST" && !isset($_POST['reset'])) {
    
    $letter = strtolower($_POST['letter']);

    if (in_array($letter, $_SESSION['letters'])) {
        $_SESSION['correctGuesses'][] = $letter;
        $_SESSION['lenWord']--;
    } else {
        $_SESSION['attempts']--;
    }
}

// Display word
$displayWord = '';
foreach ($_SESSION['letters'] as $wordLetter) {
    if (in_array($wordLetter, $_SESSION['correctGuesses'])) {
        $displayWord .= '<div class="letter-box">' . $wordLetter . '</div>';
    } else {
        $displayWord .= '<div class="letter-box empty"></div>';
    }
}





?>
