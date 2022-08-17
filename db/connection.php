<?php
    // Configurações gerais
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "escritorio";

    //Conexão com o banco de dados
    try{
        $pdo = new PDO("mysql:host=$server;dbname=$database", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $error){
        echo "Falha ao se conectar com o banco ";
    }
        
    //Função de limpar a entrada do POST
    function clearPost($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
?>