<?php

namespace App;

use InvalidArgumentException;

class Ingresso{
    public function __construct(
        private string $nome,
        private int $poltrona,
        private float $pagamento
    ){
        if (trim($nome)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
        if ($poltrona <= 0) {
            throw new InvalidArgumentException("Poltrona inválida");
        }
        if ($pagamento <= 0) {
            throw new InvalidArgumentException('Pagamento inválido.');
        }
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function getPoltrona(): int{
        return $this->poltrona;
    }
    public function getPagamento(): float{
        return $this->pagamento;
    }
}
?>