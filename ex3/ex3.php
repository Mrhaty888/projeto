<?php

require_once __DIR__ . '/Produtos.php';
require_once __DIR__ . '/Carrinho.php';


use App\Produtos;
use App\Carrinho;

$carrinho = new Carrinho();

$produto1 = new Produtos("Mouse Red-Dragon",130.50,"123456");
$produto2 = new Produtos("Teclado ",90.75,"283746");
$produto3 = new Produtos("Headset ",150.35,"1039475");
$produto4 = new Produtos("Mouse Red-Dragon",130.50,"123456");

$carrinho->removerProduto($produto1);

echo $carrinho->calcularTotal().PHP_EOL;
$carrinho->adicionarProduto($produto1);
$carrinho->adicionarProduto($produto2);
$carrinho->adicionarProduto($produto3);

echo $carrinho->calcularTotal().PHP_EOL;

$carrinho->removerProduto($produto1);

echo $carrinho->calcularTotal().PHP_EOL;

$carrinho->adicionarProduto($produto4);
?>