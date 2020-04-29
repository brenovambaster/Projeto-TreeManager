<?php
require_once('../00 - BD/bd_conexao.php');


function determinaPesquisaSql()
{
        $idUsu = $_SESSION['idUsu'];
        if (!isset($_GET['pesquisa'])) {
                $filtro = "";
                $sql = " SELECT * from servico    inner join tiposervico  on(tipoServico = IdTipoServico) where usuSolicitante = '$idUsu' ORDER BY statusSer asc "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE

        }
        if (isset($_GET['pesquisa'])) {

                $data = $_GET['data'];
                $codArvore = $_GET['codArvore'];


                if (!empty($data) && empty($codArvore)) {

                        // pesquisar por data
                        $filtro = "Filtro por data";
                        $sql = "SELECT * from servico inner join tiposervico on (tipoServico = IdTipoServico) where usuSolicitante = '$idUsu' AND  dataServico ='$data'";
                } else if (!empty($codArvore) && empty($data)) {
                        // pesquisar por codArvore
                        $sql = "SELECT * FROM servico inner join tiposervico on (tipoServico=IdTipoServico) where usuSolicitante = '$idUsu' AND codArvore = '$codArvore'";
                        $filtro = "Filtro por CodArvore";
                }
                if (!empty($data) && !empty($codArvore)) {
                        // pesquisar pelos dois campos
                        $filtro = "Filtro por data e codArvore";
                        $sql = "SELECT * FROM servico inner join tiposervico on (tipoServico=IdTipoServico) where usuSolicitante = '$idUsu'AND codArvore ='$codArvore' AND dataServico='$data'";
                }
                if (empty($data) && empty($codArvore)) {
                        // pesquisa sem filtro;

                        $filtro = "";
                        $sql = " SELECT * from servico    inner join tiposervico  on(tipoServico = IdTipoServico) where usuSolicitante = '$idUsu' ORDER BY statusSer asc "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE

                }
        }
        return  $sql = array(
                'sql' => $sql,
                'filtro' => $filtro
        );
}

$sql = determinaPesquisaSql();
$resultado = $con->query($sql['sql']);
fecharConexao($con);
if (mysqli_num_rows($resultado) == 0) {
        echo "<h5>Sua pesquisa não gerou nenhum resultado. Ou você ainda não possui nenhum registro de 
                solicitação de serviço.</h5>";
} else {
        verTabela($resultado);
}


function verTabela($resultado)
{
?>
        <table class="table table-striped  ">
                <thead>
                        <tr class="bg-success ">
                                <th scope="col">ID</th>
                                <th scope="col">CodAvore</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo Servico</th>
                                <th scope="col">Status</th>
                                <th>Descrição</th>
                        </tr>
                </thead>
                <tbody>

                        <?php while ($infoSol = mysqli_fetch_object($resultado)) { ?>
                                <tr>
                                        <th> <?php echo $infoSol->codServico; ?> </th>
                                        <th> <?php echo $infoSol->codArvore; ?> </th>
                                        <td>
                                                <?php
                                                $date = DateTime::createFromFormat('Y-m-d', $infoSol->dataServico);
                                                echo $date->format('d/m/Y');
                                                ?>
                                        </td>

                                        <td><?php echo $infoSol->NomeServico; ?></td>
                                        <th>


                                                <?php echo $infoSol->statusSer;  ?>

                                        </th>
                                        <td>
                                                <a class="btn-link" href="detalhes_solicitacao.php?id=<?php echo $infoSol->codServico; ?>">
                                                        <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                                                <?php echo $infoSol->descricao; ?>
                                                        </span>
                                                </a>
                                        </td>
                                        </div>


                                        </td>
                                </tr>
                        <?php } // fechar while 
                        ?>
                </tbody>

        </table>

<?php

}

?>