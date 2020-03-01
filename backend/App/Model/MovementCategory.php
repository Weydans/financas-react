<?php

namespace App\Model;


use App\DAO\MovementCategoryDAO;

/**
 * MovementCategory
 * 
 * Responsável pelas regras de negócio de categorias de movimentações
 * @author Weydans Barros
 * Data de crisação: 09/02/2020
 */
class MovementCategory
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
        $table     = 'movement_category';
        
        if (!$validator->validate($data, $table)) {
            $this->errors = $validator->getErrors();
            return false;
        }

        $movementCategoryDao = new MovementCategoryDAO;
        
        if (!$movementCategoryDao->insert($data)->save()) {
            $this->errors = 'Erro ao inserir registro no banco de dados';
            return false;
        }

        return true;
    }


    /**
     * all()
     * 
     * Busca todas as categorias cadastradas na base de dados
     * @return array Categorias encontradas
     */
    public function all(int $idClass = null) : array
    {
        $categoryDao = new MovementCategoryDAO();

        if (!empty($idClass)) {
            return $categoryDao->select()->where('movement_class_id', $idClass)->orderBy('name')->get();
        }

        return $categoryDao->select()->get();
    }


    /**
     * getLast()
     */
    public function getLast()
    {
        $categoryDao = new MovementCategoryDAO();
        return $categoryDao->select()->orderBy('id', 'DESC')->orderBy('name')->first();
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