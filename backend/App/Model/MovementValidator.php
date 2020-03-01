<?php

namespace App\Model;


use Core\Validator\Validator;

/**
 * MovementValidator
 * 
 * Responsável por validar dados de receitas
 * @author Weydans Barros
 * Data de criação: 08/02/2020
 */
class MovementValidator
{
    private $data;
    private $errors;


    public function __construct(array $data)
    {
        $this->data = $data;
        $this->errors = [];
    }


    /**
     * validate()
     * 
     * Valida dados enviados via formulário
     * @return bool true caso dados válidos
     */
    public function validate() : bool
    {
        $validations = [
            'movement_class_id'     => 'required|min:1',
            'description'           => 'required|min:5|max:255',
            'movement_category_id'  => 'required|min:1',
            'movement_type_id'      => 'required|min:1',
            'value'                 => 'required|min:0|numeric',
            'release_date'          => 'required',
            'expiration_date'       => 'required',
            'payment_date'          => 'required_if:movement_status_id=1,Pago|required_if:movement_status_id=4,Pago após Vencimento',
            'movement_status_id'    => 'required|min:1',
        ];

        if (!empty($this->data['payment_date']) && $this->data['release_date'] > $this->data['payment_date']) {
            $this->errors[] = 'A data de pagamento não pode ser menor que a data de lançamento.';
        }
        
        if (!empty($this->data['expiration_date']) && $this->data['release_date'] > $this->data['expiration_date']) {
            $this->errors[] = 'A data de vencimento não pode ser menor que a data de lançamento.';
        }
        
        $validator = new Validator();
        
        if (!$validator->validate($this->data, $validations)) {
            $this->errors = array_merge($this->errors, $validator->getErrorMessages());
        }

        if (count($this->errors) > 0) {
            return false;
        }

        return true;
    }


    public function getErrors() : array
    {
        return $this->errors;
    }
}