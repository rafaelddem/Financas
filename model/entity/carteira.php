<?php

    namespace rafael\financas\model\entity;

    use \Exception;

    class Carteira
    {
        private int $codigo;
        private string $nome;
        private int $dono;
        private bool $ativo;
        
        public function __construct(int $codigo, string $nome, int $dono, bool $ativo)
        {
            self::setCodigo($codigo);
            self::setNome($nome);
            self::setDono($dono);
            self::setAtivo($ativo);
        }
        
        public function getCodigo() : int
        {
            return $this->codigo;
        }
        
        public function setCodigo(int $codigo)
        {
            $this->codigo = $codigo;
        }
        
        public function getNome() : string
        {
            return $this->nome;
        }
        
        public function setNome(string $nome)
        {
            if(strlen($nome) < 3 or strlen($nome) > 30)
                throw new Exception("Necessário que o identificador da carteira tenha entre 3 e 30 caracteres.", 1);
            else if (preg_match('/[!@#$%&*{}$?<>:;|\/]/', $nome))
                throw new Exception("Não são permitidos caracteres especiais no identificador da carteira.", 2);
            
            $this->nome = $nome;
        }
        
        public function getDono() : int
        {
            return $this->dono;
        }
        
        public function setDono(int $dono)
        {
            if (!in_array($dono, array(1, 2)))
                throw new Exception("Identificador de 'Dono' de carteira não aceito.", 3);
            
            $this->dono = $dono;
        }
        
        public function getAtivo() : bool
        {
            return $this->ativo;
        }
        
        public function setAtivo(bool $ativo)
        {
            $this->ativo = $ativo;
        }
        
        public function __toString() : string
        {
            $string = "(" . $this->codigo . ")" . $this->nome;
            return $string;
        }

    }
    
?>