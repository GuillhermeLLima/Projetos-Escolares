<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Quarto{
		//Atributos
		private $cod;
 		private $preco;
 		private $nome;
 		private $descricao;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getPreco(){
			return $this->preco;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setPreco($preco){
			$this->preco=$preco;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}
		
	}
?>