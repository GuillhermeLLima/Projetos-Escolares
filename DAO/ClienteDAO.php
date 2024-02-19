<?php

/* @Autor: Dalker Pinheiro
	  Classe DAO */

class ClienteDAO
{

	//Carrega um elemento pela chave primária
	public function carregar($cod)
	{
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM cliente WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod", $cod);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos()
	{
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM cliente ORDER BY cod DESC';
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function listarUm($cod)
	{
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM cliente WHERE cod = :cod LIMIT 1';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod", $cod);
		$consulta->execute();
		return ($consulta->fetch(PDO::FETCH_ASSOC));
	}


	public function procuraEmail($email)
	{
		include("../methods/conexao.php");
		$sql = "SELECT * FROM cliente WHERE email=:email LIMIT 1";
		$consulta = $conexao->prepare($sql);
		$consulta->bindParam(':email', $email);
		$consulta->execute();
		if ($consulta->rowCount() != 0)
			return true;
		else
			return false;
	}

	public function procuraLogin($email)
	{
		include("../methods/conexao.php");
		$sql = "SELECT * FROM cliente WHERE email=:email LIMIT 1";
		$consulta = $conexao->prepare($sql);
		$consulta->bindParam(':email', $email);
		$consulta->execute();
		if ($consulta->rowCount() != 0)
			return $consulta;
		else
			return false;
	}

	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna)
	{
		include("../methods/conexao.php");
		$sql = 'SELECT * FROM cliente ORDER BY ' . $coluna;
		$consulta = $conexao->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Apaga um elemento da tabela
	public function deletar($cod)
	{
		include("../methods/conexao.php");
		$sql = 'DELETE FROM cliente WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(":cod", $cod);
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Insere um elemento na tabela
	public function inserir($cliente)
	{
		include("../methods/conexao.php");
		$sql = 'INSERT INTO cliente (cod, nome, email, senha, telefone, endereco, foto) VALUES (:cod, :nome, :email, :senha, :telefone, :endereco, :foto)';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod', $cliente->getCod());

		$consulta->bindValue(':nome', $cliente->getNome());

		$consulta->bindValue(':email', $cliente->getEmail());

		$consulta->bindValue(':senha', $cliente->getSenha());

		$consulta->bindValue(':telefone', $cliente->getTelefone());

		$consulta->bindValue(':endereco', $cliente->getEndereco());

		$consulta->bindValue(':foto', $cliente->getFoto());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Atualiza um elemento na tabela
	public function atualizar($cliente)
	{
		include("../methods/conexao.php");
		$sql = 'UPDATE cliente SET cod = :cod, nome = :nome, email = :email, senha = :senha, telefone = :telefone, endereco = :endereco, foto = :foto WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod', $cliente->getCod());

		$consulta->bindValue(':nome', $cliente->getNome());

		$consulta->bindValue(':email', $cliente->getEmail());

		$consulta->bindValue(':senha', $cliente->getSenha());

		$consulta->bindValue(':telefone', $cliente->getTelefone());

		$consulta->bindValue(':endereco', $cliente->getEndereco());

		$consulta->bindValue(':foto', $cliente->getFoto());
		if ($consulta->execute())
			return true;
		else
			return false;
	}

	public function atualizarSemFoto($cliente)
	{
		include("../methods/conexao.php");
		$sql = 'UPDATE cliente SET cod = :cod, nome = :nome, email = :email, senha = :senha, telefone = :telefone, endereco = :endereco WHERE cod = :cod';
		$consulta = $conexao->prepare($sql);
		$consulta->bindValue(':cod', $cliente->getCod());

		$consulta->bindValue(':nome', $cliente->getNome());

		$consulta->bindValue(':email', $cliente->getEmail());

		$consulta->bindValue(':senha', $cliente->getSenha());

		$consulta->bindValue(':telefone', $cliente->getTelefone());

		$consulta->bindValue(':endereco', $cliente->getEndereco());

		if ($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela()
	{
		include("../methods/conexao.php");
		$sql = 'DELETE FROM cliente';
		$consulta = $conexao->prepare($sql);
		if ($consulta->execute())
			return true;
		else
			return false;
	}
}
?>