<?php

require_once __DIR__ . '/Jogadores.php';
require_once __DIR__ . '/Time.php';


use App\Jogadores;
use App\Time;

$time = new Time("Agua Santa");

#Erros de validação: 
try {
    $time = new Time("");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

try {
    $jogador1 = new Jogadores("",18,"Atacante");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

try {
    $jogador1 = new Jogadores("Reinaldo",-1,"Atacante");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

try {
    $jogador1 = new Jogadores("Reinaldo",18,"");
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

$jogador1 = new Jogadores("Reinaldo",18,"Atacante");
$jogador2 = new Jogadores("Ronaldo",18,"Atacante");
$jogador3 = new Jogadores("Francisco",20,"Centro-avante");
$jogador4 = new Jogadores("Allison",01,"Goleiro");

$time->cadastrarJogador($jogador1);
echo $time->cadastrarJogador($jogador2);
$time->cadastrarJogador($jogador3);
$time->cadastrarJogador($jogador4);

$time->listarJogadores();
$time->encontrarJogador(18);
$time->encontrarJogador(19);

?>
