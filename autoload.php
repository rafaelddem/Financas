<?php
    
    spl_autoload_register(function (string $nomeClasse) {
        $caminhoClasse = str_replace('rafael\\financas', '..', $nomeClasse);
        $caminhoClasse = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoClasse);
        $caminhoClasse .= ".php";
        if (file_exists($caminhoClasse)) {
            include_once $caminhoClasse;
        }
    });

?>