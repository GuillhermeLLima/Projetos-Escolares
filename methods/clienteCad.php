<?php

    include_once('include_dao.php');

    $clienteDAO = new ClienteDAO();
    $cliente = new Cliente();
    
    $nome = $_POST['nome'];
    $email = $_POST['email']; 
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $foto = $_FILES['foto'];

    if(empty($nome) && empty($email) && empty($senha) && empty($telefone) && empty($endereco) && empty($foto)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher todos os campos</div>"];
    } else if(empty($nome)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo nome</div>"];
    } else if(empty($email)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo email</div>"];
    } else if(empty($senha)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo senha</div>"];
    } else if(empty($telefone)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo telefone</div>"];
    } else if(empty($endereco)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo endereço</div>"];
    } else if(empty($foto)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: necessário preencher o campo foto</div>"];
    } else {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Validar</div>"];
    
        $temEmail = $clienteDAO->procuraEmail($email);
        
        if($temEmail){
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário já existe</div>"];
        } else {

            $cliente->setNome($nome); 
            $cliente->setEmail($email);
            $cliente->setSenha($senha);
            $cliente->setTelefone($telefone);
            $cliente->setEndereco($endereco);

            if(empty($_FILES['foto']['name'])){

                $semFoto = "semFoto.png";
                $cliente->setFoto($semFoto);
        
                $inserir = $clienteDAO->inserir($cliente);
                if ($inserir) {
                    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso</div>"];
                } else {
                    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso</div>"];
                }

            } else {
            
                if(!preg_match("/^image\/(jpeg|jpg|png|JPG|gif)$/", $foto["type"])){
                    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Formato de imagem inválido</div>"];
                }else{
                    $img = $foto['name'];
                    $destino = "imgClientes/". $img;
                    move_uploaded_file($foto['tmp_name'], $destino);
                    $cliente->setFoto($img);
            
                    $inserir = $clienteDAO->inserir($cliente);
                    if ($inserir) {
                        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário cadastrado com sucesso</div>"];
                    } else {
                        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não cadastrado com sucesso</div>"];
                    }
                }

            }

        }
        
    }

    echo json_encode($retorna);


    

?>




