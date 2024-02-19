<?php

    include_once('include_dao.php');

    $funcionarioDAO = new FuncionarioDAO();
    $funcionario = new Funcionario();
    
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $email = $_POST['email']; 
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $foto = $_FILES['foto'];

    if(empty($cod)){
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: não foi possível alterar o funcionário</div>"];
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

        
        $temEmail = $funcionarioDAO->procuraEmail($email);
        
        if($temEmail){
            $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário já existe</div>"];
            
        } else {
            
            $funcionario->setCod($cod);
            $funcionario->setNome($nome); 
            $funcionario->setEmail($email);
            $funcionario->setSenha($senha);
            $funcionario->setTelefone($telefone);
            $funcionario->setEndereco($endereco);
            
        
            if(empty($_FILES['foto']['name'])){

                $funcionarioDAO->atualizarSemFoto($funcionario);
                $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário atualizado com sucesso</div>"];

            } else {

                if(!preg_match("/^image\/(jpeg|jpg|png|JPG|gif)$/", $foto["type"])){
                    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-dangefr' role='alert'>Erro: Formato de imagem inválido</div>"];
                }else{
                    $img = $foto['name'];
                    $destino = "imgFuncionarios/". $img;
                    move_uploaded_file($foto['tmp_name'], $destino);
                    $funcionario->setFoto($img);
            
                    $funcionario = $funcionarioDAO->atualizar($funcionario);
                    $atualizar = $funcionario;
                    if ($atualizar) {
                        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário atualizado com sucesso</div>"];
                    } else {
                        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não atualizado com sucesso</div>"];
                    }

                }
            }
        }

    }

    echo json_encode($retorna);

?>