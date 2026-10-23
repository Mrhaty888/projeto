<?php

namespace App;

use InvalidArgumentException;

class Mochila {
    private array $equipamentos = [];

    private float $total=0;

    public function __construct(
        private float $capacidade
    ){
        if ($capacidade <= 0) {
            throw new InvalidArgumentException("Peso inválido");
        }
    }

    public function adicionarItems(Equipamento $equipamentoNovo): bool{
        if ($this->capacidade < $this->total) {
            echo "Nenhum espaço disponível.".PHP_EOL;
            return False;
        }
        $this->equipamentos[] = $equipamentoNovo;
        $this->total += $equipamentoNovo->getPeso();
        echo "Item adicionado.".PHP_EOL;
        return True;
        }
    
     public function removerItems(Equipamento $equipamentoNovo): bool{
        $indice = array_search($equipamentoNovo, $this->equipamentos, true);
        if ($indice !== false) {
            unset($this->equipamentos[$indice]);  
            $this->equipamentos = array_values($this->equipamentos);
            echo "Item descartado.".PHP_EOL;
            
            return true; 
         }

        return false; 
        }
    }

?>