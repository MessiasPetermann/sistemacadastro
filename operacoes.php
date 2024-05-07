<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sispatri</title>
    <link rel= "stylesheet" href="estiloscss/patri.css">
    
</head>

<body>  
     <header class = topo>
        <div class="title">Sispatri</div>
        <div class = img>
            <img src="imagens/logo.png" alt="logo" class = logo>
        </div>   
    </header>

    <nav class="navbar">
        <div class="navlogo"><p>Sispatri</p></div>
        <ul class="nav-itens">
           <li><a href="" data-link>Cadastrar</a></li>
           <li><a href="" data-link>Listar</a></li>
           <li><a href="" data-link>Alterar</a></li>
       </ul>
    </nav>

<div class="container">
    <form class="formulario"  method = 'POST' action =          'operacoes.php'>
        <?php 
        include "conexao.php";

        if(isset($_POST['data'])){
            
            $sql = $pdo->prepare("INSERT INTO tb_patrimonios VALUES (NULL,?,?,?,?,?,?,?,?)");
            
            $sql->execute(array($_POST['descricao'],$_POST['origem'],$_POST['setor'],$_POST['situacao'],$_POST['identificacao'],$_POST['data'],$_POST['classificacao'],$_POST['notafiscal']));
            echo 'Inserido com sucesso!';
        } 
        else {
            echo 'Erro ao Cadastrar';
        }
        
    ?>
    </form>
</div>
</body>
</html>