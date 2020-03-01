<?php

namespace App\Controller;

use Core\Msg;
use Core\View\Template;
use App\Model\MovementType;
use Core\Controller\Controller;

/**
 * MovementTypeController
 * 
 * Responsável pelo controle de ações sobre os tipos de movimentações 
 * @author Weydans Barros
 * Data de criação: 24/02/2020
 */
class MovementTypeController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Template);
    }


    /**
     * store()
     * 
     * Armazena novo tipo de movimentação na base de dados
     */
    public function store()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $type = new MovementType();
        $msg  = new Msg();

        $response = [
            'error'   => 'false',
            'message' => '',
            'data'    => '',
        ];

        if (!$type->store($data)) {
            $response['error'] = 'true';

            foreach ($type->getErrors() as $error) {
                $response['message'] .= $msg->error($error);
            }

            return $this->responseApi($response);
        }
        
        $response['data'] = $type->getLast();
        $response['message'] .= $msg->success('Tipo cadastrado com sucesso!');

        return $this->responseApi($response);
    }
}
