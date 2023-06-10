<?php

namespace App\Controllers;

use App\Models\FormularioModel;
use App\DAO\FormularioDAO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class FormularioController{

    public function insertUsuario(Request $request, Response $response): Response{
        
        $data = $request->getParsedBody();
        $FormularioModel = new FormularioModel;
        $FormularioDAO = new FormularioDAO();
        
        if(empty($data['nome']) || empty($data['email']) || empty($data['contato']) || empty($data['idade'])){
            return $response->withJson([
                "status" => 400,
                "mensagem" => "Você deve passar todos os campos"
            ]);
        }       

        $FormularioModel->setNome($data['nome']);
        $FormularioModel->setEmail($data['email']);
        $FormularioModel->setContato($data['contato']);
        $FormularioModel->setIdade($data['idade']);

        $resultado = $FormularioDAO->insertUsuario($FormularioModel);

        return $response->withJson([
            "status" => $resultado['sucesso'] ? 202 : 400,
            "mensagem" => $resultado['mensagem']
        ]);
        
    }    
    
    public function getUsuarios(Request $request, Response $response): Response{
        
        $FormularioDAO = new FormularioDAO();
        
        $resultado = $FormularioDAO->getUsuarios();
        
        return $response->withJson([
            "status" => $resultado['sucesso'] ? 202 : 400,
            "mensagem" => $resultado['mensagem']
        ]);
        
    }    

    public function getUsuarioPorId(Request $request, Response $response): Response{
        
        $data = $request->getParsedBody();
        $FormularioModel = new FormularioModel;
        $FormularioDAO = new FormularioDAO();
        
        if(empty($data['id'])){
            return $response->withJson([
                "status" => 400,
                "mensagem" => "Você deve passar um id"
            ]);
        }       

        $FormularioModel->setId($data['id']);

        $resultado = $FormularioDAO->getUsuarioPorId($FormularioModel);

        return $response->withJson([
            "status" => $resultado['sucesso'] ? 202 : 400,
            "mensagem" => $resultado['mensagem']
        ]);
        
    }    

    public function deleteUsuario(Request $request, Response $response): Response{
        
        $data = $request->getParsedBody();
        $FormularioModel = new FormularioModel;
        $FormularioDAO = new FormularioDAO();
        
        if(empty($data['id'])){
            return $response->withJson([
                "status" => 400,
                "mensagem" => "Você deve passar um id"
            ]);
        }       

        $FormularioModel->setId($data['id']);

        $resultado = $FormularioDAO->deleteUsuario($FormularioModel);

        return $response->withJson([
            "status" => $resultado['sucesso'] ? 202 : 400,
            "mensagem" => $resultado['mensagem']
        ]);
        
    }    

    public function updateUsuario(Request $request, Response $response): Response{
        
        $data = $request->getParsedBody();
        $FormularioModel = new FormularioModel;
        $FormularioDAO = new FormularioDAO();
        
        if(empty($data['nome']) || empty($data['email']) || empty($data['contato']) || empty($data['idade'])){
            return $response->withJson([
                "status" => 400,
                "mensagem" => "Você deve passar todos os campos"
            ]);
        }

        $FormularioModel->setId($data['id']);
        $FormularioModel->setNome($data['nome']);
        $FormularioModel->setEmail($data['email']);
        $FormularioModel->setContato($data['contato']);
        $FormularioModel->setIdade($data['idade']);

        $resultado = $FormularioDAO->updateUsuario($FormularioModel);

        return $response->withJson([
            "status" => $resultado['sucesso'] ? 202 : 400,
            "mensagem" => $resultado['mensagem']
        ]);
        
    }    
}