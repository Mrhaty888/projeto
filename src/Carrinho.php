<?php

namespace App;

use InvalidArgumentException;

class Carrinho{
    private array $ProdutosCarrinho = [];

    public function adicionarProduto(Produtos $produto): bool{
        foreach ($this->ProdutosCarrinho as $produtoCarrinho) {
            if ($produtoCarrinho->getCodigo() == $produto->getCodigo()) {
                echo "Produto já adicionado ".PHP_EOL;
                return False;
            }
        }
        $this->ProdutosCarrinho[] = $produto;
        return True;
    }

    public function removerProduto(Produtos $produto): bool{
        foreach ($this->ProdutosCarrinho as $key => $produtoCarrinho) {
           if ($produtoCarrinho->getCodigo() == $produto->getCodigo()) {
                unset($this->ProdutosCarrinho[$key]);
                $this->ProdutosCarrinho = array_values($this->ProdutosCarrinho);
                return True;
            } 
        }
        echo "Produto Não encontrado ".PHP_EOL;
        return False;
    }

    public function calcularTotal(): float{
        $total = 0.0;
        foreach ($this->ProdutosCarrinho as $produtoCarrinho) {
            $total += $produtoCarrinho->getPreco();
        }
        echo "Total: R$ ";
        return $total;
    }

    public function listarProdutos(): void{
        foreach ($this->ProdutosCarrinho as $produtoCarrinho) {
            echo "{$produtoCarrinho->getNome()} | Preço : R$ {$produtoCarrinho->getPreco()} | Código: {$jogador->getCodigo()} ".PHP_EOL;
        }
    }
}
?>