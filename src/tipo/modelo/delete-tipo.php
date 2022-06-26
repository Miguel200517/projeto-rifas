<?php
incluide('../../conexao.php');

$ID = $_REQUEST['ID'];

$sql = "DELETE * FROM  TIPO WHERE ID = $ID";

$resultado = $pdo->query($sql);

if($resultado){
    $dados = arry(
        'tipo'=> 'success',
        'mensagem'=> 'registro excluido com sucesso.'



);
}else{
    $dados = arry(
        'tipo'=> 'error',
        'mensagem'=> 'Não foi possivel excluir o registro selecionado.'
    );
}
echo json_encode($dados);