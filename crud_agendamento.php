<?php
include "banco.php";
# verifica se o campo ativo possui algum valor , senão ele atribui o N e salva no banco
if(isset($_REQUEST["ativo"])) {
    $ativo = $_REQUEST["ativo"];
}  else {
    $ativo = "N";
}
if(isset($_REQUEST["cod_servico"])) {
    if(isset($_REQUEST["excluir"])) {
          
        $consulta = "DELETE FROM agendamento WHERE cod_servico = " . $_REQUEST["cod_servico"];
        # a variavel operacao está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
        # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 3;
    } else {
        $consulta = "UPDATE agendamento SET data_agendamento = '".$_REQUEST["data_agendamento"]."', tipo_atendimento = '".$_REQUEST["tipo_atendimento"]."', horario = '".$_REQUEST["horario"]."', telefone = '".$_REQUEST["telefone"]."' WHERE cod_servico = ".$_REQUEST["cod_servico"]."";
                # a variavel operação está atrelada as mensagem de sucesso que aparecem na cor verde após realizar as funões do crud
                # tanto as mensagem de sucesso quando as de erro estão entrelaçadas a está variavel
        $operacao = 2;
    }

} else {

        $consultaVerifica = "SELECT * FROM agendamento WHERE horario = '" . $_REQUEST["horario"] . "' AND data_agendamento = '" .  $_REQUEST["data_agendamento"] . "'"; 
        
    $queryVerifica = $conexao->query($consultaVerifica);

    if($queryVerifica->num_rows > 0) {
        $consulta = false;
        $operacao = 4;
    
    } else {
        $consulta = "INSERT INTO agendamento (nome_cliente, data_agendamento, tipo_atendimento, telefone, horario) VALUES ('".$_REQUEST["nome_cliente"]."','".$_REQUEST["data_agendamento"]."','".$_REQUEST["tipo_atendimento"]."','".$_REQUEST["telefone"]."','".$_REQUEST["horario"]."')";
        $operacao = 1;
        var_dump($consulta);
    }
   
  
}
$query = false;
if(!$consulta) {
    header("Location: agendamento.php?erro=" . $operacao);

} else {
    $query = $conexao->query($consulta);

}
//var_dump($consulta);

#verifica se houve algum erro  do crud e concatena com a variavel local operação

if(!$query) {
  header("Location: agendamento.php?erro=" . $operacao);
} else {
   header("Location: agendamento.php?sucesso=" . $operacao);
}
