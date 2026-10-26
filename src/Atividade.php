<?php

namespace App;

use InvalidArgumentException;

class Atividade{

    private float $nota = 0;

    public function __construct(
        private string $titulo,
        private float $valorMaximo
    ){
        if (trim($titulo)=="") {
            throw new InvalidArgumentException('Titulo inválido. ');
        }
        if ($valorMaximo <= 0) {
            throw new InvalidArgumentException('Valor inválido. ');
        }
    }

    public function getTitulo(): string{
        return $this->titulo;
    }
    public function getValorMaximo(): float{
        return $this->valorMaximo;
    }
    public function getNota(): float{
        return $this->nota;
    }

    public function mudarNota(float $notaNova): void{
        if ($notaNova < 0 or $notaNova > $this->valorMaximo) {
            echo "Nota inválida. ".PHP_EOL;
        } else {
            $this->nota = $notaNova;
            echo "Nota registrada. ".PHP_EOL;
        }
    }


}
?>