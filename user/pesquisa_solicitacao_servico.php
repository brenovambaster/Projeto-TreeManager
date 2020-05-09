<?php
require_once('../00 - BD/bd_conexao.php');

$sql = determinaPesquisaSql(); // retorna o total de  dados da colsulta que o usuário escolheu. Com filtro ou nao;
$resultado = $con->query($sql['sql']); // basicamente o que interessa nessa busca são os números de registros;
$linhas_por_pagina = 4;
$num_linhas = mysqli_num_rows($resultado); // captura a quantidade de registros no bd para aquela consulta;
$total_paginas = ceil($num_linhas / $linhas_por_pagina);

if (isset($_GET['pagina']) && is_numeric($_GET['pagina'])) {
        $pagina = (int) $_GET['pagina'];
} else {
        $pagina = 1;
}
if ($pagina > $total_paginas) {
        $pagina = $total_paginas;
}
if ($pagina < 1) {
        $pagina = 1;
}

$offset = ($pagina - 1) * $linhas_por_pagina;

$sql2 = paginacao($sql, $offset, $linhas_por_pagina); // array  com paginacao sql e o filtro de pesquisa se houver;
$result = $con->query($sql2['sql']);
// mostrar resultado em um objt com paginação
if (mysqli_num_rows($result) == 0) {
        echo "<h5>Sua pesquisa não gerou nenhum resultado. Ou você ainda não possui nenhum registro de 
                solicitação de serviço.</h5>";
} else {
        verTabela($result);

        //PEGANDO E TRABALHANDO OS INPUTS PARA QUE POSSA NAVEGAR NA PAGINACAO COM OS VALORES INSERIDOS PELO USUÁRIO. 
        $data = '';
        $codArvore = '';
        if (!empty($_GET['data'])) {
                $data = $_GET['data'];
        }
        if (!empty($_GET['codArvore'])) {
                $codArvore = $_GET['codArvore'];
        }
        $pesquisa = 'pesquisa';

        //-----------PAGINACAO------------------------
        $max_link = 2;
        echo "<ul class='pagination'> 
        <li class='page-item'>
        
            <a class='page-link' href='solicitacoes.php?pagina=1&data=$data&codArvore=$codArvore&pesquisa=$pesquisa' tabindex='-1'>Primeira</a>
        </li>";
        // adciona no máximo dois links antecessores referente a pg atual;
        for ($pg_anterior = $pagina - $max_link; $pg_anterior < $pagina; $pg_anterior++) {
                if ($pg_anterior >= 1) {

                        $estilo = '';
                        if ($pg_anterior == $pagina) {
                                $estilo = "active";
                        }

                        echo "
                <li class='page-item " .  $estilo  . "'>
                    <a class='page-link' href='solicitacoes.php?pagina=$pg_anterior&data=$data&codArvore=$codArvore&pesquisa=$pesquisa' >$pg_anterior</a>
                </li>";
                }
        }
        echo "
        <li class='page-item active '>
            <a class='page-link'>$pg_anterior</a>
        </li>";

        // =========== link máximo sucessor
        // adciona no máximo 2 links sucessores referente a pg atual.
        for ($pg_sucessor = $pagina + 1; $pg_sucessor <= $pagina + $max_link; $pg_sucessor++) {
                if ($pg_sucessor <= $total_paginas) {

                        $estilo = '';
                        if ($pg_sucessor == $pagina) {
                                $estilo = "active";
                        }

                        echo "
                <li class='page-item " .  $estilo . "'>
                <a class='page-link' href='solicitacoes.php?pagina=$pg_sucessor&data=$data&codArvore=$codArvore&pesquisa=$pesquisa'>$pg_sucessor</a>
                </li>";
                }
        }
        echo "
            <li class='page-item'>
            <a class='page-link' href='solicitacoes.php?pagina=$total_paginas&data=$data&codArvore=$codArvore&pesquisa=$pesquisa' tabindex='-1'>Última</a>
            </li>
       </ul>";
}

function determinaPesquisaSql()
{
        $data = '';
        $codArvore = '';
        $idUsu = $_SESSION['idUsu'];
        if (!isset($_GET['pesquisa'])) {
                $filtro = "";
                $sql = " SELECT * from servico    inner join tiposervico  on(tipoServico = IdTipoServico) where usuSolicitante = '$idUsu' ORDER BY statusSer asc "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE
                $escolha_de_pesquisa = 1;
        }
        if (isset($_GET['pesquisa'])) {

                $data = $_GET['data'];
                $codArvore = $_GET['codArvore'];

                if (!empty($data) && empty($codArvore)) {
                        $escolha_de_pesquisa = 2;
                        // pesquisar por data
                        $filtro = "Filtro por data";
                        $sql = "SELECT * from servico inner join tiposervico on (tipoServico = IdTipoServico) where usuSolicitante = '$idUsu' AND  dataServico ='$data'";
                } else if (!empty($codArvore) && empty($data)) {
                        $escolha_de_pesquisa = 3;
                        // pesquisar por codArvore
                        $sql = "SELECT * FROM servico inner join tiposervico on (tipoServico=IdTipoServico) where usuSolicitante = '$idUsu' AND codArvore = '$codArvore'";
                        $filtro = "Filtro por CodArvore";
                }
                if (!empty($data) && !empty($codArvore)) {
                        $escolha_de_pesquisa = 4;
                        // pesquisar pelos dois campos
                        $filtro = "Filtro por data e codArvore";
                        $sql = "SELECT * FROM servico inner join tiposervico on (tipoServico=IdTipoServico) where usuSolicitante = '$idUsu'AND codArvore ='$codArvore' AND dataServico='$data'";
                }
                if (empty($data) && empty($codArvore)) {
                        $escolha_de_pesquisa = 5;
                        // pesquisa sem filtro;
                        $filtro = "";
                        $sql = " SELECT * from servico    inner join tiposervico  on(tipoServico = IdTipoServico) where usuSolicitante = '$idUsu' ORDER BY statusSer asc "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE

                }
        }
        return  $sql = array(
                'sql' => $sql,
                'filtro' => $filtro,
                'escolha_de_pesquisa' => $escolha_de_pesquisa,
                'idUsu' => $idUsu,
                'data' => $data,
                'codArvore' => $codArvore
        );
}


function verTabela($result)
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

                        <?php while ($infoSol = mysqli_fetch_object($result)) { ?>
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

function paginacao($array_datermina_pesquisa, $offset, $linhas_por_pagina)
{
        $idUsu = $array_datermina_pesquisa['idUsu'];
        $escolha_de_pesquisa = $array_datermina_pesquisa['escolha_de_pesquisa'];
        $filtro = $array_datermina_pesquisa['filtro'];
        $data = $array_datermina_pesquisa['data'];
        $codArvore = $array_datermina_pesquisa['codArvore'];

        if ($escolha_de_pesquisa == 1) {

                $sql = " SELECT * from servico    inner join tiposervico  on(tipoServico = IdTipoServico) 
                where usuSolicitante = '$idUsu' ORDER BY statusSer asc  LIMIT $offset, $linhas_por_pagina "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE
        }
        if ($escolha_de_pesquisa == 2) {
                // pesquisar por data
                $sql = "SELECT * from servico inner join tiposervico on (tipoServico = IdTipoServico)
                where usuSolicitante = '$idUsu' AND  dataServico ='$data' LIMIT $offset, $linhas_por_pagina";
        }
        if ($escolha_de_pesquisa == 3) {
                // pesquisar por codArvore
                $sql = "SELECT * FROM servico inner join tiposervico on (tipoServico=IdTipoServico) 
                where usuSolicitante = '$idUsu' AND codArvore = '$codArvore' LIMIT $offset, $linhas_por_pagina ";
        }
        if ($escolha_de_pesquisa == 4) {
                // pesquisar pelos dois campos
                $sql = "SELECT * FROM servico inner join tiposervico on (tipoServico=IdTipoServico)
                 where usuSolicitante = '$idUsu'AND codArvore ='$codArvore' AND dataServico='$data' LIMIT $offset, $linhas_por_pagina";
        }
        if ($escolha_de_pesquisa == 5) {
                // pesquisa sem filtro;
                $sql = " SELECT * from servico    inner join tiposervico  on(tipoServico = IdTipoServico) 
                where usuSolicitante = '$idUsu' ORDER BY statusSer asc LIMIT $offset, $linhas_por_pagina "; // SELECIONA OS USUARIOS POR ORDEM ALFABÉTICA CRESCENTE

        }
        return $sql = array(
                'sql' => $sql,
                'filtro' => $filtro
        );
}


fecharConexao($con);
?>