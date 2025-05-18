<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: index.php');
    exit;
}

$dataFile = 'data.json';

// Adiciona dados do ônibus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $busData = json_decode(file_get_contents($dataFile), true);
    $busData[] = [
        'horario_saida' => $_POST['horario_saida'],
        'horario_proximo' => $_POST['horario_proximo'],
        'destino' => $_POST['destino'],
        'empresa' => $_POST['empresa'],
        'linha' => $_POST['linha']
    ];
    file_put_contents($dataFile, json_encode($busData));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Dados do Ônibus</h2>
        <form method="post">
            <div class="form-group">
                <label for="horario_saida">Horário de Saída:</label>
                <input type="text" class="form-control" name="horario_saida" required placeholder="Ex: 06:30">
            </div>
            <div class="form-group">
                <label for="horario_proximo">Horário do Próximo:</label>
                <input type="text" class="form-control" name="horario_proximo" required placeholder="Ex: 09:20">
            </div>
            <div class="form-group">
                <label for="destino">Destino (Cidade):</label>
                <input type="text" class="form-control" name="destino" required>
            </div>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" class="form-control" name="empresa" required>
            </div>
            <div class="form-group">
                <label for="linha">Linha:</label>
                <input type="text" class="form-control" name="linha" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>

        <h2 class="mt-5">Visualizar Dados dos Ônibus</h2>
        <a href="tabela.php" class="btn btn-secondary">Clique aqui para visualizar</a>
        
        <a href="logout.php" class="btn btn-danger mt-3" style="float:right;">Sair</a>
    </div>
</body>
</html>