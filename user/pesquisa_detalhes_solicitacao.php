<?php
function search_attendance_service()
{
    // pesquisa pelo id passado da solicitação de servicos;
    require_once("../00 - BD/bd_conexao.php");
    $codSolicitacao = $_GET['id'];
    $sql_atendimento = "SELECT * FROM atendimento inner join adm on(usuAtendente=idAdm ) where codServico ='$codSolicitacao'";
    $sql_service = "SELECT * FROM servico inner join tiposervico on(tipoServico =IdTipoServico) WHERE codServico='$codSolicitacao'";
    try {
        $result_service = $con->query($sql_service);
        $result_antendimento = $con->query($sql_atendimento);
    } catch (Exception $e) {
        echo "Erro ao pesquisar no banco:" . $e->getMessage();
    }
    fecharConexao($con);
    return $result = array(
        'atendimento' => $result_antendimento,
        'servico' => $result_service
    );
}

function tabela_atendimento($result)
{ // tabela de antendimento 


    if (mysqli_num_rows($result) == 0) {
        echo "<p class=' text-dark badge badge-warning '> Infelizmente ainda nao temos nenhum antendimento para a sua solicitação.</p>";
    } else { ?>

        <table class=" table table-striped  ">
            <thead>
                <tr class="bg-success ">
                    <th scope="col">ID</th>
                    <th scope="col">CodServico</th>
                    <th scope="col">Atendente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Descrição de atendimento</th>

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

function detalhes_solic_servico($infoSolicitacao)
{
    ?>

    <div class="form-group col-md-4 col-sm-8">
        <span class="badge badge-primary">Status: <?php echo $infoSolicitacao->statusSer; ?> </span>
        <label for="idservico"><b>ID serviço:</b></label>
        <input class="form-control" type="text" name="idservico" id="idservico" value="<?php echo $infoSolicitacao->codServico; ?>" disabled>
        <label for="CodArvore"><b>CodArvore:</b></label>
        <input class="form-control" type="text" name="CodArvore" id="CodArvore" value="<?php echo $infoSolicitacao->codArvore; ?>" disabled>
    </div>

    <div class="form-group col-md-7 col-sm-8">
        <label for="data"><b>Data:</b></label>
        <input class="form-control" type="text" name="data" id="data" value="<?php echo $infoSolicitacao->dataServico; ?>" disabled>
    </div>
    <div class="form-group col-md-7 col-sm-8">
        <label for="tipo"> <b>Tipo de serviço </b></label>
        <input class="form-control" type="text" name="serviço" id="tipo" value="<?php echo $infoSolicitacao->NomeServico; ?>" disabled>

    </div>
    <div class="form-group col-md-9 col-sm-8">
        <label for="des"><b> Descriçao do serviço:</b></label>
        <textarea class="form-control" name="descricao" id="desc" disabled> <?php echo $infoSolicitacao->descricao; ?> </textarea>

    </div>

<?php
}
