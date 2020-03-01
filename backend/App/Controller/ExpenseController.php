<?php

namespace App\Controller;

use App\Model\Expense;
use Core\View\Template;
use App\Controller\MovementController;
use Core\Msg;

class ExpenseController extends MovementController
{
    public function __construct()
    {
        parent::__construct(new Template());
        $this->movementClass = 2;
    }


    public function index()
    {
        $expense = new Expense;
        $msg     = new Msg();
        $message = '';

        $store  = filter_input(INPUT_GET, 'store', FILTER_DEFAULT);
        $delete = filter_input(INPUT_GET, 'delete', FILTER_DEFAULT);
        $update = filter_input(INPUT_GET, 'update', FILTER_DEFAULT);

        if ($store == 'true') {
            $message = $msg->success('Despesa cadastrada com sucesso!');
        }

        if ($delete == 'true') {
            $message = $msg->success('Despesa removida com sucesso!');
        }

        if ($update == 'true') {
            $message = $msg->success('Despesa atualizada com sucesso!');
        }

        $expenses = $expense->all();

        $this->view('expense/list.php', [
            'pageTitle' => 'Despesa',
            'pageIcon'  => 'file-invoice-dollar',
            'msg'       => $message,
            'expenses'  => $expenses,
        ]);
    }


    public function create()
    {
        $this->loadRelationFields();

        $this->view('expense/create.php', [
            'pageTitle'     => 'Despesa',
            'pageIcon'      => 'file-invoice-dollar',
            'title'         => 'Cadastro',
            'action'        => 'despesa/store',
            'buttonAction'  => 'Cadastrar',
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
     * Grava nova  despesa no banco de dados
     */
    public function store()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $expense = new Expense();
        $msg     = new Msg();
        $message = '';

        if (!$expense->store($data)) {
            foreach ($expense->getErrors() as $error) {
                $message .= $msg->error($error);
            }

            $this->loadRelationFields();

            return $this->view('expense/create.php', [
                'pageTitle'     => 'Receita',
                'pageIcon'      => 'piggy-bank',
                'title'         => 'Cadastro',
                'buttonAction'  => 'Cadastrar',
                'action'        => 'despesa/store',
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

        header('location: ' . route('despesa?store=true'));
    }


    /**
     * details()
     * 
     * Exibe página de detalhe de despesa
     * @param int $id Id da despesa a ser exibida
     */
    public function details(int $id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'despesa');
        }

        $expense = new Expense();
        $data = $expense->find($id);

        return $this->view('expense/details.php', [
            'pageTitle' => 'Despesa',
            'pageIcon'  => 'piggy-bank',
            'expense'    => $data
        ]);
    }


    /**
     * edit()
     * 
     * Exibe página de edição de despesa
     * @param int $id Id da despesa a ser editada
     */
    public function edit(int $id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'despesa');
        }

        $this->loadRelationFields();

        $expense = new Expense();
        $expense = $expense->find($id);

        return $this->view('expense/create.php', [
            'pageTitle'     => 'Despesa',
            'pageIcon'      => 'piggy-bank',
            'title'         => 'Edição',
            'buttonAction'  => 'Atualizar',
            'action'        => 'despesa/update',
            'categories'    => $this->categories,
            'types'         => $this->types,
            'status'        => $this->status,
            'data'          => $expense,
            'scripts'       => [
                'view/income/create.js',
            ]
        ]);
    }


    /**
     * update()
     * 
     * Realiza atualização de despesa
     */
    public function update()
    {
        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $expense  = new Expense();
        $msg     = new Msg();
        $message = '';

        if (!$expense->update($data)) {
            foreach ($expense->getErrors() as $error) {
                $message .= $msg->error($error);
            }

            $this->loadRelationFields();

            return $this->view('expense/create.php', [
                'pageTitle'     => 'Despesa',
                'pageIcon'      => 'piggy-bank',
                'title'         => 'Edição',
                'buttonAction'  => 'Atualizar',
                'action'        => 'despesa/update',
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

        header('location: ' . route('despesa?update=true'));
    }


    /**
     * delete()
     * 
     * Remove uma despesa do sistema
     * @param int $id Id do registro
     */
    public function delete($id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'despesa');
        }

        $expense = new Expense();

        if (!$expense->delete($id)) {
            header('location: ' . HOME . 'despesa?delete=false');
        }

        header('location: ' . HOME . 'despesa?delete=true');
    }
}
