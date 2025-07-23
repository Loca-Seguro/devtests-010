<?php

//a lógica foi, anagramas sempre tem a mesma ordem, entao ordenei em ordem alfabetica
//e criei os grupos unicos de cada anagrama bat = abt, e baseado nisso que o algoritmo funciona
//olhando a ordem das letras e separando em grupos

function resolveAnagrams(array $wordsArray) {
    $groups = [];

    foreach ($wordsArray as $word) {
        // transformo a palavra em um array
        $key = str_split(strtolower($word));

        //organizo em ordem alfabetica
        sort($key);

        //transformo em palavra
        $key = implode('', $key);

        // crio o grupo baseado na ordem
        $groups[$key][] = $word;
    }

    // e retorno so os valores do array
    return array_values($groups);
}

// Validaçao
echo "=== Teste para resoluçao dos Anagramas ===\n";

$test1 = ["bat", "tab", "cat", "act", "tac"];
print_r(resolveAnagrams($test1));

$test2 = ["listen", "silent", "enlist", "google", "gooleg"];
print_r(resolveAnagrams($test2));

$test3 = ["abc", "def", "cab"];
print_r(resolveAnagrams($test3));

