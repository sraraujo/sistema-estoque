<?php

    include_once "../view/assets/classes/Log.php";

    function registrarLogs($acao, $usuario, $data){
        
        $dadosLog = new Log($acao, $usuario, $data); // criando o objeto com dados de LOG
        $arrayLog = $dadosLog->dadosToarray(); // trnsformando o objeto em array

        $dados = fopen("../dataBase/logs.txt", "a+"); // abrindo o arquivo para escrever dados do log
        
        fwrite($dados, implode(" - ", $arrayLog).PHP_EOL);

    }

?>