<?php
// Função para calcular o custo por km
function calcularCustoPorKm($precoCombustivel, $precoOleo, $litrosOleoCarter, $precoPneu, $autonomiaVeiculo, $kmTrocaOleo, $kmTrocaPneu)
{
    $custoCombustivel = $precoCombustivel / $autonomiaVeiculo;
    $custoOleo = $litrosOleoCarter * $precoOleo / $kmTrocaOleo;
    $custoPneu = $precoPneu / $kmTrocaPneu;

    $custoPorKm = $custoCombustivel + $custoOleo + $custoPneu;

    return $custoPorKm;
}

// Inicializando as variáveis
$precoCombustivel = isset($_POST['precoCombustivel']) ? floatval($_POST['precoCombustivel']) : 0;
$precoOleo = isset($_POST['precoOleo']) ? floatval($_POST['precoOleo']) : 0;
$litrosOleoCarter = isset($_POST['litrosOleoCarter']) ? floatval($_POST['litrosOleoCarter']) : 0;
$precoPneu = isset($_POST['precoPneu']) ? floatval($_POST['precoPneu']) : 0;
$autonomiaVeiculo = isset($_POST['autonomiaVeiculo']) ? floatval($_POST['autonomiaVeiculo']) : 0;

// Constantes
$kmTrocaOleo = 10000;
$kmTrocaPneu = 50000;

// Verificar se os valores são válidos antes de calcular
if ($autonomiaVeiculo > 0 && $kmTrocaOleo > 0 && $kmTrocaPneu > 0) {
    // Calculando o custo por km
    $custoKm = calcularCustoPorKm($precoCombustivel, $precoOleo, $litrosOleoCarter, $precoPneu, $autonomiaVeiculo, $kmTrocaOleo, $kmTrocaPneu);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cálculo de Custo por Km</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Cálculo de Custos por Km</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="precoCombustivel">Preço do Litro de Combustível:</label>
                <input type="number" class="form-control" id="precoCombustivel" name="precoCombustivel" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="precoOleo">Preço do Litro de Óleo:</label>
                <input type="number" class="form-control" id="precoOleo" name="precoOleo" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="litrosOleoCarter">Litros de Óleo do Cárter:</label>
                <input type="number" class="form-control" id="litrosOleoCarter" name="litrosOleoCarter" step="0.1" required>
            </div>
            <div class="form-group">
                <label for="precoPneu">Preço do Pneu:</label>
                <input type="number" class="form-control" id="precoPneu" name="precoPneu" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="autonomiaVeiculo">Autonomia do Veículo (km por litro):</label>
                <input type="number" class="form-control" id="autonomiaVeiculo" name="autonomiaVeiculo" step="0.1" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "<div class='mt-4'>";
            echo "<h4>Resultado:</h4>";
            echo "<p>O custo por km rodado é de R$ " . number_format($custoKm, 2, ',', '.') . "</p>";
            echo "<h6>Obs.: Esse valor não leva em consideração os custos com manutenção, seguro, etc... Apenas o combustível, óleo e pneus para o cálculo.</h6>";
            echo "</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>