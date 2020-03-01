<?php

namespace App\Controller;


use Core\View\Template;
use Core\Controller\Controller;

/**
 * ExempleController
 * 
 * Responsável por exemplificar uma controller
 * @author Weydans Barros
 * Data de criação: 12/01/2020 
 */
class LoginController extends Controller
{   
    public function __construct()
    {
        parent::__construct(new Template());
    }


    public function index()
    {
        $this->template->setHeader('');
        $this->template->setFooter('');

        $this->view('index.php');
    }


    public function home()
    {
        $this->view('dashboard.php', [
            'pageTitle' => 'Dashboard',
            'pageIcon'  => 'tachometer-alt'
        ]);
    }
}
