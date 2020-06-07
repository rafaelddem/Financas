<?php

    namespace rafael\financas\model\entity;

    include_once '..\..\..\autoload.php';
    include_once '..\..\..\vendor\autoload.php';

    use PHPUnit\Framework\TestCase;

    class CarteiraTest extends TestCase{

        public function testCriaCarteira() {
            $carteira = new Carteira(null, "Nome grande 2", 1, 1, true);
            $this -> assertEquals(0, $carteira -> getCodigo());
        }

    }

?>