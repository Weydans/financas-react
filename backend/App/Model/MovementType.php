<?php

namespace App\Model;


use App\DAO\MovementTypeDAO;

/**
 * MovementType
 * 
 * Responsável pelas regras de negócio de tipos de movimentações
 * @author Weydans Barros
 * Data de crisação: 24/02/2020
 */
class MovementType
{
    private $errors;

    /**
     * store()
     * 
     * Verifica se dados informados são 
     * válidos e grava registro na base de dados
     * @param array $data dados da categoria
     * @return bool
     */
    public function store(array $data) : bool
    {
        $validator = new MovementSpecialFieldValidator();
        $table     = 'movement_type';
        
        if (!$validator->validate($data, $table)) {
            $this->errors = $validator->getErrors();
            return false;
        }

        $movementTypeDao = new MovementTypeDAO;
        
        if (!$movementTypeDao->insert($data)->save()) {
            $this->errors = 'Erro ao inserir registro no banco de dados';
            return false;
        }

        return true;
    }


    /**
     * all()
     * 
     * Busca todos os tipos de movimentações cadatradas na base de dados
     * @return array 
     */
    public function all() : array
    {
        $typeDao = new MovementTypeDAO();
        return $typeDao->select()->get();
    }


    /**
     * getLast()
     */
    public function getLast()
    {
        $typeDao = new MovementTypeDAO();
        return $typeDao->select()->orderBy('id', 'DESC')->first();
    }


    /**
     * geterrors()
     * 
     * @return $this->errors Erros de cadastro
     */
    public function geterrors()
    {
        return $this->errors;
    }
}