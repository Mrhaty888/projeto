<?php

namespace App;

use InvalidArgumentException;

class Equipamento{

public function __construct(
    private string $nome,
    private float $peso,
    private int $moedas
){
     if (trim($nome)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
        if ($peso <= 0) {
            throw new InvalidArgumentException("Peso inválido");
        }
        if ($moedas <= 0) {
            throw new InvalidArgumentException('Moedas inválidas.');
        }
}

public function getNome(): string{
        return $this->nome;
    }
public function getMoedas(): int{
        return $this->moedas;
    }
public function getPeso(): float{
        return $this->peso;
    }
}


?>