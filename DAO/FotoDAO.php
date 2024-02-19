<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class FotoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM foto WHERE quarto_cod = :quarto_cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":quarto_cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM foto';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function listarUm($cod){
		include("../methods/conexao.php");
		
		$sql = 'SELECT * FROM quarto WHERE quarto_cod = :quarto_cod LIMIT 1';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":quarto_cod",$cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM foto ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM foto WHERE quarto_cod = :quarto_cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":quarto_cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($foto){
		include("../methods/conexao.php");
		$sql = 'INSERT INTO foto (cod, quarto_cod, foto, descricao) VALUES (:cod, :quarto_cod, :foto, :descricao)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$foto->getCod()); 

		$consulta->bindValue(':quarto_cod',$foto->getQuarto_cod()); 

		$consulta->bindValue(':foto',$foto->getFoto()); 

		$consulta->bindValue(':descricao',$foto->getDescricao()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($foto){
		include("../methods/conexao.php");
		$sql = 'UPDATE foto SET cod = :cod, quarto_cod = :quarto_cod, foto = :foto, descricao = :descricao WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$foto->getCod()); 

		$consulta->bindValue(':quarto_cod',$foto->getQuarto_cod()); 

		$consulta->bindValue(':foto',$foto->getFoto()); 

		$consulta->bindValue(':descricao',$foto->getDescricao()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM foto';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>