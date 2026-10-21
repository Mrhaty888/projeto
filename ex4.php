<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Livro;
use App\Biblioteca;

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