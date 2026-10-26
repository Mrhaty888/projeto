<?php

namespace App;

use InvalidArgumentException;

class Acompanhamento{

    private array $atividades = [];

    private float $total = 0;
    private float $valores = 0;
    
    public function __construct(
        private string $nome,
        private int $cargaHoraria
    ){
        if (trim($nome)=="") {
            throw new InvalidArgumentException('Nome inválido. ');
        }
        if ($cargaHoraria <= 0) {
            throw new InvalidArgumentException('CargaHoraria inválida. ');
        }
    }


     public function AdicionarAtividade(Atividade $atividadeNova): bool{
        foreach ($this->atividades as $atividade) {
            if ($atividade->getTitulo() == $atividadeNova->getTitulo()) {
                echo "Atividade já cadastrada. ".PHP_EOL;
                return False;
            }
        }
        $this->atividades[] = $atividadeNova;
        echo "Atividade cadastrada. ".PHP_EOL;
        return True;
    }

    public function verDesempenho(): float{
        echo "Desempenho (notas/valormáximo) (Nota máxima=1) : ";
        if (count($this->atividades)==0) {
            return 0;
        }
        foreach ($this->atividades as $atividade) {
            $this->total += $atividade->getNota();
            $this->valores += $atividade->getvalorMaximo();
        }
        $this->total = $this->total/$this->valores;
        return round($this->total,2);
    }

    public function atualizarNota(string $tituloProcurado, float $novaNota): bool {
        foreach ($this->atividades as $atividade) {
            if ($atividade->getTitulo() === $tituloProcurado) {
                $atividade->mudarNota($novaNota); 
                return true; 
            }
        }
        echo "Atividade Não encontrada.".PHP_EOL;
        return false; 
}

    public function ListarAtividades(): void{
        echo "Disciplina: {$this->nome} | Carga Horaria: {$this->cargaHoraria}h" . PHP_EOL;
        echo "Atividades: ".PHP_EOL;
        foreach ($this->atividades as $atividade) {
            echo "Atividade: {$atividade->getTitulo()} | Nota do aluno: {$atividade->getNota()}".PHP_EOL;
        }
    }
}
?>