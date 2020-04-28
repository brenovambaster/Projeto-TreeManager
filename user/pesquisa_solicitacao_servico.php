
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
        ?>

