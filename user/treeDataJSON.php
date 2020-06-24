<?php
header('Content-type: application/json; charset=UTF-8');
require_once('../00 - BD/bd_conexao.php');
$sql = "SELECT  idArvore, latitude, longitude,NomeCientifico, Rua FROM arvore;";
$result = $con->query($sql);
$meus_dados = array();
$i = 0;
$meus_dados['type'] = 'FeatureCollection';
$meus_dados['features'] = [];
while ($resultado =  mysqli_fetch_object($result)) {
    $lng = (float) $resultado->longitude;
    $lat = (float) $resultado->latitude;
    $id = (int) $resultado->idArvore;
    $rua = ($resultado->Rua);
    $desciption = "<p> ID: $id, Rua: $rua ,</br> <a href='leitura_arvore.php?id=$id'>Ver dados</a> </p>  <a href='solicitar_servico.php?id=$id'>Solicitar serviço</a>";
    $meus_dados['features'][$i] = ['idArvore' => $id, 'type' => 'Feature', 'geometry' =>
    ['type' => 'Point', 'coordinates' => [$lng, $lat]], 'properties' =>
    ['title' => '', 'icon' => 'park', 'description' => $desciption]];

    $i++;
}

echo json_encode($meus_dados);
fecharConexao($con);
?>