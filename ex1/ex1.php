<?php

require_once __DIR__ . '/Perguntas.php';
require_once __DIR__ . '/Questionarios.php';


use App\Perguntas;
use App\Questionarios;


$questionario = new Questionarios("Conhecimentos Gerais");
#Erros de validação:
try {
$questionario = new Questionarios("");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}


try {
$pergunta1 = new Perguntas("Qual a capital do Brasil?", "");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}
try {
$pergunta1 = new Perguntas("", "Brasilia");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}
$pergunta1 = new Perguntas("Qual a capital do Brasil?", "Brasilia");
$pergunta2 = new Perguntas("Quanto é 2 + 2?", "4");
$pergunta3 = new Perguntas("Qual a cor do cavalo branco de Napoleao?", "Branco");

$questionario->adicionarPergunta($pergunta1);
$questionario->adicionarPergunta($pergunta2);
$questionario->adicionarPergunta($pergunta3);

$questionario->getPerguntas(); 

echo $questionario->totalPerguntas().PHP_EOL;

$tentativa1 = new Perguntas("Qual a capital do Brasil?", "brasilia");
$questionario->responderPergunta($tentativa1); 

$tentativa2 = new Perguntas("Quanto é 2 + 2?", "5");
$questionario->responderPergunta($tentativa2);

$tentativa3 = new Perguntas("Qual a capital da França?", "Paris");
$questionario->responderPergunta($tentativa3);
?>
