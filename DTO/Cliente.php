<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Cliente{
		//Atributos
		private $cod;
 		private $nome;
 		private $email;
 		private $senha;
 		private $telefone;
 		private $endereco;
 		private $foto;
 				
		//Métodos Getters e Setters
		public function getCod(){
			return $this->cod;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function getEndereco(){
			return $this->endereco;
		}
		public function getFoto(){
			return $this->foto;
		}
		
		public function setCod($cod){
			$this->cod=$cod;
		}
		public function setNome($nome){
			$this->nome=$nome;
		}
		public function setEmail($email){
			$this->email=$email;
		}
		public function setSenha($senha){
			$this->senha=$senha;
		}
		public function setTelefone($telefone){
			$this->telefone=$telefone;
		}
		public function setEndereco($endereco){
			$this->endereco=$endereco;
		}
		public function setFoto($foto){
			$this->foto=$foto;
		}
		
	}
?>