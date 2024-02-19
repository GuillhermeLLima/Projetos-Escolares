<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class QuartoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM quarto WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM quarto';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function listarUm($cod){
		include("../methods/conexao.php");		
		$sql = "SELECT quar.cod, quar.nome, quar.preco, quar.descricao, fot.imagem FROM quarto as quar LEFT JOIN foto as fot ON fot.quarto_cod=quar.cod WHERE quar.cod=:cod LIMIT 1";
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}

	public function procuraQuarto($nome){
		include("../methods/conexao.php");
		$sql = "SELECT * FROM cliente WHERE nome=:nome LIMIT 1";
		$consulta = $conexao->prepare($sql);
		$consulta->bindParam(':nome', $nome);
		$consulta->execute();
		if ($consulta->rowCount() != 0)
			return $consulta;
		else
			return false;
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM quarto ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("../methods/conexao.php");

		if(!empty($cod)) {
			$conexao->beginTransaction();

			$sql = 'DELETE FROM foto WHERE quarto_cod = :quarto_cod';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(":quarto_cod",$cod);
			$consulta->execute();

			$sql = 'DELETE FROM quarto WHERE cod = :cod';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(":cod",$cod);
			$consulta->execute();

			$conexao->commit();
			return true;
		}else{
			return false;
		}
	}
	
	//Insere um elemento na tabela
	public function inserir($quarto, $foto){
		include("../methods/conexao.php");
		$sql = 'INSERT INTO quarto (cod, preco, nome, descricao) VALUES (:cod, :preco, :nome, :descricao)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$quarto->getCod()); 

		$consulta->bindValue(':preco',$quarto->getPreco()); 

		$consulta->bindValue(':nome',$quarto->getNome()); 

		$consulta->bindValue(':descricao',$quarto->getDescricao()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($quarto, $foto){
		include("../methods/conexao.php");
		$sql = 'UPDATE quarto SET cod = :cod, preco = :preco, nome = :nome, descricao = :descricao WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$quarto->getCod()); 
		$consulta->bindValue(':preco',$quarto->getPreco()); 
		$consulta->bindValue(':nome',$quarto->getNome()); 
		$consulta->bindValue(':descricao',$quarto->getDescricao()); 
		if($consulta->execute()){

			$sql = 'UPDATE foto SET cod = :cod, foto = :foto WHERE quarto_cod = :cod';
			$consulta = $conexao->prepare($sql);
			$consulta->bindValue(':cod',$foto->getCod()); 
			$consulta->bindValue(':preco',$foto->getFoto());
			$consulta->execute();
			
			return true;
		}else{
			return false;
		}
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM quarto';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>