<?php
namespace App;

use InvalidArgumentException;

class Estacionamento{
    private array $veiculos = [];
    private int $capacidadeAtual;

    public function __construct(
        private int $capacidade
    ){
        if ($capacidade <= 0) {
            throw new InvalidArgumentException("Capacidade inválida");
        }
        $this->capacidadeAtual = $capacidade;
    }

    public function adicionarVeiculo(Veiculo $veiculoNovo): bool{
        foreach($this->veiculos as $veiculo) {
            if ($veiculo->getPlaca() == $veiculoNovo->getPlaca()) {
                    echo "Veiculo já cadastrado.".PHP_EOL;
                    return False;
            }
        }
        
        if ($this->capacidadeAtual > 0) {
            $this->veiculos[] = $veiculoNovo;
            $this->capacidadeAtual -= 1; 
            echo "Veículo cadastrado.".PHP_EOL;
            return True;
        } else {
            echo "Nenhuma vaga disponível".PHP_EOL;
            return False;
        }
    }

    public function removerVeiculo(Veiculo $veiculoNovo): bool{
        foreach($this->veiculos as $chave => $veiculo) {
            if ($veiculo->getPlaca() == $veiculoNovo->getPlaca()) {
                    unset($this->veiculos[$chave]);
                    echo "Veículo removido. ".PHP_EOL;
                    $this->capacidadeAtual += 1;
                    return True;
            }
        }
        echo "Veículo não encontrado. ".PHP_EOL;
        return True;
    }

    public function encontrarVeiculo(string $placa): bool{
        foreach ($this->veiculos as $veiculo) {
            if (trim($veiculo->getPlaca()) == trim($placa)) {
                echo "Veículo encontrado: ";
                echo "{$veiculo->getModelo()} | Placa: $placa --- Proprietário: {$veiculo->getNome()} ".PHP_EOL;
                return True;
            }
        }
        echo "Veiculo não encontrado.".PHP_EOL;
        return False;
        }

    public function quantidadeDeVagas(): int{
        echo "Vagas disponíveis: ";
        return $this->capacidadeAtual;
    }

    public function listarVeiculos(): void{
        foreach($this->veiculos as $veiculo) {
            echo "{$veiculo->getModelo()} | Placa: {$veiculo->getPlaca()} --- Proprietário: {$veiculo->getNome()} ".PHP_EOL;
        }
    }
}
?>