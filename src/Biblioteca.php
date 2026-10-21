<?php

namespace App;

use InvalidArgumentException;

class Biblioteca{
    private array $catalogo = [];

    public function adicionarLivro(Livro $livro): bool{
        foreach ($this->catalogo as $livroCatalogado) {
            if ($livroCatalogado->getISBN() == $livro->getISBN()) {
                echo "Livro já cadastrado ".PHP_EOL;
                return False;
            }
        }
        $this->catalogo[] = $livro;
        return True;
    }

    public function emprestarLivro(Livro $livro): bool{
        foreach ($this->catalogo as $livroCatalogado) {
           if ($livroCatalogado->getISBN() == $livro->getISBN()) {
            if ($livroCatalogado->getIndicacao() == "Disponivel" ) {
                $livroCatalogado->mudarIndicacao("Emprestado");
                echo "Livro emprestado ".PHP_EOL;
                return True;
            }
            }
        }
        echo "Livro Indisponivel ".PHP_EOL;
        return False;
    }

    public function devolverLivro(Livro $livro): bool{
        foreach ($this->catalogo as $livroCatalogado) {
           if ($livroCatalogado->getISBN() == $livro->getISBN()) {
            if ($livroCatalogado->getIndicacao() == "Emprestado" ) {
                $livroCatalogado->mudarIndicacao("Disponivel");
                echo "Livro disponível ".PHP_EOL;
                return True;
            }
            }
        }
        echo "Livro Indisponivel".PHP_EOL;
        return False;
    }

    public function listarCatalogo(): void{
        foreach ($this->catalogo as $livroCatalogado) {
            echo "{$livroCatalogado->getTitulo()} | Autor: {$livroCatalogado->getAutor()} | IBSN: {$livroCatalogado->getISBN()} | Status: {$livroCatalogado->getIndicacao()} ".PHP_EOL;
        }
    }
}
?>