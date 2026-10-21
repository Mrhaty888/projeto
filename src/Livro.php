<?php

namespace App;

use InvalidArgumentException;

class Livro{

    private string $indicacao = "Disponivel";

    public function __construct(
        private string $titulo,
        private string $autor,
        private string $ISBN,
    ){
        if (ctype_digit($ISBN)==False or strlen(trim($ISBN))!=13) {
            throw new InvalidArgumentException('Código inválido');
        }
        if (trim($titulo)=="") {
            throw new InvalidArgumentException("Título inválido");
        }
        if (trim($autor)=="") {
            throw new InvalidArgumentException("Autor inválido");
        }
    }

    public function getTitulo(): string{
        return $this->titulo;
    }
    public function getAutor(): string{
        return $this->autor;
    }
    public function getISBN(): string{
        return $this->ISBN;
    }
    public function getIndicacao(): string{
        return $this->indicacao;
    }

    public function mudarIndicacao(string $indicacaoAtual): void{
        $this->indicacao = $indicacaoAtual;
    }
}
?>