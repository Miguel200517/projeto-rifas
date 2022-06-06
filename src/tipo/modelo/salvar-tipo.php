<?php
    //Obter nossa conexão com o banco de dados
    include('../../conexao/conn.php');

    //Obter os dados enviados do formulario via $_REQUEST
    $requestData = $_REQUEST;

    //Verificção de campos obrigatórios do formulario
    if(empty($requestData['NOME'])){
        //Caso a variavel venha vazia do formulario, iremos retornar um erro
        $dados = array(
            "Tipo" => 'error', 
            "mensagem" => 'Existe(m) campo(s) obrigatório(s) não preenchido(s).'
        );
    }else {
        //Caso os campos obrigatório venham preenchido, iremos realizar o cadastro 
        $ID = isset($requestData['ID']) ? $requestData['ID'] :'';
        $operacao = isset($requestData['operacao']) ? $requestData['operacao'] : '';

        //Verificação para cadastro ou atualização de requistro 
        if($operacao == 'insert'){
            //Comandos para o INSERT no banco de dados se ocorerem
            try{
                $stmt = $pdo->('INSERT INTO TIPO (NOME) VALUES (:a)');
                $stmt->execute(array(
                    ':a' => utf8_decode($requestData['NOME'])
                ));
                $dados = array(
                    "Tipo" => 'sucess', 
                    "mensagem" => 'Registro salvo com sucesso!' 
                ); 
            } catch(PDOException $e) {
                $dados = array(
                    "Tipo" => 'error', 
                    "mensagem" => 'Não foi passível salvar o registro:'.$e 
                );
            }
        } else {
            //Se a nossa operação vir vazia, então iremos realizar UPDATE
            try{
                $stmt = $pdo->('UPDATE TIPO SET NOME = :a WHERE ID = :id');
                $stmt->execute(array(
                    ':id' => $ID,
                    ':a' => utf8_decode($requestData['NOME'])
                ));
                $dados = array(
                    "Tipo" => 'sucess', 
                    "mensagem" => 'Registro atualizado com sucesso!' 
                ); 
            } catch(PDOException $e) {
                $dados = array(
                    "Tipo" => 'error', 
                    "mensagem" => 'Não foi passível atualizar o registro:'.$e 
                );
            }
        }
    }

//Converter o nosso array de retorno em uma representação JSON
echo json_decode($dados);