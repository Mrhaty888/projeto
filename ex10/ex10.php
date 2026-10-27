<?php

require_once __DIR__ . '/Atividade.php';
require_once __DIR__ . '/Acompanhamento.php';
require_once __DIR__ . '/Aluno.php';

use App\Atividade;
use App\Acompanhamento;
use App\Aluno;

try {
    $atividadeInvalida = new Atividade("", 10.0);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage().PHP_EOL;
}

try {
    $acompanhamentoInvalido = new Acompanhamento("POO", 0);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage().PHP_EOL;
}

try {
    $acompanhamentoValido = new Acompanhamento("POO", 80);
    $alunoInvalido = new Aluno("Carlos", "123", $acompanhamentoValido);
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage().PHP_EOL;
}

$atividade1 = new Atividade("Prova 1", 10.0);
$atividade2 = new Atividade("Trabalho 1", 5.0);
$atividadeDuplicada = new Atividade("Prova 1", 8.0);

$acompanhamento = new Acompanhamento("Programacao Orientada a Objetos", 80);
$aluno = new Aluno("Lucas Ferreira", "1234567", $acompanhamento);

echo $aluno->verDesempenho().PHP_EOL;

$aluno->ListarAtividades();

$aluno->AdicionarAtividade($atividade1);
$aluno->AdicionarAtividade($atividade2);
$aluno->AdicionarAtividade($atividadeDuplicada);
$aluno->ListarAtividades();

$aluno->LancarNota("Prova 1", 8.0);
$aluno->LancarNota("Trabalho 1", 5.0);
$aluno->LancarNota("Trabalho 1", 6.0);
$aluno->LancarNota("Atividade Inexistente", 10.0);
$aluno->ListarAtividades();

$aluno->LancarNota("Prova 1", 15.0);

echo $aluno->verDesempenho().PHP_EOL;

?>