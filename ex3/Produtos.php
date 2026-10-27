<?php

namespace App;

use InvalidArgumentException;

class Produtos{
    public function __construct(
        private string $nome,
        private float $preco,
        private string $codigo
    ){
        if (ctype_digit($codigo)==False or trim($codigo)=="") {
            throw new InvalidArgumentException('Código inválido');
        }
         if (trim($nome)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
        if ($preco <= 0) {
            throw new InvalidArgumentException("Preço inválido");
        }
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function getPreco(): float{
        return $this->preco;
    }
    public function getCodigo(): string{
        return $this->codigo;
    }
}
?>