<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sispatri</title>
    <link rel="stylesheet" href="estiloscss/patri.css">

</head>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sispatri - Listar Patrimônios</title>

</head>
<body>
    <header class="topo">
        <div class="title">Sispatri</div>
        <div class="img">
            <img src="imagens/logo.png" alt="logo" class="logo">
        </div>
    </header>

    <nav class="navbar">
        <ul class="nav-itens">
            <li><a href="index.php" data-link>Cadastrar</a></li>
            <li><a href="listar.php" data-link>Listar</a></li>
            <li><a href="alterar.php" data-link>Alterar</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Listar Patrimônios</h1>
        <form class="formulario" id="formulario" method="GET">
            <div>
                <label for="Buscar"><b>Buscar por:</b></label>
                <input type="text" name="Buscar" id="valor" required>
                <button class="btnbuscar" type="submit">Buscar</button>
            </div>
        </form>
        <div id="resultado">
        <?php
include "conexao.php";

if (isset($_GET['Buscar']) && !empty($_GET['Buscar'])) {
    $buscar = $_GET['Buscar'];

    $consulta = $pdo->prepare("SELECT * FROM tb_patrimonios WHERE descricao LIKE :buscar");
    $busca_param = "%$buscar%";
    $consulta->bindParam(':buscar', $busca_param);
    $consulta->execute();
    $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // Arrays de mapeamento para converter os valores
    $setores = [
        'TI01' => 'Tecnologia da Informação',
        // Adicione outros mapeamentos conforme necessário
    ];

    $origens = [
        'O01' => 'Origem Exemplo 1',
        // Adicione outros mapeamentos conforme necessário
    ];

    $situacoes = [
        'S01' => 'Situação Exemplo 1',
        // Adicione outros mapeamentos conforme necessário
    ];

    $identificacoes = [
        'I01' => 'Identificação Exemplo 1',
        // Adicione outros mapeamentos conforme necessário
    ];

    $classificacoes = [
        'C01' => 'Classificação Exemplo 1',
        // Adicione outros mapeamentos conforme necessário
    ];

    if ($resultados) {
        echo "<table>";
        echo "<thead><tr>";

        foreach ($resultados[0] as $coluna => $valor) {
            echo "<th>" . htmlspecialchars($coluna) . "</th>";
        }

        echo "</tr></thead><tbody>";

        foreach ($resultados as $linha) {
            echo "<tr>";
            foreach ($linha as $coluna => $valor) {
                // Verifica e aplica a conversão para os campos necessários
                if ($coluna == 'setor' && isset($setores[$valor])) {
                    $valor = $setores[$valor];
                } elseif ($coluna == 'origem' && isset($origens[$valor])) {
                    $valor = $origens[$valor];
                } elseif ($coluna == 'situacao' && isset($situacoes[$valor])) {
                    $valor = $situacoes[$valor];
                } elseif ($coluna == 'identificacao' && isset($identificacoes[$valor])) {
                    $valor = $identificacoes[$valor];
                } elseif ($coluna == 'classificacao' && isset($classificacoes[$valor])) {
                    $valor = $classificacoes[$valor];
                } elseif ($coluna == 'data') {
                    // Converte a data para o formato brasileiro
                    $data = DateTime::createFromFormat('Y-m-d', $valor);
                    if ($data !== false) {
                        $valor = $data->format('d/m/Y');
                    }
                }
                echo "<td>" . htmlspecialchars($valor) . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p>Nenhum resultado encontrado.</p>";
    }
}
?>

        </div>
    </div>
</body>
</html>