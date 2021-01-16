<?php

    namespace rafael\financas\model\entity;

    use \Exception;
	use \DateTime;
    use rafael\financas\model\entity\Carteira;
    use rafael\financas\model\entity\FormaPagamento;
    use rafael\financas\model\entity\TipoMovimento;

    class Movimento
    {
        private int $codigo;
        private int $parcela;
        private TipoMovimento $tipoMovimento;
        private DateTime $dataMovimento;
        private DateTime $dataPagamento;
        private float $valorInicial;
        private float $desconto;
        private float $tributacao;
        private float $juros;
        private float $arredondamento;
        private FormaPagamento $formaPagamento;
        private Carteira $carteiraOrigem;
        private Carteira $carteiraDestino;
        private int $indispensavel;
        private string $descricao;

        public function __construct(int $codigo, int $parcela, TipoMovimento $tipoMovimento, DateTime $dataMovimento, DateTime $dataPagamento, 
                                    float $valorInicial, float $desconto, float $tributacao, float $juros, float $arredondamento, 
                                    FormaPagamento $formaPagamento, Carteira $carteiraOrigem, Carteira $carteiraDestino, int $indispensavel, 
                                    string $descricao)
        {
            self::setCodigo($codigo);
            self::setParcela($parcela);
            self::setTipoMovimento($tipoMovimento);
            self::setDataMovimento($dataMovimento);
            self::setDataPagamento($dataPagamento);
            self::setValorInicial($valorInicial);
            self::setDesconto($desconto);
            self::setTributacao($tributacao);
            self::setJuros($juros);
            self::setArredondamento($arredondamento);
            self::setFormaPagamento($formaPagamento);
            self::setCarteiraOrigem($carteiraOrigem);
            self::setCarteiraDestino($carteiraDestino);
            self::setIndispensavel($indispensavel);
            self::setDescricao($descricao);
        }

        public function setCodigo(int $codigo)
        {
            $this->codigo = $codigo;
        }

        public function getCodigo() : int
        {
            return $this->codigo;
        }

        public function setParcela(int $parcela)
        {
            $this->parcela = $parcela;
        }

        public function getParcela() : int
        {
            return $this->parcela;
        }
        
        public function setTipoMovimento(TipoMovimento $tipoMovimento)
        {
            $this->tipoMovimento = $tipoMovimento;
        }

        public function getTipoMovimento() : TipoMovimento
        {
            return $this->tipoMovimento;
        }

        public function getCodigoTipoMovimento() : int
        {
            return $this->tipoMovimento->getCodigo();
        }
        
        public function setDataMovimento(DateTime $dataMovimento)
        {
            $this->dataMovimento = $dataMovimento;
        }
        
        public function getDataMovimento() : DateTime
        {
            return $this->dataMovimento;
        }
        
        public function setDataPagamento(DateTime $dataPagamento)
        {
            $this->dataPagamento = $dataPagamento;
        }
        
        public function getDataPagamento() : DateTime
        {
            return $this->dataPagamento;
        }

        public function setValorInicial(float $valorInicial)
        {
            $this->valorInicial = $valorInicial;
        }

        public function getValorInicial() : float
        {
            return $this->valorInicial;
        }

        public function setDesconto(float $desconto)
        {
            $this->desconto = $desconto;
        }

        public function getDesconto() : float
        {
            return $this->desconto;
        }

        public function setTributacao(float $tributacao)
        {
            $this->tributacao = $tributacao;
        }

        public function getTributacao() : float
        {
            return $this->tributacao;
        }

        public function setJuros(float $juros)
        {
            $this->juros = $juros;
        }

        public function getJuros() : float
        {
            return $this->juros;
        }

        public function setArredondamento(float $arredondamento)
        {
            $this->arredondamento = $arredondamento;
        }

        public function getArredondamento() : float
        {
            return $this->arredondamento;
        }

        public function getValorFinal() : float
        {
            return ($this->valorInicial - $this->desconto) + $this->tributacao + $this->juros + $this->arredondamento;
        }

        public function setFormaPagamento(FormaPagamento $formaPagamento)
        {
            $this->formaPagamento = $formaPagamento;
        }

        public function getFormaPagamento() : FormaPagamento
        {
            return $this->formaPagamento;
        }

        public function getCodigoFormaPagamento() : int
        {
            return $this->formaPagamento->getCodigo();
        }

        public function setCarteiraOrigem(Carteira $carteiraOrigem)
        {
            $this->carteiraOrigem = $carteiraOrigem;
        }

        public function getCarteiraOrigem() : Carteira
        {
            return $this->carteiraOrigem;
        }

        public function getCodigoCarteiraOrigem() : int
        {
            return $this->carteiraOrigem->getCodigo();
        }

        public function setCarteiraDestino(Carteira $carteiraDestino)
        {
            $this->carteiraDestino = $carteiraDestino;
        }

        public function getCarteiraDestino() : Carteira
        {
            return $this->carteiraDestino;
        }

        public function getCodigoCarteiraDestino() : int
        {
            return $this->carteiraDestino->getCodigo();
        }

        public function setIndispensavel(int $indispensavel)
        {
            $this->indispensavel = $indispensavel;
        }

        public function getIndispensavel() : int
        {
            return $this->indispensavel;
        }
        
        public function setDescricao(string $descricao)
        {
            $this->descricao = $descricao;
        }

        public function getDescricao() : string
        {
            return $this->descricao;
        }
    }
?>