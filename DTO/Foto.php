<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Foto{
		//Atributos
		private $cod;

 		private $quarto_cod;

 		private $foto;

 		private $descricao;

 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}

		public function getQuarto_cod(){
			return $this->quarto_cod;
		}

		public function getFoto(){
			return $this->foto;
		}

		public function getDescricao(){
			return $this->descricao;
		}

		
		public function setCod($cod){
			$this->cod=$cod;
		}

		public function setQuarto_cod($quarto_cod){
			$this->quarto_cod=$quarto_cod;
		}

		public function setFoto($foto){
			$this->foto=$foto;
		}

		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}

		
	}
?>