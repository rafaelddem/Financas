<?php

$bancoAntigo = "financas2";
$bancoNovo = "financas";
$pdoBancoAntigo = new PDO("mysql:host=127.0.0.1;dbname=$bancoAntigo", "root", "root");
$pdoBancoNovo = new PDO("mysql:host=127.0.0.1;dbname=$bancoNovo", "root", "root");
$sqlEmprestimosBancoAntigo = getSqlEmprestimos($bancoAntigo, date("Y-m-d"));
$sqlEmprestimosBancoNovo = getSqlEmprestimos($bancoNovo, date("Y-m-d"));
$sqlTotaisBancoAntigo = getSqlTotais($bancoAntigo, date("Y-m-d"));
$sqlTotaisBancoNovo = getSqlTotais($bancoNovo, date("Y-m-d"));

try {
    $sql = "select * from tbfi_movimento where dat_dataPagamento <= '".date("Y-m-d")."'";
    $stmt = $pdoBancoAntigo->prepare($sqlTotaisBancoAntigo);
    if($stmt->execute()) {
        if($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<pre>";
                var_dump($row);
                echo "</pre><br>";
            }
        }
    }
} catch (\Throwable $th) {
    echo "erro";
}

function getSqlEmprestimos(string $banco, string $data)
{
    $data = "'".$data."'";
    return 
    "select c.str_nome, 
    (select distinct
        (
            (
                (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_tipoMovimento = 5 and dat_dataPagamento <= $data and int_carteiraDestino = c.int_codigo) 
                - (select ifnull(sum(dub_valorFinal), 0) from financas2.tbfi_movimento where int_tipoMovimento = 4 and dat_dataPagamento <= $data and int_carteiraOrigem = c.int_codigo)
            ) + (
                (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_tipoMovimento = 6 and dat_dataPagamento <= $data and int_carteiraDestino = c.int_codigo) 
                - (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_tipoMovimento = 7 and dat_dataPagamento <= $data and int_carteiraOrigem = c.int_codigo)
            )
        ) 
    from $banco.tbfi_movimento where int_codigo = (select min(int_codigo) from $banco.tbfi_movimento) and int_carteiraOrigem = c.int_codigo or int_carteiraDestino = c.int_codigo) as valor
    from $banco.tbfi_carteira c where chr_dono = 2;";
}

function getSqlTotais(string $banco, string $data)
{
    $data = "'".$data."'";
    return 
    "select distinct
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 4 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 4 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 4 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as casa, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 5 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 5 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 5 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as caixa, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 6 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 6 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 6 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as nubank, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 7 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 7 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 7 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as nuconta, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 8 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 4 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 4 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as itau, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 9 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 9 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 9 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as poupanca, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 10 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 10 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 10 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as banco_do_brasil, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 11 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 11 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 11 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as mae, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 12 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 12 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 12 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as pai, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 13 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 13 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 13 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as victor, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 14 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 14 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 14 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as fernando, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 15 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 15 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 15 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as poline, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 16 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 16 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 16 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as beatriz, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 17 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 17 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 17 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as josi, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 18 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 18 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 18 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as giane, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 19 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 19 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 19 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as thayse, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 20 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 20 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 20 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as rangel, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 21 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 21 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 21 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as isabelle, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 22 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 22 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 22 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as danilo, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 23 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 23 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 23 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as gabriela, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 24 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 24 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 24 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as santander, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 25 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 25 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 25 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as igor, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 26 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 26 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 26 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as juliana_pacifico, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 27 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 27 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 27 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as marilia, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 28 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 28 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 28 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as larissa, 
        (select ifnull(sum(dub_valorFinal), 0) + (select ifnull(sum(dub_valorInicial), 0) from $banco.tbfi_movimento where int_carteiraDestino = 29 and int_tipoMovimento = 34 and dat_dataPagamento <= $data) - (select ifnull(sum(dub_valorFinal), 0) from $banco.tbfi_movimento where int_carteiraOrigem = 29 and dat_dataPagamento <= $data) from $banco.tbfi_movimento where int_carteiraDestino = 29 and int_tipoMovimento <> 34 and dat_dataPagamento <= $data) as picpay 
    from $banco.tbfi_movimento where int_codigo = (select min(int_codigo) from $banco.tbfi_movimento);";
}
echo "terminou";
exit;