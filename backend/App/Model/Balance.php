<?php

namespace App\Model;


use App\DAO\MovementDAO;

/**
 * Balance
 * 
 * Responsável pelas regras de negócio de geração de balanço de movimentações
 * @author Weydans Barros
 * Data de criação: 25/02/2020
 */
class Balance
{
    private $movementDao;


    public function __construct()
    {
        $this->movementDao = new MovementDAO();
    }


    public function getBalance() : array
    {
        return $this->movementDao->allMovements();
    }


    public function delete(int $id) : bool
    {
        return $this->movementDao->where('id', $id)->delete();
    }
}
