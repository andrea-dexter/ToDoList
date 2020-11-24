<?php
    
    include_once "connection.php";

    $query = "DELETE FROM todo WHERE idUser= " . $_GET['idUser'] . " AND idTodo= " . $_GET['idTodo'];
        
    $connection->query($query);
     
    // Redirect alla pagina principale della nostra applicazione che nel caso è la nostra index.php
    header("Location: ../index.php");


?>