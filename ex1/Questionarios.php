<?php

namespace App;

use InvalidArgumentException;

class Questionarios{
    private array $perguntas = [];

    public function __construct(
        private string $titulo
    ){
        if (trim($titulo)=="") {
            throw new InvalidArgumentException("Título inválido");
        }
    }

    public function adicionarPergunta(Perguntas $pergunta): void{
        $this->perguntas[] = $pergunta;
    }

    public function getPerguntas(): void{
        foreach ($this->perguntas as $pergunta) {
            echo "{$pergunta->getEnunciado()}".PHP_EOL;
        }
    }

    public function totalPerguntas(): int{
        $total = count($this->perguntas);
        return $total;
    }

    public function responderPergunta(Perguntas $pergunta2): bool{
        $enunciadoRecebido = strtolower(trim($pergunta2->getEnunciado()));
        foreach ($this->perguntas as $pergunta) {
            if (strtolower(trim($pergunta->getEnunciado())) == $enunciadoRecebido) {
                echo "{$pergunta->verificacao($pergunta2->getResposta())}".PHP_EOL;
                return True;
            }
        }
        echo "Pergunta Não encontrada.".PHP_EOL;
        return False;
    }

}

?>