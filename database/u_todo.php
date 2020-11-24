<?php
    
        include_once "connection.php";

    $query = "SELECT * FROM todo WHERE idUser= " . $_GET['idUser'] . " AND idTodo= " . $_GET['idTodo'];

    // Query tramite nostra connessione
    $result = $connection->query($query);
    
    if($result->num_rows > 0) {
        
        $todo = $result->fetch_assoc();
        
        if($todo['completed']==1) {
            
            $query= "UPDATE todo SET completed=0 WHERE idUser= " . $_GET['idUser'] . " AND idTodo= " . $_GET['idTodo'];
            
        } else {
            
            $query= "UPDATE todo SET completed=1 WHERE idUser= " . $_GET['idUser'] . " AND idTodo= " . $_GET['idTodo'];
            
        }
        
        if ($connection->query($query) === true) {
        
        // Redirect alla pagina principale della nostra applicazione che nel caso è la nostra index.php
        header("Location: ../index.php");
        
        } else {

            // Errore
            echo "Errore: " . $query . '<br />' . $connection->connect_error;

        }
        
    } else {
        
        echo "Nessun todo trovato!";
        
    }



?>