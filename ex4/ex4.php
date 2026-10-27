<?php

require_once __DIR__ . '/Livro.php';
require_once __DIR__ . '/Biblioteca.php';

use App\Livro;
use App\Biblioteca;

try {
    $livroInvalido = new Livro("", "Invalidador", "1234567890123");
} catch (InvalidArgumentException $e) {
    echo "Erro na criacao do livro: " . $e->getMessage() . PHP_EOL;
}

try {
    $livroInvalido = new Livro("Invalido", "", "1234567890123");
} catch (InvalidArgumentException $e) {
    echo "Erro na criacao do livro: " . $e->getMessage() . PHP_EOL;
}

try {
    $livroInvalido = new Livro("Invalido", "Invalidador", "123");
} catch (InvalidArgumentException $e) {
    echo "Erro na criacao do livro: " . $e->getMessage() . PHP_EOL;
}
$biblioteca = new Biblioteca();

$livro1 = new Livro("Batman: A piada mortal","Alan Moore","1872635463782");
$livro2 = new Livro("Dracula","Bram Stroker","2873645378293");
$livro3 = new Livro("Determinados","Robert Sapolsky","4095867364512");

$biblioteca->emprestarLivro($livro1);

$biblioteca->adicionarLivro($livro1);
$biblioteca->adicionarLivro($livro1);
$biblioteca->adicionarLivro($livro2);
$biblioteca->adicionarLivro($livro3);

$biblioteca->emprestarLivro($livro1);
$biblioteca->emprestarLivro($livro2);
$biblioteca->listarCatalogo();

$biblioteca->devolverLivro($livro1);
$biblioteca->devolverLivro($livro2);
$biblioteca->listarCatalogo();
?>