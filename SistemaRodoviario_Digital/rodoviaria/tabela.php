<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('Location: index.php');
    exit;
}

$dataFile = 'data.json';
$busData = json_decode(file_get_contents($dataFile), true) ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Ônibus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Dados dos Ônibus</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Horário de Saída</th>
                    <th>Horário do Próximo</th>
                    <th>Destino</th>
                    <th>Empresa</th>
                    <th>Linha</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($busData)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum dado encontrado.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($busData as $bus): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($bus['horario_saida']); ?></td>
                        <td><?php echo htmlspecialchars($bus['horario_proximo']); ?></td>
                        <td><?php echo htmlspecialchars($bus['destino']); ?></td>
                        <td><?php echo htmlspecialchars($bus['empresa']); ?></td>
                        <td><?php echo htmlspecialchars($bus['linha']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="dashboard.php" class="btn btn-secondary">Voltar</a>
        <a href="logout.php" class="btn btn-danger" style="float:right;">Sair</a>
    </div>
</body>
</html>