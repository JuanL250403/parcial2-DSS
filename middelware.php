    <?php
    session_start();
    if (!isset($_SESSION['sesion'])) {
        header('Location: login.php');
    }
    session_abort();
    ?>