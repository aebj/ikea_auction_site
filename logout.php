<?php

session_start();

// Slutter sessionen med at tømme $_SESSION variablen

session_destroy();

header('Location: homepage.php');

?>
