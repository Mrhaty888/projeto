<?php

namespace App;

use InvalidArgumentException;

class Sessao{
    private array $ingressos = [];
    private float $total = 0;

    public function __construct(
        private string $filme,
        private int $capacidade
    ){
        if (trim($filme)=="") {
            throw new InvalidArgumentException("Filme inválido");
        }
        if ($capacidade <= 0) {
            throw new InvalidArgumentException("Capacidade inválida");
        }
    }

    public function venderIngresso(Ingresso $ingressoNovo): bool{
        if ($this->capacidade <= count($this->ingressos)) {
            echo "Nenhuma poltrona disponível.".PHP_EOL;
            return False;
        }

        if($ingressoNovo->getPoltrona() > $this->capacidade) {
            echo "Poltrona indisponível.".PHP_EOL;
            return False;
        }
        if (count($this->ingressos)>0) {
            foreach ($this->ingressos as $ingresso) {
                if ($ingressoNovo->getPoltrona()==$ingresso->getPoltrona()) {
                    echo "Poltrona indisponível.".PHP_EOL;
                    return False;
                }
        }
        }
        $this->ingressos[] = $ingressoNovo;
        $this->total += $ingressoNovo->getPagamento();
        echo "Ingresso vendido. ".PHP_EOL;
        return True;
    }

    public function poltronasOcupadas(): void{
        echo "Poltronas ocupadas: ".PHP_EOL;
        foreach ($this->ingressos as $ingresso) {
            echo "| Poltrona {$ingresso->getPoltrona()} |".PHP_EOL;
        }
    }

    public function poltronasDisponiveis(): int{
        echo "Quantidade de poltronas disponíveis: ";
        return $this->capacidade - count($this->ingressos);
    }

    public function arrecadacaoTotal(): float{
        echo "Total arrecadado: R$ ";
        return round($this->total,2);
    }


}

?>