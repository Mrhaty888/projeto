<?php

namespace App;

use InvalidArgumentException;

class Jogadores{
    public function __construct(
        private string $nome,
        private int $camisa,
        private string $posicao
    ) {
        if (trim($nome)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
        if (trim($posicao)=="") {
            throw new InvalidArgumentException("Posição inválida");
        }
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function getCamisa(): int{
        return $this->camisa;
    }
    public function getPosicao(): string{
        return $this->posicao;
    }

}
?>