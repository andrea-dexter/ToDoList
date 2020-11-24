<?php
    $servername="localhost";
    $username="root";
    $password="root";
    $databasename="todo_project";

    // Connessione
    $connection=new mysqli($servername, $username, $password, $databasename);

    // Check di connessione
    if ($connection->connect_error) {
        die("Connection error: ".$connection->connect_error);
    }

?>