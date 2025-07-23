<?php

class Fila
{
    private array $elements = [];

    //adiciona algo na fila
    public function add($element)
    {
        $this->elements[] = $element;
    }

    //remove o primeiro elemento da fila
    public function get()
    {
        if (empty($this->elements)) {
            return null;
        }

        // remove e retorna o primeiro elemento
        return array_shift($this->elements);
    }

    //exibe os status da fila
    public function print(): string
    {
        return json_encode($this->elements);
    }

}

// teste exatamente igual ao do ReadMe
echo "=== Teste da Fila FIFO ===\n\n";

$f = new Fila();

echo "1. Adicionando 'josé'\n";
$f->add("jose");

echo "2. Adicionando 'joão'\n";
$f->add("joao");

echo "3. Status da fila: " . $f->print() . "\n";

echo "4. Adicionando 'maria'\n";
$f->add("maria");

echo "5. Removendo da fila: '" . $f->get() . "'\n";

echo "6. Status final da fila: " . $f->print() . "\n\n";
