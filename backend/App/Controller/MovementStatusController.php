<?php

namespace App\Controller;

use Core\Msg;
use Core\View\Template;
use App\Model\MovementStatus;
use Core\Controller\Controller;

/**
 * MovementStatusController
 * 
 * Responsável pelocontrole de ações sobre os status de movimnetações
 * @author Weydans Barros
 * Data de criação: 24/02/2020
 */
class MovementStatusController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Template);
    }


    /**
     * store()
     * 
     * Armazena novo status na base de dados
     * @return Json reposta de Api
     */
    public function store()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $status = new MovementStatus();
        $msg    = new Msg();

        $response = [
            'error'   => 'false',
            'message' => '',
            'data'    => '',
        ];

        if (!$status->store($data)) {
            $response['error'] = 'true';

            foreach ($status->getErrors() as $error) {
                $response['message'] .= $msg->error($error);
            }

            return $this->responseApi($response);
        }
        
        $response['data'] = $status->getLast();
        $response['message'] .= $msg->success('Status cadastrado com sucesso!');

        return $this->responseApi($response);
    }
}
