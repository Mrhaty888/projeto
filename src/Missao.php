<?php

namespace App;

use InvalidArgumentException;

class Missao{
    private string $situacao = "Pendente";

    public function __construct(
        private string $nome,
        private string $descricao,
        private int $moedas
    ){
        if (trim($nome)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
        if (trim($descricao)=="") {
            throw new InvalidArgumentException("Descricao inválida");
        }
        if ($moedas <= 0) {
            throw new InvalidArgumentException("Recompensa inválida");
        }
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function getMoedas(): int{
        return $this->moedas;
    }
    public function getDescricao(): string{
        return $this->descricao;
    }
    public function getSituacao(): string{
        return $this->situacao;
    }

    public function missaoConcluida(): void{
        $this->situacao = "Concluída";
    }
}
?>