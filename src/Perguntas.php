<?php

namespace App;

use InvalidArgumentException;

class Perguntas{
    public function __construct(
        private string $enunciado,
        private string $resposta
    ){
        if (trim($enunciado)=="") {
            throw new InvalidArgumentException("Enunciado inválido");
        }
        if (trim($resposta)==""){
            throw new InvalidArgumentException("Resposta inválida");
        }
    }

    public function getEnunciado(): string{
        return $this->enunciado;
    }

    public function getResposta(): string{
        return $this->resposta;
    }

    public function verificacao(string $tentativa): bool{
        if (strtolower(trim($tentativa)) == strtolower(trim($this->resposta))) {
            echo "Resposta certa!".PHP_EOL;
            return True;
        } else {
            echo "Resposta incorreta!".PHP_EOL;
            return False;
        }
    }
}
?>