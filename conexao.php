<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=sispatri','root', '');
    
    //Insert
    /*
    if(isset($_POST['data'])){
    $sql = $pdo->prepare("INSERT INTO tb_patrimonios VALUES (NULL,?,?,?,?,?,?,?,?)");
    $sql->execute(array($_POST['descricao'],$_POST['origem'],$_POST['setor'],$_POST['situacao'],$_POST['identificacao'],$_POST['data'],$_POST['classificacao'],$_POST['notafiscal']));
    echo 'inserido com sucesso';
    }
    */
?>