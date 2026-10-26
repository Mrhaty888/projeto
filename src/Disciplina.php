<?php

namespace App;

use InvalidArgumentException;

class Disciplina{

    private array $atividades = [];
    
    public function __construct(
        private string $nome,
        private int $cargaHoraria
    ){
        if (trim($nome)=="") {
            throw new InvalidArgumentException('Nome inválido. ');
        }
        if ($cargaHoraria <= 0) {
            throw new InvalidArgumentException('CargaHoraria inválida. ');
        }
    }

     public function AdicionarAtividade(Atividade $atividadeNova): bool{
        foreach ($this->atividades as $atividade) {
            if ($atividade->getTitulo() == $atividadeNova->getTitulo()) {
                echo "Atividade já cadastrada. ".PHP_EOL;
                return False;
            }
        }
        $this->atividades[] = $atividadeNova;
        echo "Atividade cadastrada. ".PHP_EOL;
        return True;
    }
    
}
?>