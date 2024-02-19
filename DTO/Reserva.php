<?php

	/* @Autor: Dalker Pinheiro
	   Atributos e métodos da classe */
	   
	class Reserva{
		//Atributos
		private $cliente_cod;

 		private $quarto_cod;

 		private $funcionario_cod;

 		private $cod;

 		private $dataEntrada;

 		private $dataSaida;

 		private $adulto;

		 private $crianca;

 				
		//Métodos Getters e Setters
		public function getCliente_cod(){
			return $this->cliente_cod;
		}

		public function getQuarto_cod(){
			return $this->quarto_cod;
		}

		public function getFuncionario_cod(){
			return $this->funcionario_cod;
		}

		public function getCod(){
			return $this->cod;
		}

		public function getDataEntrada(){
			return $this->dataEntrada;
		}

		public function getDataSaida(){
			return $this->dataSaida;
		}

		public function getAdulto(){
			return $this->adulto;
		}

		public function getCrianca(){
			return $this->crianca;
		}

		
		public function setCliente_cod($cliente_cod){
			$this->cliente_cod=$cliente_cod;
		}

		public function setQuarto_cod($quarto_cod){
			$this->quarto_cod=$quarto_cod;
		}

		public function setFuncionario_cod($funcionario_cod){
			$this->funcionario_cod=$funcionario_cod;
		}

		public function setCod($cod){
			$this->cod=$cod;
		}

		public function setDataEntrada($dataEntrada){
			$this->dataEntrada=$dataEntrada;
		}

		public function setDataSaida($dataSaida){
			$this->dataSaida=$dataSaida;
		}

		public function setAdulto($adulto){
			$this->adulto=$adulto;
		}

		public function setCrianca($crianca){
			$this->crianca=$crianca;
		}

		
	}
?>