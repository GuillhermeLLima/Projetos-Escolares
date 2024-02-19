<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class ReservaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM reserva WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM reserva';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function listarUm($cod){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM reserva WHERE cod = :cod LIMIT 1';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM reserva ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function procuraReserva($dataEntrada, $dataSaida, $codQuarto){
		include("../methods/conexao.php");
		$sql = "SELECT * FROM reserva WHERE dataEntrada=:dataEntrada, dataSaida=:dataSaida, quarto_cod=:quarto_cod LIMIT 1";
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':dataEntrada',$dataEntrada);
		$consulta->bindParam(':dataSaida',$dataSaida);
		$consulta->bindParam(':quarto_cod',$codQuarto);
        $consulta->execute();
		if($consulta->rowCount() != 0)
			return true;
		else
			return false;

	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM reserva WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($reserva){
		include("../methods/conexao.php");
		$sql = 'INSERT INTO reserva (cliente_cod, quarto_cod, funcionario_cod, cod, dataEntrada, dataSaida, adulto, crianca) VALUES (:cliente_cod, :quarto_cod, :funcionario_cod, :cod, :dataEntrada, :dataEntrada, :adulto, :crianca)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cliente_cod',$reserva->getCliente_cod()); 

		$consulta->bindValue(':quarto_cod',$reserva->getQuarto_cod()); 

		$consulta->bindValue(':funcionario_cod',$reserva->getFuncionario_cod()); 

		$consulta->bindValue(':cod',$reserva->getCod()); 

		$consulta->bindValue(':dataEntrada',$reserva->getDataEntrada()); 

		$consulta->bindValue(':dataEntrada',$reserva->getDataSaida()); 

		$consulta->bindValue(':adulto',$reserva->getAdulto()); 

		$consulta->bindValue(':crianca',$reserva->getCrianca()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($reserva){
		include("../methods/conexao.php");
		$sql = 'UPDATE reserva SET cliente_cod = :cliente_cod, quarto_cod = :quarto_cod, funcionario_cod = :funcionario_cod, cod = :cod, dataEntrada = :dataEntrada, dataSaida = :dataSaida, adulto = :adulto, crianca = :crianca WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cliente_cod',$reserva->getCliente_cod()); 

		$consulta->bindValue(':quarto_cod',$reserva->getQuarto_cod()); 

		$consulta->bindValue(':funcionario_cod',$reserva->getFuncionario_cod()); 

		$consulta->bindValue(':cod',$reserva->getCod()); 

		$consulta->bindValue(':dataEntrada',$reserva->getDataEntrada());
		
		$consulta->bindValue(':dataSaida',$reserva->getDataSaida());

		$consulta->bindValue(':adulto',$reserva->getAdulto());

		$consulta->bindValue(':crianca',$reserva->getCrianca());

		if($consulta->execute()){
			return true;
		}else{	
			return false;
		}
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM reserva';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>