<?php
// incluindo nossa conexão com o banco de dados
incluide('../../conexao.php');

// recepção do ID a ser buscado no banco de dados
$ID = $_REQUEST['ID'];

// Gerar nossa consulta SQL no banco de dados
$sql = "SELECT * FROM  TIPO WHERE ID = $ID";

// Executar na nossa querie de consulta ao banco de dados
$resultado = $pdo->query($sql);
 
// testar nossa consulta no banco de dados 
if($resultado){
    $result = array();
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $result = array_map('utf8_encode', $row);
    }
    $dados = array(
        'tipo'=> 'success',
        'mensagem'=> '',
        'dados' => $result
    );
}else{
$dados = array(
'tipo' => 'error',
'mensagem'=> 'Não foi possivel obter o registro  solicitado.',
$dados = array()
);
}
echo json_encode($dados);