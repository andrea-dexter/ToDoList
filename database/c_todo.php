<?php

    include_once "connection.php";
    

    $query = "INSERT INTO todo (idUser, text, importance, completed, createdAt) VALUES (1, '" . $_POST['todo'].  " ', DEFAULT, 0, '" . date('Y-m-d H:i:s'). "' )";

    if ($connection->query($query) === true) {
        
        // Redirect alla pagina principale della nostra applicazione che nel caso è la nostra index.php
        header("Location: ../index.php");
        
    } else {
        
        // Errore
        echo "Errore: " . $query . '<br />' . $connection->connect_error;
        
    }

?>