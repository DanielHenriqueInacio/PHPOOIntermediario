<?php

class Upload 
{
    private $arquivo;
    private $extensoes_permitidas;
    private $tamanho_maximo;

    public function __get($name) 
    {
        return $this->$name;
    }

    public function __set($name, $val) 
    {
        $this->$name=$val;
    }

    public function __construct($arquivo, $extensoes_permitidas = [], $tamanho_maximo = 2097152) 
    {
        $this->arquivo = $arquivo;
        $this->extensoes_permitidas = $extensoes_permitidas;
        $this->tamanho_maximo = $tamanho_maximo;
    }

    public function enviarArquivo($caminho)
    {

    }

    private function validarExtensoes()
    {
        $extensao = pathinfo($this->arquivo['name']); 
        $extensao = $extensao["extension"];
        if(in_array($extensao, $this->extensoes_permitidas)) {
            return true;
        }
        return false;
    }

    private function validarTamanho() {
        if($this->tamanho_maximo < $this->arquivo['size']) {
            return true;
        }
        return false;
    }     
}
