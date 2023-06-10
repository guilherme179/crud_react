<?php

namespace App\Models;

final class FormularioModel {
   
    /** 
    * @var int
    */
    private $nome;
    
    /** 
    * @var string
    */
    private $email;
    
    /** 
    * @var string
    */
    private $contato;
    
    /** 
    * @var string
    */
    private $idade;
    
    /** 
    * @var int
    */
    private $id;
    
    /** 
    * @return int
    */
    public function getNome(): int{
        return $this->nome;
    }
 
    /** 
    * @param string $nome
    * @return string
    */
    public function setNome(string $nome): FormularioModel{
        $this->nome = $nome;
        return $this;
     }

    /** 
    * @return string
    */
    public function getEmail(): string{
        return $this->email;
    }
    
    /** 
    * @param int $email
    * @return int
    */
    public function setEmail(int $email): FormularioModel{
        $this->email = $email;
        return $this;
    }

    /** 
    * @return string
    */
    public function getContato(): string{
        return $this->contato;
    }

    /** 
    * @param string $contato
    * @return string
    */
    public function setContato(string $contato): FormularioModel{
        $this->contato = $contato;
        return $this;
    }

    /** 
    * @return string
    */
    public function getIdade(): string{
        return $this->idade;
    }

    /** 
    * @param string $idade
    * @return string
    */
    public function setIdade(string $idade): FormularioModel{
        $this->idade = $idade;
        return $this;
    }

    /** 
    * @return string
    */
    public function getId(): string{
        return $this->id;
    }

    /** 
    * @param string $id
    * @return string
    */
    public function setId(string $id): FormularioModel{
        $this->id = $id;
        return $this;
    }
}