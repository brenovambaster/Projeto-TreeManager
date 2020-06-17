<?php
require_once('./00 - BD/bd_conexao.php');

$sql = "SELECT * FROM usuario;";

$result = $con->query($sql);

if($result){
    $rows = $result->num_rows;
    for($i = 0; $i < $rows; $i++){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo htmlspecialchars($row['email']) . ': ';
        $result->data_seek($i);
        echo htmlspecialchars($row['senha']) . '<br>';
    }
    $result->close();
    $con->close();
}else echo $con->connect_error;