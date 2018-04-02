<?php

abstract class Produto {

    protected $id;
    protected $nome;
    protected $preco;
    protected $descricao;
    protected $categoria;
    protected $usado;

    function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {
		$this->nome = $nome;
		$this->preco = $preco;
		$this->descricao = $descricao;
		$this->categoria = $categoria;
		$this->usado = $usado;
    }

    abstract function atualizaBaseadoEm($params);

    public function temTaxaImpressao() {
        return $this instanceof LivroFisico;
    }
    
    public function temWaterMark() {
        return $this instanceof Ebook;
    }
    
    public function calculaImposto() {
        return $this->preco * 0.195;
    }

    public function precoComDesconto($valor = 0.1) {
        if ($valor > 0 && $valor <= 0.5) {
            $this->preco -= $this->preco * $valor;
        }
        return $this->preco;
    }

    public function temIsbn() {
        return $this instanceof Livro;
    }

    function __toString() {
        return $this->nome.": R$ ".$this->preco;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function isUsado() {
        return $this->usado;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }
}
?>