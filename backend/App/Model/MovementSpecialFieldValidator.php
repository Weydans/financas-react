<?php

namespace App\Model;


use Core\Validator\Validator;

/**
 * MovementSpecialFieldValidator
 * 
 * Responsável por validar dados de campos especiais de movimentações
 * @author Weydans Barros
 * Data de criação: 09/02/2020
 */
class MovementSpecialFieldValidator
{
    private $errors;

    /**
     * validate(array $data)
     * 
     * Realiza validação de dados
     * @param array $data Dados a serem validados
     * @param string $table Nome da tabela 
     * @return bool
     */
    public function validate(array $data, string $table) : bool
    {
        $validations = [
            'name'              => 'required|min:3|max:255|unique:' . $table,
            'description'       => 'required|min:3|max:255|unique:' . $table,
        ];

        $validator = new Validator();
        
        if (!$validator->validate($data, $validations)) {
            $this->errors = $validator->getErrorMessages();
            return false;
        }

        return true;
    }


    /**
     * getErrors()
     * 
     * @return $this->errors Erros de validação
     */
    public function getErrors()
    {
        return $this->errors;
    }
}