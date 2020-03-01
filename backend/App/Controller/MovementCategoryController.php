<?php

namespace App\Controller;

use Core\Msg;
use Core\View\Template;
use App\Model\MovementCategory;
use Core\Controller\Controller;

class MovementCategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct(new Template);
    }


    public function store()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $category  = new MovementCategory();
        $msg       = new Msg;

        $response = [
            'error'   => 'false',
            'message' => '',
            'data'    => '',
        ];

        if (!$category->store($data)) {
            $response['error'] = 'true';

            foreach ($category->getErrors() as $error) {
                $response['message'] .= $msg->error($error);
            }

            return $this->responseApi($response);
        }

        $response['data']     = $category->getLast();
        $response['message'] .= $msg->success('Categoria cadastrada com sucesso!');

        return $this->responseApi($response);
    }
}
