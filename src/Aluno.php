<?php

namespace App;

use InvalidArgumentException;

class Aluno{
    

    public function __construct(
        private string $nome,
        private string $RA,
        private Acompanhamento $acompanhamento
    ){
        if (trim($nome)=="") {
            throw new InvalidArgumentException('Nome inválido. ');
        }
        if (strlen($RA) != 7) {
            throw new InvalidArgumentException('RA inválido. ');
        }
    }

    public function LancarNota(string $prova, float $notaNova): void{
        $this->acompanhamento->atualizarNota($prova,$notaNova);
    }

    public function ListarAtividades(): void{
        echo "Aluno: $this->nome | RA: $this->RA ".PHP_EOL;
        $this->acompanhamento->ListarAtividades();
    }

    public function verDesempenho(): float{
        return $this->acompanhamento->verDesempenho();
    }

    public function AdicionarAtividade(Atividade $atividadeNova): bool{
        return $this->acompanhamento->adicionarAtividade($atividadeNova);
    }
}
?>