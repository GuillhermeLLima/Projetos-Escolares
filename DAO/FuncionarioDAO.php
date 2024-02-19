<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class FuncionarioDAO{

	//Carrega um elemento pela chave primária
	public function carregar($cod){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM funcionario WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM funcionario';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function listarUm($cod){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM funcionario WHERE cod = :cod LIMIT 1';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}

	public function procuraEmail($email){
		include("../methods/conexao.php");
		$sql = "SELECT * FROM funcionario WHERE email=:email LIMIT 1";
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':email',$email);
        $consulta->execute();
		if($consulta->rowCount() != 0)
			return true;
		else
			return false;
	}

	public function procuraLogin($email){
		include("../methods/conexao.php");
		$sql = "SELECT * FROM funcionario WHERE email=:email LIMIT 1";
        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':email',$email);
        $consulta->execute();
		if($consulta->rowCount() != 0)
			return $consulta;
		else
			return false;
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM funcionario ORDER BY '.$coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($cod){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM funcionario WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod",$cod);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($funcionario){
		include("../methods/conexao.php");
		$sql = 'INSERT INTO funcionario (cod, nome, email, senha, telefone, endereco, foto) VALUES (:cod, :nome, :email, :senha, :telefone, :endereco, :foto)';
		$consulta = $conexao->prepare($sql);
		
		$consulta->bindValue(':cod',$funcionario->getCod()); 

		$consulta->bindValue(':nome',$funcionario->getNome()); 

		$consulta->bindValue(':email',$funcionario->getEmail()); 

		$consulta->bindValue(':senha',$funcionario->getSenha()); 

		$consulta->bindValue(':telefone',$funcionario->getTelefone()); 

		$consulta->bindValue(':endereco',$funcionario->getEndereco()); 

		$consulta->bindValue(':foto',$funcionario->getFoto()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($funcionario){
		include("../methods/conexao.php");
		$sql = 'UPDATE funcionario SET cod = :cod, nome = :nome, email = :email, senha = :senha, telefone = :telefone, endereco = :endereco, foto = :foto WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$funcionario->getCod()); 

		$consulta->bindValue(':nome',$funcionario->getNome()); 

		$consulta->bindValue(':email',$funcionario->getEmail()); 

		$consulta->bindValue(':senha',$funcionario->getSenha()); 

		$consulta->bindValue(':telefone',$funcionario->getTelefone()); 

		$consulta->bindValue(':endereco',$funcionario->getEndereco()); 

		$consulta->bindValue(':foto',$funcionario->getFoto()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	public function atualizarSemFoto($funcionario){
		include("../methods/conexao.php");
		$sql = 'UPDATE funcionario SET cod = :cod, nome = :nome, email = :email, senha = :senha, telefone = :telefone, endereco = :endereco WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod',$funcionario->getCod()); 

		$consulta->bindValue(':nome',$funcionario->getNome()); 

		$consulta->bindValue(':email',$funcionario->getEmail()); 

		$consulta->bindValue(':senha',$funcionario->getSenha()); 

		$consulta->bindValue(':telefone',$funcionario->getTelefone()); 

		$consulta->bindValue(':endereco',$funcionario->getEndereco()); 

		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		include("../methods/conexao.php");
		$sql = 'DELETE FROM funcionario';
		$consulta = $conexao->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}

}
?>