<?php

namespace App\Model;


use App\DAO\MovementStatusDAO;

/**
 * MovementStatus
 * 
 * Responsável pelas regras de negócio de status de movimentações
 * @author Weydans Barros
 * Data de crisação: 09/02/2020
 */
class MovementStatus
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
        $table     = 'movement_status';

        if (!$validator->validate($data, $table)) {
            $this->errors = $validator->getErrors();
            return false;
        }

        $movementStatusDao = new MovementStatusDAO;
        
        if (!$movementStatusDao->insert($data)->save()) {
            $this->errors = 'Erro ao inserir registro no banco de dados';
            return false;
        }

        return true;
    }


    /**
     * all()
     * 
     * Busca todos os status de movimentações cadastrados na base de dados
     * @return array
     */
    public function all() : array
    {
        $statusDao = new MovementStatusDAO();
        return $statusDao->select()->get();
    }


    /**
     * getLast()
     */
    public function getLast()
    {
        $statusDao = new MovementStatusDAO();
        return $statusDao->select()->orderBy('id', 'DESC')->first();
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