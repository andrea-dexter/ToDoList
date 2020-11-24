
<?php

    include_once "database/connection.php";

    $query = "SELECT * FROM todo WHERE idUser=1";

    // Query tramite nostra connessione
    $result = $connection->query($query);

    // Todo Array
    $todo_list = array();
    
    if($result->num_rows > 0) {
        
        foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
            array_push($todo_list, (object) $row);
        }
        
    } else {
        echo "Nessun todo trovato!";
    }
?>

<!DOCTYPE html>

<html>

    <head>
        
        <title>Todo List</title>

        <link rel="stylesheet" type="text/css" href="resources/css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">

    </head>

    <body>
        
        <!-- Prove per integrare Login di diversi utenti
        <a href="login.html"><button>Login</button></a>
        <a href="register.html"><button>Registrati!</button></a>
        -->
        
        
        <div id="container">
            
          <!--Form-->
          <div class="">
            <form class="" action="database/c_todo.php" method="post">

              <input type="text" name="todo" id="todo" value=""
              placeholder="Cosa hai da fare oggi?">


            </form>
          </div>
            
          <!--List-->
            
          <div>
            

            <ul id="todo-list">
                
                <?php foreach ($todo_list as $todo) :?>
              <li class="<?php if ($todo->completed) {
                        echo 'done';
                        }
                         ?>">
                  <div >
                      
                    <span>
                        <a href="<?php echo 'database/u_todo.php?idTodo=' . $todo->idTodo . '&idUser=1'?>">
                        </a>
                    </span>  
                  </div>

                  <p><?php echo $todo->text; ?></p>

                  <div class="importance <?php
                        switch ($todo->importance) {
                                
                            case 1:
                                echo 'low';
                                break;
                            case 2:
                                echo 'middle';
                                break;
                            case 3:
                                echo 'high';
                                break;
                            default:
                                echo '';
                                break;
                        }
                              
                    ?>"><?php
                        switch ($todo->importance) {
                                
                            case 1:
                                echo '!';
                                break;
                            case 2:
                                echo '!!';
                                break;
                            case 3:
                                echo '!!!';
                                break;
                            default:
                                echo '';
                                break;
                            }
                      ?>
                      </div>

                  <a href="<?php echo 'database/d_todo.php?idTodo=' . $todo->idTodo . '&idUser=1'?>">x</a>

              </li>
                <?php endforeach;?>

            </ul>
          </div>

        </div>



    </body>

</html>
