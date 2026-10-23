<?php
namespace App;

use InvalidArgumentException;

class Veiculo{
    public function __construct(
        private string $placa,
        private string $modelo,
        private string $nome
    ){
        if (trim($nome)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
        if (trim($placa)=="" or strlen(trim($placa)) != 7) {
            throw new InvalidArgumentException("Placa inválida");
        }
        if (trim($modelo)=="") {
            throw new InvalidArgumentException("Modelo inválido");
        }
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function getPlaca(): string{
        return $this->placa;
    }
    public function getModelo(): string{
        return $this->modelo;
    }
}
?>