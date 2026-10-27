<?php

namespace App;

class RPG{
    private array $missoes = [];

    public function adicionarMissao(Missao $missao): void{
        $this->missoes[] = $missao;    
    }

    public function concluirMissao(Missao $missao): void{
        foreach($this->missoes as $missaolistada) {
            if ($missaolistada == $missao) {
                if ($missaolistada->getSituacao() == "Concluída") {
                    echo "Missão já concluida".PHP_EOL;
                } else {
                    $missaolistada->missaoConcluida();
                    echo "Missão Conluida :)".PHP_EOL;
                }
            }
        }
    }

    public function identificarPendentes(): void{
        echo "--MISSÕES PENDENTES--".PHP_EOL;
        foreach($this->missoes as $missaolistada) {
                if ($missaolistada->getSituacao() == "Pendente") {
                    echo "{$missaolistada->getNome()} | Descrição: {$missaolistada->getDescricao()} | Moedas: {$missaolistada->getMoedas()} ".PHP_EOL;
                } 
            }
    }

    public function moedasConquistadas(): void{
        $total = 0;
        foreach($this->missoes as $missaolistada) {
                if ($missaolistada->getSituacao() == "Concluída") {
                    $total += $missaolistada->getMoedas();
                } 
            }
        echo "Total de moedas obtidas: $total ".PHP_EOL;
    }

    public function listarMissoes(): void{
        echo "Missões: ".PHP_EOL;
        foreach($this->missoes as $missaolistada) {
            echo "{$missaolistada->getNome()} | Descrição: {$missaolistada->getDescricao()} | Moedas: {$missaolistada->getMoedas()} | Estado: {$missaolistada->getSituacao()}".PHP_EOL;
        }
    }
}
?>