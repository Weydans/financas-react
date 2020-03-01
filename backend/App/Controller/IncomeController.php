<?php

namespace App\Controller;


use Core\Msg;
use App\Model\Income;
use App\Controller\MovementController;

/**
 * IncomeController
 * 
 * Responsável pelo controle de ações de receitas
 * @author Weydans Barros
 * data de criação: 31/01/2020
 */
class IncomeController extends MovementController
{
    /**
     * __construct()
     * 
     * Inicializa objeto definindo template padrão
     */
    public function __construct()
    {
        parent::__construct();
        $this->movementClass = 1;
    }


    /**
     * index()
     * 
     * Exibe listagem de receitas com comandos e links de ação
     */
    public function index()
    {
        $income  = new Income();
        $msg     = new Msg();
        $message = '';

        $store  = filter_input(INPUT_GET, 'store', FILTER_DEFAULT);
        $delete = filter_input(INPUT_GET, 'delete', FILTER_DEFAULT);
        $update = filter_input(INPUT_GET, 'update', FILTER_DEFAULT);

        if ($store == 'true') {
            $message = $msg->success('Receita cadastrada com sucesso!');
        }

        if ($delete == 'true') {
            $message = $msg->success('Receita removida com sucesso!');
        }

        if ($update == 'true') {
            $message = $msg->success('Receita atualizada com sucesso!');
        }

        $incomes = $income->all();

        return $this->view('income/list.php', [
            'pageTitle' => 'Receita',
            'pageIcon'  => 'piggy-bank',
            'msg'       => $message,
            'incomes'   => $incomes,
        ]);
    }


    /**
     * create()
     * 
     * Monta formulário de cadastro de receita
     */
    public function create()
    {
        $this->loadRelationFields();

        return $this->view('income/create.php', [
            'pageTitle'     => 'Receita',
            'pageIcon'      => 'piggy-bank',
            'title'         => 'Cadastro',
            'buttonAction'  => 'Cadastrar',
            'action'        => 'receita/store',
            'categories'    => $this->categories,
            'types'         => $this->types,
            'status'        => $this->status,
            'scripts'       => [
                'view/income/create.js',
            ]
        ]);
    }


    /**
     * store()
     * 
     * Grava nova  receita no banco de dados
     */
    public function store()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $income  = new Income();
        $msg     = new Msg();
        $message = '';

        if (!$income->store($data)) {
            foreach ($income->getErrors() as $error) {
                $message .= $msg->error($error);
            }

            $this->loadRelationFields();

            return $this->view('income/create.php', [
                'pageTitle'     => 'Receita',
                'pageIcon'      => 'piggy-bank',
                'title'         => 'Cadastro',
                'buttonAction'  => 'Cadastrar',
                'action'        => 'receita/store',
                'msg'           => $message,
                'categories'    => $this->categories,
                'types'         => $this->types,
                'status'        => $this->status,
                'data'          => $data,
                'scripts'       => [
                    'view/income/create.js',
                ]
            ]);
        }

        header('location: ' . route('receita?store=true'));
    }


    /**
     * details()
     * 
     * Exibe página de detalhe de receita
     * @param int $id Id da receita a ser exibida
     */
    public function details(int $id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'receita');
        }

        $income = new Income();
        $data = $income->find($id);

        return $this->view('income/details.php', [
            'pageTitle' => 'Receita',
            'pageIcon'  => 'piggy-bank',
            'income'    => $data
        ]);
    }


    /**
     * edit()
     * 
     * Exibe página de edição de Receita
     * @param int $id Id da receita a ser editada
     */
    public function edit(int $id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'receita');
        }

        $this->loadRelationFields();

        $income = new Income();
        $income = $income->find($id);

        return $this->view('income/create.php', [
            'pageTitle'     => 'Receita',
            'pageIcon'      => 'piggy-bank',
            'title'         => 'Edição',
            'buttonAction'  => 'Atualizar',
            'action'        => 'receita/update',
            'categories'    => $this->categories,
            'types'         => $this->types,
            'status'        => $this->status,
            'data'          => $income,
            'scripts'       => [
                'view/income/create.js',
            ]
        ]);
    }


    /**
     * update()
     * 
     * Realiza atualização de receita
     */
    public function update()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $income  = new Income();
        $msg     = new Msg();
        $message = '';

        if (!$income->update($data)) {
            foreach ($income->getErrors() as $error) {
                $message .= $msg->error($error);
            }

            $this->loadRelationFields();

            return $this->view('income/create.php', [
                'pageTitle'     => 'Receita',
                'pageIcon'      => 'piggy-bank',
                'title'         => 'Edição',
                'buttonAction'  => 'Atualizar',
                'action'        => 'receita/update',
                'msg'           => $message,
                'categories'    => $this->categories,
                'types'         => $this->types,
                'status'        => $this->status,
                'data'          => $data,
                'scripts'       => [
                    'view/income/create.js',
                ]
            ]);
        }

        header('location: ' . route('receita?update=true'));
    }


    /**
     * delete()
     * 
     * Remove uma receita do sistema
     * @param int $id Id do registro
     */
    public function delete($id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'receita');
        }

        $income = new Income();

        if (!$income->delete($id)) {
            header('location: ' . HOME . 'receita?delete=false');
        }

        header('location: ' . HOME . 'receita?delete=true');
    }
}
