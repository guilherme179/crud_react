<?php 

namespace App\DAO;
use App\Models\FormularioModel;

class FormularioDAO extends Conexao {
    
    public function __construct(){
        parent::__construct();
    }

    public function insertUsuario(FormularioModel $FormularioModel): array 
    {
        $query = "INSERT INTO crud_react.formulario(
            nome,
            email,
            contato,
            idade,
        ) VALUES (
            :nome,
            :email,
            :contato,
            :idade,
        )";

        $statement = $this->pdo->prepare($query);
        $statement = $statement->execute([
            "nome" => $FormularioModel->getNome(),
            "email" => $FormularioModel->getEmail(),
            "contato" => $FormularioModel->getContato(),
            "idade" => $FormularioModel->getIdade()
        ]);

        if($statement){
            return ["mensagem" => "Usuario cadastrado com sucesso", "sucesso" => true];
        }
        else{
            return ["mensagem" => "Houve um erro ao cadastrar o usuario", "sucesso" => false];
        }
    }
    
    public function getUsuarios(): array 
    {
        $query = "SELECT * FROM usuarios";

        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $resultado = $statement->fetchAll();
        
        if(count($resultado) > 0){
            return ["mensagem" => $resultado, "sucesso" => true];
        }
        else{
            return ["mensagem" => "Não há usuarios a serem exibidos", "sucesso" => false];
        }
    }

    public function getUsuarioPorId(FormularioModel $FormularioModel): array 
    {
        $query = "SELECT * FROM usuarios where id_usuario = :id_usuario";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "id_usuario" => $FormularioModel->getId()
        ]);
        $resultado = $statement->fetchAll();
        
        if(count($resultado) > 0){
            return ["mensagem" => $resultado, "sucesso" => true];
        }
        else{
            return ["mensagem" => "Não há usuario com este id", "sucesso" => false];
        }
    }

    public function deleteUsuario(FormularioModel $FormularioModel): array 
    {
        $query = "DELETE FROM usuarios where id_usuario = :id_usuario";
        
        $statement = $this->pdo->prepare($query);
        $resultado = $statement->execute([
            "id_usuario" => $FormularioModel->getId()
        ]);
        
        if($resultado){
            return ["mensagem" => "Usuario deletado com sucesso", "sucesso" => true];
        }
        else{
            return ["mensagem" => "Não foi possível deletar este usuario", "sucesso" => false];
        }
    }

    public function updateUsuario(FormularioModel $FormularioModel): array 
    {
        $query = "UPDATE crud_react.formulario SET
            nome = :nome,
            email = :email,
            contato = :contato,
            idade = :idade,
            WHERE 
            id_usuario = :id_usuario;
        )";

        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "nome" => $FormularioModel->getNome(),
            "email" => $FormularioModel->getEmail(),
            "contato" => $FormularioModel->getContato(),
            "idade" => $FormularioModel->getIdade(),
            "id" => $FormularioModel->getId()
        ]);

        if($statement->rowCount() > 0){
            return ["mensagem" => "Usuario alterado com sucesso", "sucesso" => true];
        }
        else{
            return ["mensagem" => "Houve um erro ao alterar o usuario", "sucesso" => false];
        }
    }
}