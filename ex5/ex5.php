<?php
require_once __DIR__ . '/Missao.php';
require_once __DIR__ . '/RPG.php';

use App\Missao;
use App\RPG;

$rpg = new RPG();

$missao1 = new Missao("Matar o Dragão", "Derrote o dragão na caverna norte", 500);
$missao2 = new Missao("Coletar Ervas", "Traga 5 ervas medicinais", 100);
$missao3 = new Missao("Resgatar o Aldeão", "Encontre o aldeão perdido na floresta", 250);

$rpg->adicionarMissao($missao1);
$rpg->adicionarMissao($missao2);
$rpg->adicionarMissao($missao3);

$rpg->listarMissoes();

$rpg->moedasConquistadas();

$rpg->identificarPendentes();

$rpg->concluirMissao($missao1);

$rpg->concluirMissao($missao1);

$rpg->concluirMissao($missao2);

$rpg->identificarPendentes();

$rpg->moedasConquistadas();

$rpg->listarMissoes();

?>