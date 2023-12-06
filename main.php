
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Practice of PHP from a course of platzi">
    <meta name="keywords" content="PHP, html">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="./img/superman.png" type="image/x-icon">
    <title>Juego de Ahorcado</title>
</head>
<body>

    <main class="main-container">

        <h1>Juego de Ahorcado</h1>

        <?php
            require_once './game_logic.php';
            $attempsImage = hangmanImg($_SESSION['attempts']);
        ?>
            
        <figure class="hangmanImg-container">
            <?php echo $attempsImage ?>
        </figure>

        <div class="letters-container">
            <?php echo "<div class='word-container'>$displayWord</div>"; ?>
        </div>
        
        <?php
            // echo $_SESSION['randomWord'];
            // echo "<p>Intentos restantes: {$_SESSION['attempts']}</p>";
            // echo "<p>lenWord: {$_SESSION['lenWord']}</p>";
            // Lógica para mostrar el formulario o el mensaje de juego terminado
        ?>
            
            
        <?php
            if (isset($_SESSION['attempts']) && $_SESSION['attempts'] > 0 && $_SESSION['lenWord'] > 0) {
        ?>
    </main>
        <form class="form-container" method="post">
            <input type="text" name="letter" maxlength="1" pattern="[A-Za-z]" title="Introduce una sola letra alfabética" placeholder="Introduce una letra" required autofocus>
            <input type="submit">
        </form>
    <?php
    } elseif ($_SESSION['lenWord'] <= 0) {
    ?>
            <h2>Felicidades has ganado</h2>
        <form method="post">
            <input type="submit" value="Reiniciar juego" name="reset">
        </form>
    <?php
    }else {
    ?>
        <?php echo "<h2>Perdiste la palabra era: {$_SESSION['randomWord']}</h2>"?>
        <form method="post">
            <input type="submit" value="Reiniciar juego" name="reset">
        </form>
    <?php
    }
    ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
