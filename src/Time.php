<?php

namespace App;

use InvalidArgumentException;

class Time{
    private array $jogadoresDoTime = [];

    public function __construct(
        private string $time
    ){
        if (trim($time)=="") {
            throw new InvalidArgumentException("Nome inválido");
        }
    }

    public function cadastrarJogador(Jogadores $jogadorNovo): bool{
        if (count($this->jogadoresDoTime)>0) {
            foreach ($this->jogadoresDoTime as $jogador) {
                if ($jogadorNovo->getCamisa()==$jogador->getCamisa()) {
                    echo "Jogador com essa camisa já cadastrado".PHP_EOL;
                    return False;
                }
        }
        }
        $this->jogadoresDoTime[] = $jogadorNovo;
        return True;
        
    }

    public function totalJogadores(): int{
        return count($this->jogadoresDoTime);
    }

    public function encontrarJogador(int $numeroCamisa): bool{
        foreach ($this->jogadoresDoTime as $jogador) {
            if ($jogador->getCamisa() == $numeroCamisa) {
                echo "{$jogador->getNome()} | Camisa $numeroCamisa --- Posição: {$jogador->getPosicao()} ".PHP_EOL;
                return True;
            }
        echo "Jogador não encontrado.".PHP_EOL;
        return False;
        }
    }

    public function listarJogadores(): void{
        foreach($this->jogadoresDoTime as $jogador) {
            echo "{$jogador->getNome()} | Camisa: {$jogador->getCamisa()} --- Posição: {$jogador->getPosicao()} ".PHP_EOL;
        }
    }
}
?>