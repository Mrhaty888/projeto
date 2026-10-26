<?php
require_once __DIR__ . "/vendor/autoload.php";

use App\Estudante;
use App\Turma;



try {
    $turma = new Turma("A", 3);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}

try {
    $turmaInvalida = new Turma("INF", 30);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . trim($e->getMessage()) . "\n";
}

try {
    $e1 = new Estudante("João Silva", "1234567", 8.5);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}

try {
    $eInvalido = new Estudante("Maria Souza", "12345", 7.0);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . trim($e->getMessage()) . "\n";
}

try {
    $eInvalido2 = new Estudante("Carlos Santos", "7654321", -1.0);
} catch (\InvalidArgumentException $e) {
    echo "Erro: " . trim($e->getMessage()) . "\n";
}



$e2 = new Estudante("Maria Oliveira", "2345678", 5.5);
$e3 = new Estudante("Pedro Santos", "3456789", 7.0);
$e4 = new Estudante("Lucas Lima", "4567890", 9.0);

$turma->calcularMediaGeral();

$turma->cadastrarEstudante($e1);
$turma->cadastrarEstudante($e2);
$turma->cadastrarEstudante($e3);

$turma->cadastrarEstudante($e1);

$turma->cadastrarEstudante($e4);


$turma->listarEstudantes();


echo $totalAprovados = $turma->aprovados().PHP_EOL;



echo $mediaGeral = $turma->calcularMediaGeral().PHP_EOL;
?>