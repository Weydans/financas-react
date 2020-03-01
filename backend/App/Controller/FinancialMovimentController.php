<?php

namespace App\Controller;

use App\Model\Balance;
use Core\View\Template;
use Core\Controller\Controller;
use Core\Msg;

class FinancialMovimentController extends Controller
{
    private $balance;

    public function __construct()
    {
        parent::__construct(new Template());
        $this->balance = new Balance();
    }


    public function index()
    {
        $msg     = new Msg();
        $message = '';

        $delete = filter_input(INPUT_GET, 'delete', FILTER_DEFAULT);

        if ($delete == 'true') {
            $message = $msg->success('Movimentação removida com sucesso!');
        }

        $movements = $this->balance->getBalance();

        return $this->view('movement/balance.php', [
            'pageTitle' => 'Movimentação',
            'pageIcon'  => 'hand-holding-usd',
            'movements' => $movements,
            'msg'       => $message,
        ]);
    }


    public function delete(int $id)
    {
        if (!is_numeric($id)) {
            header('location: ' . HOME . 'movimentacao');
        }

        if (!$this->balance->delete($id)) {
            header('location: ' . HOME . 'movimentacao?delete=false');
        }

        header('location: ' . HOME . 'movimentacao?delete=true');
    }
}