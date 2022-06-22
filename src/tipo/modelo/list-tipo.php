<?php
// realizar a conexão com o banco de dados 
include("../../conexao/conn.php");

// obter a requisição para a geração de nossa tabela 
$request = $_REQUEST;

// obter as colunas que estão sendo requiridas
$colunas = $requestData['colunas'];

//preparar o comando sql para obteção dos registros exigentes no BD
$sql  = "SELECT ID, NOME FROM TIPO WHERE 1=1";

// obter o total de registros existente na tabela do BD
$resultado = $pdo->query($sql);
$qtdeLinhas = $resultado->rowcount();

// verificar se existe algum filtro determinado pelo usuario
 $filtro = $requestData['search']['value'];
 if(!empty($filtro)){
    // montar a expressão lógica em SQL para filtar a nossa tabela 
    $sql .= "AND (ID LIKE '$filtro%'";
    $sql .= "OR NOME LIKE '$filtro%')";

 }

 // obter o total de registros existente na tabela do BD de acordo com o filtro
$resultado = $pdo->query($sql);
$totalFiltrados = $resultado->rowcount();

// obter os valores para odenação ORDER BY
$colunaOrdem = $requestData['order'][0]['column'];
$ordem =$colunas[$colunaOrdem]['data'];
$direcao = $requestData ['order'][0]['dir'];

// obter o valores para o LIMIT
$inicio = $requestData['start'];
$tamanho = $requestData['length'];

// Gerando a nossa ordenação na consulta sql
$sql .= "ORDER BY $ordem $direcao LIMIT $inicio, $tamanho";
$resultado = $pdo->query($sql);
$dados = array();
while($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $dados[] = array_map('utf8_encode',$row);

}
