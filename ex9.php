<?php

require_once __DIR__ ."/vendor/autoload.php";

use App\Equipamento;
use App\Mochila;
use App\Aventureiro;

try {
    $equipamentoInvalido = new Equipamento("", 10, 5);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

try {
    $mochilaInvalida = new Mochila(-5);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

try {
    $mochilaValida = new Mochila(15.0);
    $aventureiroInvalido = new Aventureiro("Heroi", 0, $mochilaValida);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}

$mochila = new Mochila(20.0);
$heroi = new Aventureiro("Aragorn", 100, $mochila);

$espada = new Equipamento("Espada Longa", 12.5, 50);
$escudo = new Equipamento("Escudo de Ferro", 10.0, 30);
$pocao = new Equipamento("Pocao de Vida", 1.5, 10);

$heroi->coletarItem($espada);
$heroi->coletarItem($pocao);

echo $heroi->getTotal() . PHP_EOL;
echo  $heroi->espacoRestante() . PHP_EOL;

$heroi->coletarItem($escudo);

$heroi->listarEquipamentos();

$heroi->removerItem($espada);

$heroi->listarEquipamentos();
echo $heroi->getTotal() . PHP_EOL;

$heroi->removerItem($escudo);