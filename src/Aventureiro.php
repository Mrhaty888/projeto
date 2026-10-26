<?php

namespace App;

use InvalidArgumentException;

class Aventureiro{

    public function __construct(
        private string $nome,
        private int $vida,
        private Mochila $mochila
    ){
        if (trim($nome)=="") {
                throw new InvalidArgumentException("Nome inválido");
            }
        if ($vida <= 0) {
                throw new InvalidArgumentException("Vida inválida");
            }
    }

    public function coletarItem(Equipamento $equipamento): bool{
        return $this->mochila->adicionarItems($equipamento);
    }

    public function removerItem(Equipamento $equipamento): bool{
        return $this->mochila->removerItems($equipamento);
    }

    public function getTotal(): float{
        return $this->mochila->getTotal();
    }

    public function getTotalMoedas(): int{
        return $this->mochila->getTotalMoedas();
    }

    public function espacoRestante(): float{
        return $this->mochila->espacoRestante();
    }

    public function listarEquipamentos(): void{
        $this->mochila->listarEquipamentos();
    }
}
?>