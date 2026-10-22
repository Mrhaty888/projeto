<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\Sessao;
use App\Ingresso;

$sessao = new Sessao("Batman: a Corte das corujas",3);
try {
$sessaoInvalida = new Sessao("",3);
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}
try {
$sessaoInvalida = new Sessao("Batman: a Corte das corujas",-1);
} catch (\InvalidArgumentException $e) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

try {
$ingresso1 = new Ingresso("",35.57,2);
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

try {
$ingresso1 = new Ingresso("Ronaldo",-35.57,3);
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

try {
$ingresso1 = new Ingresso("Ronaldo",35.57,-1);
} catch (\InvalidArgumentException $e ) {
    echo "Erro: ".$e->getMessage().PHP_EOL;
}

$ingresso1 = new Ingresso("Ronaldo",1,35.57);
$ingresso2 = new Ingresso("Amanda",5,42.63);
$ingresso3 = new Ingresso("Ana",2,42.53);
$ingresso4 = new Ingresso("Luciano",2,36.28);
$ingresso5 = new Ingresso("Amanda",3,46.59);

$sessao->venderIngresso($ingresso1);
$sessao->venderIngresso($ingresso2);
echo $sessao->poltronasOcupadas().PHP_EOL;
echo $sessao->poltronasDisponiveis().PHP_EOL;
echo $sessao->arrecadacaoTotal().PHP_EOL;
$sessao->venderIngresso($ingresso3);
$sessao->venderIngresso($ingresso4);
$sessao->venderIngresso($ingresso5);
echo $sessao->poltronasOcupadas().PHP_EOL;
echo $sessao->poltronasDisponiveis().PHP_EOL;
echo $sessao->arrecadacaoTotal().PHP_EOL;
$sessao->venderIngresso($ingresso5);

?>