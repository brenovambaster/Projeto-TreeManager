<?php
function search_attendance()
{
    // pesquisa pelo id passado da solicitação de servicos;

    $codSolicitacao = $_GET['id'];
    $sql = "SELECT * FROM atendimento inner join adm on(usuAtendente=idAdm ) where codServico ='$codSolicitacao'";
    return $sql;
}

function tabela($result)
{
    // vai receber o parametro do resultado da pesquisa $result = $con->query($sql1);
    if (mysqli_num_rows($result) == 0) {
        echo "<p class=' text-dark badge badge-warning '> Infelizmente ainda nao temos nenhum antendimento para o seu serviço.</p>";
    } else { ?>

        <table class=" table table-striped  ">
            <thead>
                <tr class="bg-success ">
                    <th scope="col">ID</th>
                    <th scope="col">CodServico</th>
                    <th scope="col">Atendente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Descrição</th>

                </tr>
            </thead>

            <tbody>
                <?php while ($info = mysqli_fetch_object($result)) { ?>
                    <tr>
                        <td><?php echo $info->idAtendimento; ?> </td>
                        <td><?php echo $info->codServico; ?> </td>
                        <td><?php echo $info->nome; ?> </td>
                        <td><?php echo $info->data; ?> </td>
                        <td><?php echo $info->descricao; ?> </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>



<?php
    }
}
function dadosSolicitacao()
{
    $idSolicitacao = $_GET['id'];
    $sql = "SELECT * FROM servico inner join tiposervico on(tipoServico =IdTipoServico) WHERE codServico='$idSolicitacao'";
    return $sql;
}
