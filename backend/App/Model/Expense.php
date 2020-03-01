<?php

namespace App\Model;


use App\DAO\MovementDAO;

/**
 * Expense
 * 
 * Responsável pelas regras de negócio de despesas
 * @author Weydans Barros
 * Data de criação: 08/02/2020
 */
class Expense
{
    private $errors;
    private $movementDao;
    private $movementClass;

    public function __construct()
    {
        $this->movementDao = new MovementDAO();
        $this->errors = [];
        $this->movementClass = 2;
    }


    public function all() : array
    {
        return $this->movementDao->allMovements($this->movementClass);
    }


    public function find(int $id) : array
    {
        return $this->movementDao->find($id, $this->movementClass);
    }

     
    public function store($data) : bool
    {
        $validator = new MovementValidator($data);

        if (!$validator->validate()) {            
            $this->errors = $validator->getErrors();
            return false;
        }        

        return $this->movementDao->insert($data)->save();
    }


    public function update(array $data) : bool
    {
        if (!$data['id']) {
            $this->errors[] = 'O campo id é obrigatório.';
            return false;
        }

        $validator = new MovementValidator($data);

        if (!$validator->validate()) {            
            $this->errors = array_merge($this->errors, $validator->getErrors());
            return false;
        }        

        return $this->movementDao->update($data)->where('id', $data['id'])->save();
    }


    public function delete(int $id) : bool
    {
        return $this->movementDao->where('id', $id)->delete();
    }


    public function getErrors()
    {
        return $this->errors;
    }
}
