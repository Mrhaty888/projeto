<?php
require_once __DIR__ . "/vendor/autoload.php";

use App\Estacionamento;
use App\Veiculo;


try {
    $estacionamento1 = new Estacionamento(3);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}

try {
    $estacionamento2 = new Estacionamento(-1);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . trim($e->getMessage()) . "\n";
}

try {
    $veiculo1 = new Veiculo("246","SUV","Ricardo");
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}

try {
    $veiculo1 = new Veiculo("246PYUH","","Ricardo");
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . trim($e->getMessage()) . "\n";
}

try {
    $veiculo1 = new Veiculo("246PYUH","SUV","");
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . trim($e->getMessage()) . "\n";
}

$v1 = new Veiculo("ABC1234", "SUV", "Ricardo");
$v2 = new Veiculo("XYZ5678", "Sedan", "Maria");
$v3 = new Veiculo("KJG9876", "Hatch", "Pedro");

$estacionamento1->adicionarVeiculo($v1);
$estacionamento1->adicionarVeiculo($v2);
$estacionamento1->adicionarVeiculo($v3);

$estacionamento1->listarVeiculos();

$estacionamento1->encontrarVeiculo("XYZ5678");

$estacionamento1->removerVeiculo($v2);

$estacionamento1->listarVeiculos();

echo $estacionamento1->quantidadeDeVagas() . PHP_EOL;
?>