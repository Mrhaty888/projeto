<?php

namespace App;

use InvalidArgumentException;

class Mochila {
    private array $equipamentos = [];

    private float $total=0;
    private int $totalMoedas=0;

    public function __construct(
        private float $capacidade
    ){
        if ($capacidade <= 0) {
            throw new InvalidArgumentException("Peso inválido");
        }
    }


    public function getTotal(): float{
        echo "Peso total: ";
        return $this->total;
    }

    public function getTotalMoedas(): int{
        echo "Valor total: ";
        return $this->total;
    }

    public function adicionarItems(Equipamento $equipamentoNovo): bool{
        if (($this->total + $equipamentoNovo->getPeso()) > $this->capacidade) {
            echo "Nenhum espaço disponível.".PHP_EOL;
            return False;
        }
        $this->equipamentos[] = $equipamentoNovo;
        $this->total += $equipamentoNovo->getPeso();
        $this->totalMoedas += $equipamentoNovo->getMoedas();
        echo "Item adicionado.".PHP_EOL;
        return True;
        }
    
     public function removerItems(Equipamento $equipamentoNovo): bool{
        $indice = array_search($equipamentoNovo, $this->equipamentos, true);
        if ($indice !== false) {
            $this->total -= $equipamentoNovo->getPeso();
            $this->totalMoedas -= $equipamentoNovo->getMoedas();
            unset($this->equipamentos[$indice]);  
            $this->equipamentos = array_values($this->equipamentos);
            echo "Item descartado.".PHP_EOL;
            
            return true; 
         }

        return false; 
        }

    public function espacoRestante(): float{
        echo "Espaço restante: ";
        return round($this->capacidade - $this->total,2);
    }

    public function listarEquipamentos(): void{
        echo "--LISTA DE ITENS--".PHP_EOL;
        foreach($this->equipamentos as $equipamento) {
            echo "{$equipamento->getNome()} | Peso: {$equipamento->getPeso()} | Moedas: {$equipamento->getMoedas()}}".PHP_EOL;
        }
    }

    }

?>